<script setup>
import { ref, computed } from 'vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({ stats: Object, tickets: Array, cupones: Array, ingresosPorFecha: Array, usuarios: Array, });

const seccionActiva = ref('dashboard');

/* ───────────── CUPONES ───────────── */
const formCupon = useForm({ nombre: '', fechaInicio: '', fechaFin: '', tipo: 'porcentaje', valor: '', usos_maximos: '', minimo_pedido: '', });
const crearCupon = () => formCupon.post(route('admin.cupones.store'), { onSuccess: () => formCupon.reset() });
const toggleCupon = (id) => router.post(route('admin.cupones.toggle', id));
const cambiarEstadoTicket = (id, estado) => router.post(route('admin.tickets.update', id), { estado });

const colorEstado = (estado) => ({ abierto: 'badge badge-abierto', 'En progreso': 'badge badge-progreso', cerrado: 'badge badge-cerrado', }[estado] ?? 'badge');

const estaCaducado = (fechaFin) => {
    if (!fechaFin)
        return false;
    const hoy = new Date(); hoy.setHours(0, 0, 0, 0);
    return new Date(fechaFin) < hoy;
};

/* ───────────── HELPERS ───────────── */
const MESES = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];

const formatearMes = (str) => {
    const partes = str.split('-');
    return `${MESES[parseInt(partes[1]) - 1]} / ${partes[0].slice(2)}`;
};

// Genera array de todos los meses 'YYYY-MM' entre dos fechas inclusive
const generarRangoMeses = (desde, hasta) => {
    const resultado = [];
    const cur = new Date(desde.slice(0, 7) + '-01');
    const fin = new Date(hasta.slice(0, 7) + '-01');
    while (cur <= fin) {
        const y = cur.getFullYear();
        const m = String(cur.getMonth() + 1).padStart(2, '0');
        resultado.push(`${y}-${m}`);
        cur.setMonth(cur.getMonth() + 1);
    }
    return resultado;
};

/* ───────────── GRÁFICO 1: Ingresos por mes (todos los meses) ───────────── */
const svgW = 700, svgH = 280, padL = 62, padR = 20, padT = 20, padB = 60;
const chartW = svgW - padL - padR;
const chartH = svgH - padT - padB;

const datosGrafico = computed(() => {
    const raw = props.ingresosPorFecha ?? [];
    if (!raw.length)
        return null;

    // Agrupar por mes (YYYY-MM) sumando totales
    const porMes = {};
    for (const d of raw) {
        const clave = d.fecha.slice(0, 7);
        porMes[clave] = (porMes[clave] || 0) + d.total;
    }

    // Rango completo desde el primer mes hasta hoy
    const claves = Object.keys(porMes).sort();
    const primerMes = claves[0];
    const hoy = new Date();
    const mesActual = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}`;
    const rango = generarRangoMeses(primerMes, mesActual);

    // Rellenar con 0 los meses sin ventas
    const datos = rango.map(mes => ({ mes, total: porMes[mes] ?? 0 }));

    const maxVal = Math.max(...datos.map(d => d.total), 1);
    const n = datos.length;

    const pts = datos.map((d, i) => ({ x: padL + (i / (n - 1 || 1)) * chartW, y: padT + chartH - (d.total / maxVal) * chartH, ...d, }));

    const linea = pts.map((p, i) => `${i === 0 ? 'M' : 'L'}${p.x.toFixed(1)},${p.y.toFixed(1)}`).join(' ');
    const area = `${linea} L${pts[n - 1].x.toFixed(1)},${(padT + chartH).toFixed(1)} L${padL},${(padT + chartH).toFixed(1)} Z`;

    // Ticks eje Y (5 niveles)
    const ticks = Array.from({ length: 5 }, (_, i) => ({ y: padT + chartH - (i / 4) * chartH, label: ((maxVal / 4) * i).toFixed(0) + '€', }));

    // Ticks eje X: mostrar todos, pero si son muchos reducir para no solapar
    const maxLabels = 12;
    const step = Math.max(1, Math.ceil(n / maxLabels));
    const xTicks = datos
        .filter((_, i) => i % step === 0 || i === n - 1)
        .map((d, _, arr) => {
            const idx = datos.indexOf(d);
            return { x: padL + (idx / (n - 1 || 1)) * chartW, label: formatearMes(d.mes), };
        });

    return { pts, linea, area, ticks, xTicks };
});

const tooltip1 = ref(null);
const showTooltip1 = (pt) => tooltip1.value = pt;
const hideTooltip1 = () => tooltip1.value = null;

/* ───────────── GRÁFICO 2: Ingresos cliente x mes (todos los meses) ───────────── */
const busqueda = ref('');
const usuarioSel = ref(null);
const dropVisible = ref(false);
const barDataRaw = ref([]);
const loadingBar = ref(false);

const usuariosFiltrados = computed(() => {
    const q = busqueda.value.toLowerCase().trim();
    if (!q)
        return props.usuarios?.slice(0, 8) ?? [];
    return (props.usuarios ?? []).filter(u => u.nombre.toLowerCase().includes(q) || u.email.toLowerCase().includes(q)).slice(0, 8);
});

const seleccionarUsuario = (u) => {
    usuarioSel.value = u;
    busqueda.value = u.nombre;
    dropVisible.value = false;
    cargarDatosCliente(u.id);
};

const cargarDatosCliente = async (id) => {
    loadingBar.value = true;
    try {
        const res = await fetch(route('admin.ingresos.cliente', id));
        barDataRaw.value = await res.json();
    } catch {
        barDataRaw.value = [];
    } finally {
        loadingBar.value = false;
    }
};

// Datos con rango completo y meses a 0
const barData = computed(() => {
    const raw = barDataRaw.value;
    if (!raw.length)
        return [];

    const porMes = Object.fromEntries(raw.map(d => [d.mes, d.total]));
    const claves = Object.keys(porMes).sort();
    const hoy = new Date();
    const mesActual = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}`;
    const rango = generarRangoMeses(claves[0], mesActual);

    return rango.map(mes => ({ mes, total: porMes[mes] ?? 0 }));
});

// SVG barras
const barSvgW = 700, barSvgH = 280;
const barPadL = 62, barPadR = 20, barPadT = 20, barPadB = 60;
const barChartW = barSvgW - barPadL - barPadR;
const barChartH = barSvgH - barPadT - barPadB;

const datosBarras = computed(() => {
    const datos = barData.value;
    if (!datos.length)
        return null;
    const maxVal = Math.max(...datos.map(d => d.total), 1);
    const n = datos.length;
    const gap = Math.max(2, Math.floor(8 - n / 6));
    const bw = Math.max(4, (barChartW - gap * (n + 1)) / n);
    const bars = datos.map((d, i) => ({ x: barPadL + gap * (i + 1) + bw * i, y: barPadT + barChartH - (d.total / maxVal) * barChartH, h: (d.total / maxVal) * barChartH, w: bw, ...d, }));
    const ticks = Array.from({ length: 5 }, (_, i) => ({ y: barPadT + barChartH - (i / 4) * barChartH, label: ((maxVal / 4) * i).toFixed(0) + '€', }));

    // Mostrar label en eje X solo cada N barras si hay muchas
    const maxLabels = 14;
    const step = Math.max(1, Math.ceil(n / maxLabels));

    return { bars, ticks, step };
});

const tooltip2 = ref(null);
const showTooltip2 = (b) => tooltip2.value = b;
const hideTooltip2 = () => tooltip2.value = null;
</script>
<template>
    <Head title="Panel Administrador | HECOMA" />
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">
                    Panel de Administración
                </h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-10">
            <div class="max-w-7xl mx-auto">
                <!-- NAV -->
                <div class="flex gap-3 mb-8 flex-wrap">
                    <button @click="seccionActiva = 'dashboard'"
                        :class="['nav-btn', seccionActiva === 'dashboard' ? 'active' : '']">📊 Dashboard</button>
                    <button @click="seccionActiva = 'graficos'"
                        :class="['nav-btn', seccionActiva === 'graficos' ? 'active' : '']">📈 Gráficos</button>
                    <button @click="seccionActiva = 'tickets'"
                        :class="['nav-btn', seccionActiva === 'tickets' ? 'active' : '']">🎫 Tickets</button>
                    <button @click="seccionActiva = 'cupones'"
                        :class="['nav-btn', seccionActiva === 'cupones' ? 'active' : '']">🏷️ Cupones</button>
                </div>

                <!-- DASHBOARD -->
                <div v-if="seccionActiva === 'dashboard'">
                    <h2 class="section-title">Resumen General</h2>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-icon">👥</span>
                            <span class="stat-number">{{ stats.total_usuarios }}</span>
                            <span class="stat-label">Usuarios registrados</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-icon">📦</span>
                            <span class="stat-number">{{ stats.total_pedidos }}</span>
                            <span class="stat-label">Pedidos totales</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-icon">💶</span>
                            <span class="stat-number">{{ Number(stats.ingresos_totales).toFixed(2) }} €</span>
                            <span class="stat-label">Ingresos totales</span>
                        </div>
                        <div class="stat-card stat-warning">
                            <span class="stat-icon">⏳</span>
                            <span class="stat-number">{{ stats.pedidos_pendientes }}</span>
                            <span class="stat-label">Pedidos sin pagar</span>
                        </div>
                        <div class="stat-card stat-green">
                            <span class="stat-icon">🎫</span>
                            <span class="stat-number">{{ stats.tickets_abiertos }}</span>
                            <span class="stat-label">Tickets abiertos</span>
                        </div>
                        <div class="stat-card stat-orange">
                            <span class="stat-icon">🔧</span>
                            <span class="stat-number">{{ stats.tickets_progreso }}</span>
                            <span class="stat-label">Tickets en progreso</span>
                        </div>
                        <div class="stat-card stat-red">
                            <span class="stat-icon">✅</span>
                            <span class="stat-number">{{ stats.tickets_cerrados }}</span>
                            <span class="stat-label">Tickets cerrados</span>
                        </div>
                        <div class="stat-card stat-blue">
                            <span class="stat-icon">🏷️</span>
                            <span class="stat-number">{{ stats.cupones_activos }}</span>
                            <span class="stat-label">Cupones activos</span>
                        </div>
                    </div>
                </div>

                <!-- ═══════════════ GRÁFICOS ═══════════════ -->
                <div v-if="seccionActiva === 'graficos'" class="graficos-wrapper">
                    <!-- ── Gráfico 1: Ingresos por fecha ── -->
                    <div class="chart-card">
                        <h2 class="section-title">Ingresos por fecha</h2>

                        <div v-if="!datosGrafico" class="empty-state">Sin datos de ingresos disponibles.</div>
                        <div v-else class="chart-container">
                            <svg :viewBox="`0 0 ${svgW} ${svgH}`" class="chart-svg" @mouseleave="hideTooltip1">
                                <defs>
                                    <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#010cf7" stop-opacity="0.25" />
                                        <stop offset="100%" stop-color="#010cf7" stop-opacity="0.02" />
                                    </linearGradient>
                                </defs>
                                <!-- Grid lines -->
                                <line v-for="t in datosGrafico.ticks" :key="t.y" :x1="padL" :y1="t.y" :x2="svgW - padR" :y2="t.y" stroke="#e5e7eb" stroke-width="1" />
                                <!-- Y axis labels -->
                                <text v-for="t in datosGrafico.ticks" :key="'yl' + t.y" :x="padL - 8" :y="t.y + 4" text-anchor="end" class="axis-label">{{ t.label }}</text>
                                <!-- X axis labels -->
                                <text v-for="t in datosGrafico.xTicks" :key="'xl' + t.x" :x="t.x" :y="padT + chartH + 20" text-anchor="middle" class="axis-label">{{ t.label }}</text>
                                <!-- Area fill -->
                                <path :d="datosGrafico.area" fill="url(#areaGrad)" />
                                <!-- Line -->
                                <path :d="datosGrafico.linea" fill="none" stroke="#010cf7" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round" />
                                <!-- Dots + hover -->
                                <circle v-for="(pt, i) in datosGrafico.pts" :key="i" :cx="pt.x" :cy="pt.y" r="5" fill="white" stroke="#010cf7" stroke-width="2" class="dot" @mouseenter="showTooltip1(pt)" @mouseleave="hideTooltip1" />
                                <!-- Tooltip -->
                                <g v-if="tooltip1">
                                    <rect :x="tooltip1.x - 50" :y="tooltip1.y - 42" width="100" height="36" rx="6" fill="#1e293b" />
                                    <text :x="tooltip1.x" :y="tooltip1.y - 26" text-anchor="middle" fill="white" font-size="11" font-weight="600">{{ tooltip1.fecha }}</text>
                                    <text :x="tooltip1.x" :y="tooltip1.y - 12" text-anchor="middle" fill="#7dd3fc" font-size="12" font-weight="700">{{ Number(tooltip1.total).toFixed(2) }}€</text>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <!-- ── Gráfico 2: Ingresos cliente por mes ── -->
                    <div class="chart-card mt-8">
                        <h2 class="section-title">Ingresos por cliente (mensual)</h2>

                        <!-- Selector de cliente -->
                        <div class="selector-wrapper">
                            <div class="selector-input-wrap">
                                <span class="selector-icon">🔍</span>
                                <input v-model="busqueda" @focus="dropVisible = true" @blur="setTimeout(() => dropVisible = false, 150)" type="text" placeholder="Buscar cliente por nombre o email..." class="selector-input" />
                                <button v-if="busqueda" @click="busqueda = ''; usuarioSel = null; barData = []" class="clear-btn">✕</button>
                            </div>

                            <!-- Dropdown -->
                            <div v-if="dropVisible && usuariosFiltrados.length" class="dropdown">
                                <div v-for="u in usuariosFiltrados" :key="u.id" @mousedown.prevent="seleccionarUsuario(u)" class="dropdown-item">
                                    <span class="drop-name">{{ u.nombre }}</span>
                                    <span class="drop-email">{{ u.email }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Estado vacío / cargando -->
                        <div v-if="!usuarioSel" class="empty-state">
                            Selecciona un cliente para ver sus ingresos mensuales.
                        </div>
                        <div v-else-if="loadingBar" class="empty-state">⏳ Cargando datos...</div>
                        <div v-else-if="!datosBarras" class="empty-state">
                            Sin pedidos registrados para <strong>{{ usuarioSel.nombre }}</strong>.
                        </div>

                        <!-- Barras -->
                        <div v-else class="chart-container">
                            <div class="client-header">
                                <span class="client-tag">{{ usuarioSel.nombre }}</span>
                                <span class="client-total"> Total: {{barData.reduce((a, b) => a + Number(b.total), 0).toFixed(2)}}€</span>
                            </div>
                            <svg :viewBox="`0 0 ${barSvgW} ${barSvgH}`" class="chart-svg" @mouseleave="hideTooltip2">
                                <!-- Grid -->
                                <line v-for="t in datosBarras.ticks" :key="t.y" :x1="barPadL" :y1="t.y" :x2="barSvgW - barPadR" :y2="t.y" stroke="#e5e7eb" stroke-width="1" />
                                <!-- Y labels -->
                                <text v-for="t in datosBarras.ticks" :key="'by' + t.y" :x="barPadL - 8" :y="t.y + 4" text-anchor="end" class="axis-label">{{ t.label }}</text>
                                <!-- Bars -->
                                <g v-for="(b, i) in datosBarras.bars" :key="i" @mouseenter="showTooltip2(b)" @mouseleave="hideTooltip2" class="bar-group">
                                    <rect :x="b.x" :y="b.y" :width="b.w" :height="b.h" rx="4" :fill="tooltip2 && tooltip2.mes === b.mes ? '#010cf7' : '#3b5cdb'" class="bar-rect" />
                                    <!-- Solo mostrar label cada N barras para no solapar -->
                                    <text v-if="i % datosBarras.step === 0" :x="b.x + b.w / 2" :y="barPadT + barChartH + 20" text-anchor="middle" class="axis-label">{{formatearMes(b.mes) }}</text>
                                </g>
                                <!-- Tooltip -->
                                <g v-if="tooltip2">
                                    <rect :x="tooltip2.x + tooltip2.w / 2 - 52" :y="tooltip2.y - 44" width="104" height="38" rx="6" fill="#1e293b" />
                                    <text :x="tooltip2.x + tooltip2.w / 2" :y="tooltip2.y - 28" text-anchor="middle" fill="white" font-size="11" font-weight="600">{{ formatearMes(tooltip2.mes) }}</text>
                                    <text :x="tooltip2.x + tooltip2.w / 2" :y="tooltip2.y - 12" text-anchor="middle" fill="#7dd3fc" font-size="12" font-weight="700">{{ Number(tooltip2.total).toFixed(2) }}€</text>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- ═══════════════ /GRÁFICOS ═══════════════ -->
                <!-- TICKETS -->
                <div v-if="seccionActiva === 'tickets'">
                    <h2 class="section-title">Gestión de Tickets</h2>
                    <div class="table-wrapper">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Título</th>
                                    <th>Problema</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Cambiar estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ticket in tickets" :key="ticket.id">
                                    <td>{{ ticket.id }}</td>
                                    <td>{{ ticket.user?.nombre }}</td>
                                    <td>{{ ticket.user?.email }}</td>
                                    <td>{{ ticket.titulo }}</td>
                                    <td class="problema-cell">{{ ticket.problema }}</td>
                                    <td><span :class="colorEstado(ticket.estado)">{{ ticket.estado }}</span></td>
                                    <td>{{ ticket.fecha_formateada }}</td>
                                    <td>
                                        <select @change="cambiarEstadoTicket(ticket.id, $event.target.value)" :value="ticket.estado" class="select-estado">
                                            <option value="abierto">Abierto</option>
                                            <option value="En progreso">En progreso</option>
                                            <option value="cerrado">Cerrado</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CUPONES -->
                <div v-if="seccionActiva === 'cupones'">
                    <h2 class="section-title">Gestión de Cupones</h2>
                    <div class="cupon-form">
                        <h3 class="font-bold text-[#003399] mb-4 text-lg">Crear nuevo cupón</h3>
                        <div class="form-grid">
                            <div class="campo">
                                <label>Nombre (código)</label>
                                <input v-model="formCupon.nombre" type="text" placeholder="Ej: VERANO10" />
                                <span v-if="formCupon.errors.nombre" class="error">{{ formCupon.errors.nombre }}</span>
                            </div>
                            <div class="campo">
                                <label>Tipo</label>
                                <select v-model="formCupon.tipo">
                                    <option value="porcentaje">Porcentaje (%)</option>
                                    <option value="fijo">Fijo (€)</option>
                                </select>
                            </div>
                            <div class="campo">
                                <label>Valor</label>
                                <input v-model="formCupon.valor" type="number" min="1" placeholder="Ej: 10" />
                                <span v-if="formCupon.errors.valor" class="error">{{ formCupon.errors.valor }}</span>
                            </div>
                            <div class="campo">
                                <label>Usos máximos</label>
                                <input v-model="formCupon.usos_maximos" type="number" min="1" placeholder="Ej: 100" />
                            </div>
                            <div class="campo">
                                <label>Mínimo de pedido (€)</label>
                                <input v-model="formCupon.minimo_pedido" type="number" min="0" placeholder="Ej: 50" />
                            </div>
                            <div class="campo">
                                <label>Fecha inicio</label>
                                <input v-model="formCupon.fechaInicio" type="date" />
                            </div>
                            <div class="campo">
                                <label>Fecha fin</label>
                                <input v-model="formCupon.fechaFin" type="date" />
                            </div>
                        </div>
                        <button @click="crearCupon" :disabled="formCupon.processing" class="btn-crear">{{ formCupon.processing ? 'Creando...' : '+ Crear Cupón' }}</button>
                    </div>

                    <div class="table-wrapper mt-8">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Mín. pedido</th>
                                    <th>Usos</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cupon in cupones" :key="cupon.id">
                                    <td><strong>{{ cupon.nombre }}</strong></td>
                                    <td>{{ cupon.tipo }}</td>
                                    <td>{{ cupon.tipo === 'porcentaje' ? cupon.valor + '%' : cupon.valor + '€' }}</td>
                                    <td>{{ cupon.minimo_pedido }} €</td>
                                    <td>{{ cupon.usos_actuales }} / {{ cupon.usos_maximos }}</td>
                                    <td>{{ cupon.fechaInicio }}</td>
                                    <td>{{ cupon.fechaFin }}</td>
                                    <td>
                                        <span v-if="estaCaducado(cupon.fechaFin)" class="badge badge-caducado">Caducado</span>
                                        <span v-else :class="cupon.activo ? 'badge badge-abierto' : 'badge badge-cerrado'">{{ cupon.activo ? 'Activo' : 'Inactivo' }} </span>
                                    </td>
                                    <td>
                                        <button @click="toggleCupon(cupon.id)" class="btn-toggle">{{ cupon.activo ? 'Desactivar' : 'Activar' }}</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
/* ── Nav / base (sin cambios) ── */
.nav-btn { padding: 10px 20px; border-radius: 8px; border: 2px solid #003399; color: #003399; font-weight: 600; cursor: pointer; background: white; transition: all .2s; text-decoration: none; display: inline-block; }
.nav-btn:hover,
.nav-btn.active { background: #003399; color: white; }
.section-title { font-size: 1.5rem; font-weight: bold; color: #003399; margin-bottom: 1.5rem; }
.stats-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; }
.stat-card { background: white; border-radius: 12px; padding: 1.5rem; border: 1px solid #e5e7eb; box-shadow: 0 2px 8px rgba(0, 0, 0, .06); display: flex; flex-direction: column; align-items: center; text-align: center; gap: 8px; }
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 6px 16px rgba(0, 0, 0, .1); transition: all .2s; }
.stat-icon { font-size: 2rem; }
.stat-number { font-size: 2rem; font-weight: bold; color: #003399; }
.stat-label { font-size: .85rem; color: #666; }
.stat-warning .stat-number { color: #e65100; }
.stat-green .stat-number { color: #2e7d32; }
.stat-orange .stat-number { color: #e65100; }
.stat-red .stat-number { color: #b71c1c; }
.stat-blue .stat-number { color: #010cf7; }
.table-wrapper { overflow-x: auto; border-radius: 10px; border: 1px solid #e5e7eb; }
.admin-table { width: 100%; border-collapse: collapse; font-size: .9rem; }
.admin-table thead { background: #003399; color: white; }
.admin-table th { padding: 12px 16px; text-align: left; font-weight: 600; }
.admin-table td { padding: 12px 16px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
.admin-table tbody tr:hover { background: #f8f9ff; }
.problema-cell { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.select-estado { padding: 5px 8px; border-radius: 6px; border: 1px solid #ccc; font-size: .85rem; cursor: pointer; }
.badge { font-size: .75rem; font-weight: bold; padding: 3px 10px; border-radius: 20px; text-transform: uppercase; white-space: nowrap; }
.badge-abierto { background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
.badge-progreso { background: #fff3e0; color: #e65100; border: 1px solid #ffcc80; }
.badge-cerrado { background: #fce4ec; color: #b71c1c; border: 1px solid #ef9a9a; }
.cupon-form { background: #f8f9ff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 2rem; }
.form-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem; }
.campo { display: flex; flex-direction: column; gap: 5px; }
.campo label { font-weight: 600; font-size: .85rem; color: #333; }
.campo input,
.campo select { padding: 8px; border: 1px solid #ccc; border-radius: 6px; font-size: .9rem; }
.error { color: red; font-size: .8rem; }
.btn-crear { background: #003399; color: white; padding: 10px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background .2s; }
.btn-crear:hover { background: #010cf7; }
.btn-crear:disabled { background: #90caf9; cursor: not-allowed; }
.btn-toggle { padding: 5px 12px; border-radius: 6px; border: 1px solid #003399; color: #003399; background: white; font-size: .8rem; cursor: pointer; transition: all .2s; }
.btn-toggle:hover { background: #003399; color: white; }

/* ── Gráficos ── */
.graficos-wrapper { display: flex; flex-direction: column; gap: 0; }
.chart-card { background: white; border: 1px solid #e5e7eb; border-radius: 14px; padding: 1.75rem; box-shadow: 0 2px 10px rgba(0, 0, 0, .05); }
.chart-container { width: 100%; }
.chart-svg { width: 100%; height: auto; display: block; }
.axis-label { font-size: 11px; fill: #888; font-family: monospace; }
.dot { cursor: pointer; transition: r .1s; }
.dot:hover { r: 7; }
.bar-group { cursor: pointer; }
.bar-rect { transition: fill .15s; }
.empty-state { text-align: center; color: #999; padding: 3rem 0; font-size: .95rem; }

/* Selector cliente */
.selector-wrapper { position: relative; margin-bottom: 1.5rem; max-width: 420px; }
.selector-input-wrap { display: flex; align-items: center; border: 2px solid #003399; border-radius: 8px; overflow: hidden; background: white; }
.selector-icon { padding: 0 10px; font-size: 1rem;}
.selector-input { flex: 1; border: none; outline: none; padding: 9px 6px; font-size: .9rem; }
.clear-btn { background: none; border: none; cursor: pointer; padding: 0 10px; color: #999; font-size: .9rem; }
.clear-btn:hover { color: #003399; }
.dropdown { position: absolute; top: calc(100% + 4px); left: 0; right: 0; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 8px 24px rgba(0, 0, 0, .12); z-index: 50; max-height: 240px; overflow-y: auto; }
.dropdown-item { display: flex; flex-direction: column; padding: 10px 14px; cursor: pointer; transition: background .15s; }
.dropdown-item:hover { background: #f0f4ff; }
.drop-name { font-weight: 600; font-size: .9rem; color: #1e293b; }
.drop-email { font-size: .78rem; color: #64748b; }
.client-header { display: flex; align-items: center; gap: 1rem; margin-bottom: .75rem; }
.client-tag { background: #010cf7; color: white; border-radius: 20px; padding: 4px 14px; font-size: .85rem; font-weight: 600; }
.client-total { font-weight: 700; color: #003399; font-size: 1rem; }
</style>