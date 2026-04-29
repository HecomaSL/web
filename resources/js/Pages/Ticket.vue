<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    tickets: Array
});

const mostrandoFormulario = ref(false);

const form = useForm({
    titulo: '',
    problema: '',
});

const enviarTicket = () => {
    form.post(route('tickets.store'), {
        onSuccess: () => { form.reset(); mostrandoFormulario.value = false; },
        onError: (errors) => { console.log('Errores:', errors); },
        onFinish: () => { console.log('Finished'); }
    });
};

const colorEstado = (estado) => {
    switch (estado) {
        case 'abierto':     return 'badge badge-abierto';
        case 'En progreso': return 'badge badge-progreso';
        case 'cerrado':     return 'badge badge-cerrado';
        default:            return 'badge';
    }
};
</script>

<template>
    <Head title="Mis Tickets" />

    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">Soporte Técnico</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-10">

            <div v-if="!mostrandoFormulario">
                <div class="container mx-auto px-6 mb-4">
                    <h2 class="text-[#010cf7] text-3xl font-bold">Mis Tickets</h2>
                </div>

                <div class="grid">
                    <div v-for="ticket in tickets" :key="ticket.id" class="ticket">
                        <div class="ticket-header">
                            <h3>{{ ticket.titulo }}</h3>
                            <span :class="colorEstado(ticket.estado)">{{ ticket.estado }}</span>
                        </div>
                        <div class="ticket-body">
                            <p><strong>Problema:</strong> {{ ticket.problema }}</p>
                            <p><small>Fecha: {{ ticket.fecha_formateada }}</small></p>
                        </div>
                    </div>
                </div>

                <button class="btn-nuevo" @click="mostrandoFormulario = true">
                    + Nuevo Ticket
                </button>
            </div>

            <div v-else class="formulario-ticket">
                <h2>Explicar Problema</h2>

                <div class="campo">
                    <label>Título del problema</label>
                    <input v-model="form.titulo" type="text" placeholder="Ej: No carga la página" />
                </div>

                <div class="campo">
                    <label>Descripción detallada</label>
                    <textarea v-model="form.problema" placeholder="Describe qué sucede..."></textarea>
                </div>

                <div v-if="form.errors.titulo" class="error">{{ form.errors.titulo }}</div>
                <div v-if="form.errors.problema" class="error">{{ form.errors.problema }}</div>

                <div class="acciones">
                    <button type="button" @click="enviarTicket" :disabled="form.processing" class="btn-enviar">
                        {{ form.processing ? 'Enviando...' : 'Enviar Reporte' }}
                    </button>
                    <button type="button" @click="mostrandoFormulario = false" class="btn-cancelar">
                        Cancelar
                    </button>
                </div>
            </div>

        </section>
    </MainLayout>
</template>

<style scoped>
.grid { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 20px; }
.ticket { border: 2px dashed #333; padding: 15px; background-color: #fff9c4; width: 250px; border-radius: 10px; }
.ticket-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; gap: 8px; }
.ticket-header h3 { margin: 0; font-size: 1rem; font-weight: bold; flex: 1; }
.badge { font-size: 0.75rem; font-weight: bold; padding: 3px 10px; border-radius: 20px; text-transform: uppercase; white-space: nowrap; }
.badge-abierto { background-color: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
.badge-progreso { background-color: #fff3e0; color: #e65100; border: 1px solid #ffcc80; }
.badge-cerrado { background-color: #fce4ec; color: #b71c1c; border: 1px solid #ef9a9a; }
.formulario-ticket { max-width: 400px; background: #f4f4f4; padding: 20px; border-radius: 8px; }
.campo { margin-bottom: 15px; }
.campo label { display: block; margin-bottom: 5px; font-weight: bold; }
.campo input, .campo textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
.campo textarea { min-height: 100px; resize: vertical; }
.error { color: red; font-size: 0.85rem; margin-bottom: 10px; }
.btn-nuevo { background: #4caf50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
.btn-enviar { background: #2196f3; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }
.btn-enviar:disabled { background: #90caf9; cursor: not-allowed; }
.btn-cancelar { background: transparent; border: none; color: #666; margin-left: 10px; cursor: pointer; }
</style>