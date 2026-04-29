<script setup>
import { ref } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({ stats: Object, tickets: Array, cupones: Array, });
const seccionActiva = ref('dashboard');

// Formulario cupón
const formCupon = useForm({ nombre: '', fechaInicio: '', fechaFin: '', tipo: 'porcentaje', valor: '', usos_maximos: '', minimo_pedido: '', });
const crearCupon = () => { formCupon.post(route('admin.cupones.store'), { onSuccess: () => formCupon.reset(), }); };
const toggleCupon = (id) => { router.post(route('admin.cupones.toggle', id)); };
const cambiarEstadoTicket = (id, estado) => { router.post(route('admin.tickets.update', id), { estado }); };

const colorEstado = (estado) => {
    switch (estado) {
        case 'abierto':     return 'badge badge-abierto';
        case 'En progreso': return 'badge badge-progreso';
        case 'cerrado':     return 'badge badge-cerrado';
        default:            return 'badge';
    }
};
// Comprobar si el cupón está caducado
const estaCaducado = (fechaFin) => {
    if (!fechaFin)
        return false;
    const hoy = new Date();
    hoy.setHours(0, 0, 0, 0)
    const fin = new Date(fechaFin);
    return fin < hoy;
};
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
                    <button @click="seccionActiva = 'dashboard'" :class="['nav-btn', seccionActiva === 'dashboard' ? 'active' : '']">📊 Dashboard</button>
                    <button @click="seccionActiva = 'tickets'"   :class="['nav-btn', seccionActiva === 'tickets'   ? 'active' : '']">🎫 Tickets</button>
                    <button @click="seccionActiva = 'cupones'"   :class="['nav-btn', seccionActiva === 'cupones'   ? 'active' : '']">🏷️ Cupones</button>
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

                    <!-- Formulario nuevo cupón -->
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
                        <button @click="crearCupon" :disabled="formCupon.processing" class="btn-crear">
                            {{ formCupon.processing ? 'Creando...' : '+ Crear Cupón' }}
                        </button>
                    </div>

                    <!-- Lista cupones -->
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
                                        <span v-if="estaCaducado(cupon.fechaFin)" class="badge badge-caducado">
                                            Caducado
                                        </span>
                                        <span v-else :class="cupon.activo ? 'badge badge-abierto' : 'badge badge-cerrado'">
                                            {{ cupon.activo ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button @click="toggleCupon(cupon.id)" class="btn-toggle">
                                            {{ cupon.activo ? 'Desactivar' : 'Activar' }}
                                        </button>
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
.nav-btn { padding: 10px 20px; border-radius: 8px; border: 2px solid #003399; color: #003399; font-weight: 600; cursor: pointer; background: white; transition: all 0.2s; text-decoration: none; display: inline-block; }
.nav-btn:hover, .nav-btn.active { background: #003399; color: white; }

.section-title { font-size: 1.5rem; font-weight: bold; color: #003399; margin-bottom: 1.5rem; }

.stats-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; }
.stat-card { background: white; border-radius: 12px; padding: 1.5rem; border: 1px solid #e5e7eb; box-shadow: 0 2px 8px rgba(0,0,0,0.06); display: flex; flex-direction: column; align-items: center; text-align: center; gap: 8px; }
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 6px 16px rgba(0,0,0,0.1); transition: all 0.2s; }
.stat-icon { font-size: 2rem; }
.stat-number { font-size: 2rem; font-weight: bold; color: #003399; }
.stat-label { font-size: 0.85rem; color: #666; }
.stat-warning .stat-number { color: #e65100; }
.stat-green .stat-number   { color: #2e7d32; }
.stat-orange .stat-number  { color: #e65100; }
.stat-red .stat-number     { color: #b71c1c; }
.stat-blue .stat-number    { color: #010cf7; }

.table-wrapper { overflow-x: auto; border-radius: 10px; border: 1px solid #e5e7eb; }
.admin-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
.admin-table thead { background: #003399; color: white; }
.admin-table th { padding: 12px 16px; text-align: left; font-weight: 600; }
.admin-table td { padding: 12px 16px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
.admin-table tbody tr:hover { background: #f8f9ff; }
.problema-cell { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

.select-estado { padding: 5px 8px; border-radius: 6px; border: 1px solid #ccc; font-size: 0.85rem; cursor: pointer; }

.badge { font-size: 0.75rem; font-weight: bold; padding: 3px 10px; border-radius: 20px; text-transform: uppercase; white-space: nowrap; }
.badge-abierto { background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
.badge-progreso { background: #fff3e0; color: #e65100; border: 1px solid #ffcc80; }
.badge-cerrado  { background: #fce4ec; color: #b71c1c; border: 1px solid #ef9a9a; }

.cupon-form { background: #f8f9ff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 2rem; }
.form-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem; }
.campo { display: flex; flex-direction: column; gap: 5px; }
.campo label { font-weight: 600; font-size: 0.85rem; color: #333; }
.campo input, .campo select { padding: 8px; border: 1px solid #ccc; border-radius: 6px; font-size: 0.9rem; }
.error { color: red; font-size: 0.8rem; }

.btn-crear { background: #003399; color: white; padding: 10px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
.btn-crear:hover { background: #010cf7; }
.btn-crear:disabled { background: #90caf9; cursor: not-allowed; }

.btn-toggle { padding: 5px 12px; border-radius: 6px; border: 1px solid #003399; color: #003399; background: white; font-size: 0.8rem; cursor: pointer; transition: all 0.2s; }
.btn-toggle:hover { background: #003399; color: white; }
</style>