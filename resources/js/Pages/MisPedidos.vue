<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue'; // <--- Importante para el desplegable

const props = defineProps({
    pedidos: Array
});

// Variable para controlar qué pedido está expandido
const pedidoAbierto = ref(null);

const togglePedido = (id) => {
    if (pedidoAbierto.value === id) {
        pedidoAbierto.value = null;
    } else {
        pedidoAbierto.value = id;
    }
};

const formatearPrecio = (p) => parseFloat(p).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€';
</script>

<template>
    <Head title="Mis Pedidos" />
    <MainLayout>
        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-5xl mx-auto px-4">
                <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Historial de Pedidos</h1>

                <div v-for="pedido in pedidos" :key="pedido.idPedido" class="mb-4 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    
                    <div class="p-6 flex flex-col md:flex-row justify-between items-center gap-4 cursor-pointer hover:bg-gray-50" @click="togglePedido(pedido.idPedido)">
                        <div class="flex items-center gap-4">
                            <span class="text-[#010cf7] transition-transform duration-300" :class="{'rotate-180': pedidoAbierto === pedido.idPedido}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                            <div>
                                <span class="font-bold text-lg text-gray-900">Pedido #{{ pedido.idPedido }}</span>
                                <p class="text-xs text-gray-500">{{ pedido.diaPedido }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <p class="text-xs uppercase text-gray-400 font-bold">Total</p>
                                <p class="text-xl font-black text-[#010cf7]">{{ formatearPrecio(pedido.total) }}</p>
                            </div>
                            <span :class="{'px-3 py-1 text-xs font-bold rounded-full uppercase': true, 'bg-yellow-100 text-yellow-700': pedido.estado === 'sin pagar', 'bg-green-100 text-green-700': pedido.estado === 'pagado'}">
                                {{ pedido.estado }}
                            </span>
                        </div>
                    </div>

                    <div v-if="pedidoAbierto === pedido.idPedido" class="border-t border-gray-100 bg-gray-50 p-6 animate-fade-in-down">
                        <h4 class="text-sm font-bold text-gray-700 mb-4 uppercase">Artículos en este pedido:</h4>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-gray-500 border-b border-gray-200">
                                    <tr>
                                        <th class="py-2">Referencia</th>
                                        <th class="py-2 text-center">Cantidad</th>
                                        <th class="py-2 text-right">Precio Unit.</th>
                                        <th class="py-2 text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in pedido.items" :key="item.id" class="border-b border-gray-100 last:border-0 text-gray-700">
                                        <td class="py-3 font-medium text-gray-800">
                                            {{ item.nombre_articulo ? item.nombre_articulo : 'Sin Ref (ID: ' + item.idProducto + ')' }}
                                        </td>
                                        <td class="py-3 text-center">{{ item.cantidadProducto }}</td>
                                        <td class="py-3 text-right">{{ formatearPrecio(item.precioUnitario) }}</td>
                                        <td class="py-3 text-right font-bold">{{ formatearPrecio(item.precioUnitario * item.cantidadProducto) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div v-if="pedido.estado === 'sin pagar'" class="mt-6 flex justify-end">
                            <Link :href="route('pedido.confirmado')" class="bg-orange-500 text-white px-4 py-2 rounded text-xs font-bold hover:bg-orange-600">
                                REVISAR DATOS DE PAGO
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
.animate-fade-in-down {
    animation: fadeInDown 0.3s ease-out;
}
@keyframes fadeInDown {
    0% { opacity: 0; transform: translateY(-10px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>