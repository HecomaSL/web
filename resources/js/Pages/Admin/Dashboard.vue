<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

// Importar sub-componentes
import AdminStats from './Partials/AdminStats.vue';
import ChartRevenue from './Partials/ChartRevenue.vue';
import ChartClientRevenue from './Partials/ChartClientRevenue.vue';
import TicketTable from './Partials/TicketTable.vue';
import CouponManager from './Partials/CouponManager.vue';

defineProps({ 
  stats: Object, 
  tickets: Array, 
  cupones: Array, 
  ingresosPorFecha: Array, 
  usuarios: Array 
});

const seccionActiva = ref('dashboard');
</script>

<template>
    <Head title="Panel Administrador | HECOMA" />
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase">Panel de Administración</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-10">
            <div class="max-w-7xl mx-auto">
                <div class="flex gap-3 mb-8 flex-wrap">
                    <button @click="seccionActiva = 'dashboard'" :class="['nav-btn', seccionActiva === 'dashboard' ? 'active' : '']">📊 Dashboard</button>
                    <button @click="seccionActiva = 'graficos'" :class="['nav-btn', seccionActiva === 'graficos' ? 'active' : '']">📈 Gráficos</button>
                    <button @click="seccionActiva = 'tickets'" :class="['nav-btn', seccionActiva === 'tickets' ? 'active' : '']">🎫 Tickets</button>
                    <button @click="seccionActiva = 'cupones'" :class="['nav-btn', seccionActiva === 'cupones' ? 'active' : '']">🏷️ Cupones</button>
                </div>

                <AdminStats v-if="seccionActiva === 'dashboard'" :stats="stats" />

                <div v-if="seccionActiva === 'graficos'">
                    <ChartRevenue :ingresosPorFecha="ingresosPorFecha" />
                    <ChartClientRevenue :usuarios="usuarios" />
                </div>

                <TicketTable v-if="seccionActiva === 'tickets'" :tickets="tickets" />

                <CouponManager v-if="seccionActiva === 'cupones'" :cupones="cupones" />
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
.nav-btn { padding: 10px 20px; border-radius: 8px; border: 2px solid #003399; color: #003399; font-weight: 600; cursor: pointer; background: white; transition: all .2s; }
.nav-btn:hover, .nav-btn.active { background: #003399; color: white; }
</style>