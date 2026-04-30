<script setup>
import { useForm, router } from '@inertiajs/vue3';

defineProps({ cupones: Array });
const formCupon = useForm({ nombre: '', fechaInicio: '', fechaFin: '', tipo: 'porcentaje', valor: '', usos_maximos: '', minimo_pedido: '', });
const crearCupon = () => formCupon.post(route('admin.cupones.store'), {  onSuccess: () => formCupon.reset() });
const toggleCupon = (id) => router.post(route('admin.cupones.toggle', id));
const estaCaducado = (fechaFin) => {
    if (!fechaFin)
        return false;
    const hoy = new Date();   hoy.setHours(0,0,0,0);
    return new Date(fechaFin) < hoy;
};
</script>

<template>
  <div class="cupon-form">
    <h3 class="form-title">Crear nuevo cupón</h3>
    <div class="form-grid">
      <div class="campo">
        <label>Código/Nombre</label>
        <input v-model="formCupon.nombre" type="text" placeholder="Ej: VERANO24" />
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
        <input v-model="formCupon.valor" type="number" placeholder="0.00" />
      </div>
      <div class="campo">
        <label>Usos máx.</label>
        <input v-model="formCupon.usos_maximos" type="number" placeholder="Ej: 100" />
      </div>
      <div class="campo">
        <label>Mín. pedido (€)</label>
        <input v-model="formCupon.minimo_pedido" type="number" placeholder="Ej: 50" />
      </div>
      <div class="campo">
        <label>Fecha Inicio</label>
        <input v-model="formCupon.fechaInicio" type="date" />
      </div>
      <div class="campo">
        <label>Fecha Fin</label>
        <input v-model="formCupon.fechaFin" type="date" />
      </div>
    </div>
    <button @click="crearCupon" :disabled="formCupon.processing" class="btn-crear">
      {{ formCupon.processing ? 'Guardando...' : 'Crear Cupón' }}
    </button>
  </div>

  <div class="table-container mt-8">
    <div class="table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Descuento</th>
            <th>Uso Actual</th>
            <th>Mín. Pedido</th>
            <th>Estado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cupon in cupones" :key="cupon.id">
            <td class="font-bold text-[#003399]">{{ cupon.nombre }}</td>
            <td>
              <span class="valor-tag">{{ cupon.tipo === 'porcentaje' ? cupon.valor + '%' : cupon.valor + '€' }}</span>
            </td>
            <td>
              <div class="usos-info">
                <strong>{{ cupon.usos_actuales }}</strong> / {{ cupon.usos_maximos }}
              </div>
            </td>
            <td>{{ cupon.minimo_pedido }}€</td>
            <td>
              <span v-if="estaCaducado(cupon.fechaFin)" class="badge badge-caducado">Caducado</span>
              <span v-else :class="cupon.activo ? 'badge-abierto' : 'badge-cerrado'" class="badge">{{ cupon.activo ? 'Activo' : 'Inactivo' }}</span>
            </td>
            <td>
              <button @click="toggleCupon(cupon.id)" class="btn-toggle" :class="{'btn-off': cupon.activo}">{{ cupon.activo ? 'Desactivar' : 'Activar' }}</button>
            </td>
          </tr>
          <tr v-if="cupones.length === 0">
            <td colspan="6" class="empty-state">No hay cupones creados todavía.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
/* Formulario */
.cupon-form { background: #f8f9ff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
.form-title { font-weight: 800; color: #003399; margin-bottom: 1.5rem; font-size: 1.1rem; text-transform: uppercase; }
.form-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1.25rem; }
.campo { display: flex; flex-direction: column; gap: 0.5rem; }
.campo label { font-size: 0.85rem; font-weight: 600; color: #4b5563; }
.campo input, .campo select { padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 6px; outline: none; }
.campo input:focus { border-color: #003399; ring: 1px solid #003399; }
.btn-crear { background: #003399; color: white; padding: 0.75rem 1.5rem; border-radius: 8px; margin-top: 1.5rem; cursor: pointer; font-weight: bold; border: none; transition: background 0.2s; }
.btn-crear:hover { background: #010cf7; }
.btn-crear:disabled { opacity: 0.5; cursor: not-allowed; }

/* Tabla Estilizada */
.table-container { background: white; border-radius: 12px; border: 1px solid #e5e7eb; overflow: hidden; }
.table-wrapper { overflow-x: auto; }
.admin-table { width: 100%; border-collapse: collapse; text-align: left; }
.admin-table th { background: #f3f4f6; padding: 1rem; font-size: 0.8rem; text-transform: uppercase; color: #6b7280; border-bottom: 2px solid #e5e7eb; }
.admin-table td { padding: 1rem; border-bottom: 1px solid #f3f4f6; font-size: 0.9rem; }
.admin-table tr:hover { background: #f9fafb; }

/* Tags y Badges */
.valor-tag { background: #eff6ff; color: #1e40af; padding: 4px 8px; border-radius: 6px; font-weight: bold; }
.badge { padding: 4px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 700; }
.badge-abierto { background: #dcfce7; color: #166534; }
.badge-cerrado { background: #fee2e2; color: #991b1b; }
.badge-caducado { background: #374151; color: white; }

/* Botones Acción */
.btn-toggle { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; padding: 5px 12px;  border-radius: 6px; font-size: 0.8rem; cursor: pointer; font-weight: 600; }
.btn-toggle.btn-off { background: #fee2e2; color: #991b1b; border-color: #fecaca; }
.btn-toggle:hover { opacity: 0.8; }
.empty-state { text-align: center; padding: 2rem; color: #9ca3af; }
</style>