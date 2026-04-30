<script setup>
defineProps({ stats: Object });
</script>

<template>
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
</template>

<style scoped>
.stats-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; }
.stat-card { background: white; border-radius: 12px; padding: 1.5rem; border: 1px solid #e5e7eb; box-shadow: 0 2px 8px rgba(0, 0, 0, .06); display: flex; flex-direction: column; align-items: center; text-align: center; gap: 8px; transition: all .2s; }
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 6px 16px rgba(0, 0, 0, .1); }
.stat-icon { font-size: 2rem; }
.stat-number { font-size: 2rem; font-weight: bold; color: #003399; }
.stat-label { font-size: .85rem; color: #666; }
.stat-warning .stat-number { color: #e65100; }
.stat-green .stat-number { color: #2e7d32; }
.stat-orange .stat-number { color: #e65100; }
.stat-red .stat-number { color: #b71c1c; }
.stat-blue .stat-number { color: #010cf7; }
</style>