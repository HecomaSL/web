<script setup>
import { ref, computed } from 'vue';

const props = defineProps({ ingresosPorFecha: Array });

const MESES = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
const formatearMes = (str) => {
  const partes = str.split('-');
  return `${MESES[parseInt(partes[1]) - 1]} / ${partes[0].slice(2)}`;
};

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

const svgW = 700, svgH = 280, padL = 62, padR = 20, padT = 20, padB = 60;
const chartW = svgW - padL - padR;
const chartH = svgH - padT - padB;

const datosGrafico = computed(() => {
  const raw = props.ingresosPorFecha ?? [];
  if (!raw.length)
    return null;

  const porMes = {};
  for (const d of raw) {
    const clave = d.fecha.slice(0, 7);
    porMes[clave] = (porMes[clave] || 0) + d.total;
  }

  const claves = Object.keys(porMes).sort();
  const hoy = new Date();
  const mesActual = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}`;
  const rango = generarRangoMeses(claves[0] || mesActual, mesActual);

  const datos = rango.map(mes => ({ mes, total: porMes[mes] ?? 0 }));
  const maxVal = Math.max(...datos.map(d => d.total), 1);
  const n = datos.length;

  const pts = datos.map((d, i) => ({ 
    x: padL + (i / (n - 1 || 1)) * chartW, 
    y: padT + chartH - (d.total / maxVal) * chartH, 
    ...d, 
  }));

  const linea = pts.map((p, i) => `${i === 0 ? 'M' : 'L'}${p.x.toFixed(1)},${p.y.toFixed(1)}`).join(' ');
  const area = `${linea} L${pts[n - 1].x.toFixed(1)},${(padT + chartH).toFixed(1)} L${padL},${(padT + chartH).toFixed(1)} Z`;

  const ticks = Array.from({ length: 5 }, (_, i) => ({ y: padT + chartH - (i / 4) * chartH, label: ((maxVal / 4) * i).toFixed(0) + '€', }));

  const step = Math.max(1, Math.ceil(n / 12));
  const xTicks = datos.filter((_, i) => i % step === 0 || i === n - 1)
  .map((d) => {
    const idx = datos.findIndex(x => x.mes === d.mes);
    return { x: padL + (idx / (n - 1 || 1)) * chartW, label: formatearMes(d.mes) };
  });

  return { pts, linea, area, ticks, xTicks };
});

const tooltip1 = ref(null);
</script>

<template>
  <div class="chart-card">
    <h2 class="section-title">Ingresos por fecha</h2>
    <div v-if="!datosGrafico" class="empty-state">Sin datos de ingresos disponibles.</div>
    <div v-else class="chart-container">
      <svg :viewBox="`0 0 ${svgW} ${svgH}`" class="chart-svg" @mouseleave="tooltip1 = null">
        <defs>
          <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#010cf7" stop-opacity="0.25" />
            <stop offset="100%" stop-color="#010cf7" stop-opacity="0.02" />
          </linearGradient>
        </defs>
        <line v-for="t in datosGrafico.ticks" :key="t.y" :x1="padL" :y1="t.y" :x2="svgW - padR" :y2="t.y" stroke="#e5e7eb" stroke-width="1" />
        <text v-for="t in datosGrafico.ticks" :key="'yl' + t.y" :x="padL - 8" :y="t.y + 4" text-anchor="end" class="axis-label">{{ t.label }}</text>
        <text v-for="t in datosGrafico.xTicks" :key="'xl' + t.x" :x="t.x" :y="padT + chartH + 20" text-anchor="middle" class="axis-label">{{ t.label }}</text>
        <path :d="datosGrafico.area" fill="url(#areaGrad)" />
        <path :d="datosGrafico.linea" fill="none" stroke="#010cf7" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round" />
        <circle v-for="(pt, i) in datosGrafico.pts" :key="i" :cx="pt.x" :cy="pt.y" r="5" fill="white" stroke="#010cf7" stroke-width="2" class="dot" @mouseenter="tooltip1 = pt" />
        <g v-if="tooltip1">
          <rect :x="tooltip1.x - 50" :y="tooltip1.y - 42" width="100" height="36" rx="6" fill="#1e293b" />
          <text :x="tooltip1.x" :y="tooltip1.y - 26" text-anchor="middle" fill="white" font-size="11" font-weight="600">{{ tooltip1.mes }}</text>
          <text :x="tooltip1.x" :y="tooltip1.y - 12" text-anchor="middle" fill="#7dd3fc" font-size="12" font-weight="700">{{ Number(tooltip1.total).toFixed(2) }}€</text>
        </g>
      </svg>
    </div>
  </div>
</template>

<style scoped>
.chart-card { background: white; border: 1px solid #e5e7eb; border-radius: 14px; padding: 1.75rem; box-shadow: 0 2px 10px rgba(0, 0, 0, .05); }
.section-title { font-size: 1.5rem; font-weight: bold; color: #003399; margin-bottom: 1.5rem; }
.chart-svg { width: 100%; height: auto; display: block; }
.axis-label { font-size: 11px; fill: #888; font-family: monospace; }
.dot { cursor: pointer; transition: r .1s; }
.dot:hover { r: 7; }
.empty-state { text-align: center; color: #999; padding: 3rem 0; }
</style>