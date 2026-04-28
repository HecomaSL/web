<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({ pedidos: Array });

const pedidoAbierto = ref(null);
const togglePedido = (id) => { pedidoAbierto.value = pedidoAbierto.value === id ? null : id; };
const formatearPrecio = (p) => parseFloat(p).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€';

const getEstadoConfig = (estado) => {
    const configs = {
        'sin pagar': { css: 'bg-yellow-100 text-yellow-700', label: 'Pendiente de Pago' },
        'no servido': { css: 'bg-blue-100 text-blue-700', label: 'En Preparación' },
        'reparto': { css: 'bg-indigo-100 text-indigo-700', label: 'En Reparto' },
        'entregado': { css: 'bg-green-100 text-green-700', label: 'Entregado' },
        'exito': { css: 'bg-gray-800 text-white', label: 'Completado' },
        'cancelado': { css: 'bg-red-100 text-red-700', label: 'Cancelado' },
        'devuelto': { css: 'bg-orange-100 text-orange-700', label: 'Devuelto' }
    };
    return configs[estado] || { css: 'bg-gray-100 text-gray-600', label: estado };
};

const puedeDevolver = (pedido) => {
    if (!['entregado'].includes(pedido.estado))
        return false;
    const fechaPedido = new Date(pedido.diaPedido);
    const hoy = new Date();
    const diferenciaDias = (hoy - fechaPedido) / (1000 * 60 * 60 * 24);

    return diferenciaDias < 15;
};

const cancelarPedido = (id) => {
    if (confirm('¿Estás seguro de que deseas cancelar este pedido?'))
        form.post(route('pedido.cancelar', id));
};

const devolverPedido = (id) => {
    if (confirm('¿Deseas solicitar la devolución de este pedido?')) 
        form.post(route('pedido.devolver', id));
};

const mostrarModal = ref(false);
const idPedidoDevolucion = ref(null);

const form = useForm({ motivo: '' });

const abrirModalDevolucion = (id) => {
    idPedidoDevolucion.value = id;
    mostrarModal.value = true;
};

const enviarDevolucion = () => {
    if (form.motivo.length < 10) {
        alert('Por favor, describe el motivo con un poco más de detalle (mínimo 10 caracteres).');
        return;
    }

    form.post(route('pedido.devolver', idPedidoDevolucion.value), {
        onSuccess: () => {
            mostrarModal.value = false;
            form.reset();
        }
    });
};
</script>

<template>
    <Head title="Mis Pedidos" />
    <MainLayout>
        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-5xl mx-auto px-4">
                <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Historial de Pedidos</h1>

                <div v-for="pedido in pedidos" :key="pedido.idPedido"
                    class="mb-4 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">

                    <div class="p-6 flex flex-col md:flex-row justify-between items-center gap-4 cursor-pointer hover:bg-gray-50"
                        @click="togglePedido(pedido.idPedido)">
                        <div class="flex items-center gap-4">
                            <span class="text-[#010cf7] transition-transform duration-300" :class="{ 'rotate-180': pedidoAbierto === pedido.idPedido }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                            <div>
                                <span class="font-bold text-lg text-gray-900">Pedido {{ pedido.codigo_pedido }}</span>
                                <p class="text-xs text-gray-500">{{ pedido.diaPedido }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <p class="text-xs uppercase text-gray-400 font-bold">Total</p>
                                <p class="text-xl font-black text-[#010cf7]">{{ formatearPrecio(pedido.total) }}</p>
                            </div>
                            <span :class="['px-3 py-1 text-xs font-bold rounded-full uppercase', getEstadoConfig(pedido.estado).css]">
                                {{ getEstadoConfig(pedido.estado).label }}
                            </span>
                        </div>
                    </div>

                    <div v-if="pedidoAbierto === pedido.idPedido" class="border-t border-gray-100 bg-gray-50 p-6 animate-fade-in-down">
                        <h4 class="text-sm font-bold text-gray-700 mb-4 uppercase text-center md:text-left">Artículos:</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-gray-500 border-b border-gray-200">
                                    <tr>
                                        <th class="py-2">Referencia</th>
                                        <th class="py-2 text-center">Cant.</th>
                                        <th class="py-2 text-right">Precio</th>
                                        <th class="py-2 text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in pedido.items" :key="item.id"
                                        class="border-b border-gray-100 last:border-0 text-gray-700">
                                        <td class="py-3 font-medium text-gray-800">{{ item.nombre_articulo || 'Producto ID: ' + item.idProducto }}</td>
                                        <td class="py-3 text-center">{{ item.cantidadProducto }}</td>
                                        <td class="py-3 text-right">{{ formatearPrecio(item.precioUnitario) }}</td>
                                        <td class="py-3 text-right font-bold">{{ formatearPrecio(item.precioUnitario * item.cantidadProducto) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t pt-4">
                            <Link v-if="pedido.estado === 'sin pagar'" :href="route('pedido.exito', { id: pedido.idPedido })" class="bg-blue-600 text-white px-5 py-2 rounded shadow-sm text-xs font-bold hover:bg-blue-700">
                                FINALIZAR PAGO
                            </Link>

                            <button v-if="['sin pagar', 'no servido'].includes(pedido.estado)"  @click="cancelarPedido(pedido.idPedido)" class="bg-red-500 text-white px-5 py-2 rounded shadow-sm text-xs font-bold hover:bg-red-600">
                                CANCELAR PEDIDO
                            </button>

                            <button v-if="puedeDevolver(pedido)" @click="abrirModalDevolucion(pedido.idPedido)" class="bg-orange-500 text-white px-5 py-2 rounded shadow-sm text-xs font-bold hover:bg-orange-600">
                                SOLICITAR DEVOLUCIÓN
                            </button>

                            <div v-if="mostrarModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm">
                                <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full overflow-hidden animate-fade-in-up">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2">¿Por qué quieres devolver este pedido?</h3>
                                        <p class="text-sm text-gray-500 mb-4">Cuéntanos qué ha pasado para que podamos ayudarte mejor.</p>
                                        <textarea v-model="form.motivo" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#010cf7] focus:border-[#010cf7] p-3 text-sm" rows="4" placeholder="Ej: El producto es equivocado / El producto llegó dañado..."></textarea>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button @click="mostrarModal = false" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800">
                                                Cancelar
                                            </button>
                                            <button @click="enviarDevolucion" :disabled="form.processing" class="bg-[#010cf7] text-white px-6 py-2 rounded-lg font-bold text-sm hover:bg-blue-700 disabled:opacity-50">
                                                {{ form.processing ? 'Enviando...' : 'Confirmar Devolución' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span v-if="pedido.estado === 'exito'" class="text-green-600 font-bold text-sm italic">✓ Pedido completado con éxito</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>