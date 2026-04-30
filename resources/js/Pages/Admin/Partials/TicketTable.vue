<script setup>
import { router } from '@inertiajs/vue3';

defineProps({ tickets: Array });

const cambiarEstadoTicket = (id, estado) => router.post(route('admin.tickets.update', id), { estado });
const colorEstado = (estado) => ({ abierto: 'badge badge-abierto', 'En progreso': 'badge badge-progreso', cerrado: 'badge badge-cerrado', }[estado] ?? 'badge');
</script>

<template>
  <div class="table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>#</th><th>Usuario</th><th>Email</th><th>Título</th><th>Problema</th><th>Estado</th><th>Fecha</th><th>Acción</th>
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
</template>

<style scoped>
.table-wrapper { overflow-x: auto; border: 1px solid #e5e7eb; border-radius: 10px; }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th { background: #003399; color: white; padding: 12px; text-align: left; }
.admin-table td { padding: 12px; border-bottom: 1px solid #f0f0f0; }
.badge { font-size: .75rem; font-weight: bold; padding: 3px 10px; border-radius: 20px; text-transform: uppercase; }
.badge-abierto { background: #e8f5e9; color: #2e7d32; }
.badge-progreso { background: #fff3e0; color: #e65100; }
.badge-cerrado { background: #fce4ec; color: #b71c1c; }
.problema-cell { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
</style>