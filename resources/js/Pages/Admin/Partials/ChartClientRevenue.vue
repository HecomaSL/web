<script setup>
import { ref, computed } from 'vue';

const props = defineProps({ usuarios: Array });

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

const seleccionarUsuario = async (u) => {
    usuarioSel.value = u;
    busqueda.value = u.nombre;
    dropVisible.value = false;
    loadingBar.value = true;
    try {
      const res = await fetch(route('admin.ingresos.cliente', u.id));
      barDataRaw.value = await res.json();
    } catch {
      barDataRaw.value = [];
    } finally {
      loadingBar.value = false;
    }
};

const barData = computed(() => {
    if (!barDataRaw.value.length)
      return [];
    const porMes = Object.fromEntries(barDataRaw.value.map(d => [d.mes, d.total]));
    const claves = Object.keys(porMes).sort();
    const hoy = new Date();
    const mesActual = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}`;
    
    const resultado = [];
    let cur = new Date(claves[0] + '-01');
    const fin = new Date(mesActual + '-01');
    while(cur <= fin) {
      const m = `${cur.getFullYear()}-${String(cur.getMonth()+1).padStart(2,'0')}`;
      resultado.push({ mes: m, total: porMes[m] ?? 0 });
      cur.setMonth(cur.getMonth()+1);
    }
    return resultado;
});

const barSvgW = 700, barSvgH = 280, barPadL = 62, barPadR = 20, barPadT = 20, barPadB = 60;
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
  const bars = datos.map((d, i) => ({ x: barPadL + gap * (i + 1) + bw * i, y: barPadT + barChartH - (d.total / maxVal) * barChartH, h: (d.total / maxVal) * barChartH, w: bw, ...d }));
  const ticks = Array.from({ length: 5 }, (_, i) => ({ y: barPadT + barChartH - (i / 4) * barChartH, label: ((maxVal / 4) * i).toFixed(0) + '€' }));
  return { bars, ticks, step: Math.max(1, Math.ceil(n / 14)) };
});

const tooltip2 = ref(null);
</script>

<template>
  <div class="chart-card mt-8">
    <h2 class="section-title">Ingresos por cliente (mensual)</h2>
    <div class="selector-wrapper">
      <div class="selector-input-wrap">
        <span class="selector-icon">🔍</span>
        <input v-model="busqueda" @focus="dropVisible = true" @blur="setTimeout(() => dropVisible = false, 150)" type="text" placeholder="Buscar cliente..." class="selector-input" />
        <button v-if="busqueda" @click="busqueda = ''; usuarioSel = null; barDataRaw = []" class="clear-btn">✕</button>
      </div>
      <div v-if="dropVisible && usuariosFiltrados.length" class="dropdown">
        <div v-for="u in usuariosFiltrados" :key="u.id" @mousedown.prevent="seleccionarUsuario(u)" class="dropdown-item">
          <span class="drop-name">{{ u.nombre }}</span>
          <span class="drop-email">{{ u.email }}</span>
        </div>
      </div>
    </div>

    <div v-if="!usuarioSel" class="empty-state">Selecciona un cliente para ver sus ingresos.</div>
    <div v-else-if="loadingBar" class="empty-state">⏳ Cargando datos...</div>
    <div v-else-if="!datosBarras" class="empty-state">Sin pedidos registrados.</div>
    <div v-else class="chart-container">
      <div class="client-header">
        <span class="client-tag">{{ usuarioSel.nombre }}</span>
        <span class="client-total">Total: {{ barData.reduce((a, b) => a + Number(b.total), 0).toFixed(2) }}€</span>
      </div>
      <svg :viewBox="`0 0 ${barSvgW} ${barSvgH}`" class="chart-svg" @mouseleave="tooltip2 = null">
        <line v-for="t in datosBarras.ticks" :key="t.y" :x1="barPadL" :y1="t.y" :x2="barSvgW - barPadR" :y2="t.y" stroke="#e5e7eb" stroke-width="1" />
        <text v-for="t in datosBarras.ticks" :key="'by' + t.y" :x="barPadL - 8" :y="t.y + 4" text-anchor="end" class="axis-label">{{ t.label }}</text>
        <g v-for="(b, i) in datosBarras.bars" :key="i" @mouseenter="tooltip2 = b" class="bar-group">
          <rect :x="b.x" :y="b.y" :width="b.w" :height="b.h" rx="4" :fill="tooltip2?.mes === b.mes ? '#010cf7' : '#3b5cdb'" class="bar-rect" />
          <text v-if="i % datosBarras.step === 0" :x="b.x + b.w / 2" :y="barPadT + barChartH + 20" text-anchor="middle" class="axis-label">{{ b.mes }}</text>
        </g>
        <g v-if="tooltip2">
          <rect :x="tooltip2.x + tooltip2.w / 2 - 52" :y="tooltip2.y - 44" width="104" height="38" rx="6" fill="#1e293b" />
          <text :x="tooltip2.x + tooltip2.w / 2" :y="tooltip2.y - 28" text-anchor="middle" fill="white" font-size="11">{{ tooltip2.mes }}</text>
          <text :x="tooltip2.x + tooltip2.w / 2" :y="tooltip2.y - 12" text-anchor="middle" fill="#7dd3fc" font-size="12" font-weight="700">{{ Number(tooltip2.total).toFixed(2) }}€</text>
        </g>
      </svg>
    </div>
  </div>
</template>

<style scoped>
.chart-card { background: white; border: 1px solid #e5e7eb; border-radius: 14px; padding: 1.75rem; }
.selector-input-wrap { display: flex; align-items: center; border: 2px solid #003399; border-radius: 8px; background: white; }
.selector-input { flex: 1; border: none; padding: 9px; outline: none; }
.dropdown { position: absolute; background: white; border: 1px solid #d1d5db; width: 100%; z-index: 50; border-radius: 8px; max-height: 200px; overflow-y: auto; }
.dropdown-item { padding: 10px; cursor: pointer; border-bottom: 1px solid #eee; }
.dropdown-item:hover { background: #f0f4ff; }
.client-tag { background: #010cf7; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; }
.axis-label { font-size: 10px; fill: #888; }
</style>