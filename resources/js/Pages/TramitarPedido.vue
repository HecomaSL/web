<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore';
import { computed, onMounted } from 'vue';
import { watch } from 'vue';

const cart = useCartStore();
const user = usePage().props.auth.user;

// Formulario de Inertia con todos los campos necesarios
const form = useForm({
    nombre: user.nombre || '',
    email: user.email || '',
    tlfn: user.tlfn || '',
    direccion: user.direccion || '',
    ciudad: '',
    cp: '',
    metodo_pago: 'transferencia',
    items: [],
    nombre_cupon: cart.cupon ? cart.cupon.nombre : null, 
    descuento_total: 0,
    total: 0   
});

// Helpers para formateo
const formatearPrecio = (valor) => {
    const numero = parseFloat(valor);
    if (isNaN(numero)) return '0,00 €';
    return numero.toLocaleString('es-ES', { style: 'currency', currency: 'EUR' });
};

const enviarPedido = () => {
    // Preparar items para el servidor
    form.items = cart.items.map(item => ({
        id: item.id,
        referencia: item.referencia,
        precio: parseFloat(item.precio || 0),
        cantidad: parseInt(item.cantidad || 0)
    }));
    
    // Capturar valores del store en el momento del envío
    form.nombre_cupon = cart.cupon ? cart.cupon.nombre : null;
    form.descuento_total = cart.descuentoImporte;
    form.total = cart.totalFinal;

    form.post(route('pedido.store'), {
        onSuccess: () => {
            cart.clearCart();
            window.location.href = '/pedido-confirmado'; 
        },
        onError: (errors) => { console.error("Errores en el envío:", errors); },
        preserveScroll: true,
    });
};

// Seguridad: Si recargan y el carrito está vacío, volver atrás
onMounted(() => { if (cart.items.length === 0) window.location.href = '/carrito'; });

watch(() => form.metodo_envio, (nuevoMetodo) => { cart.metodoEnvio = nuevoMetodo; }, { immediate: true });
</script>

<template>
    <Head title="Tramitar Pedido" />
    <MainLayout>
        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">DATOS DE ENTREGA</h2>
                    <form @submit.prevent="enviarPedido" class="space-y-5">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-400 uppercase mb-1">Nombre y Apellidos</label>
                                <input v-model="form.nombre" type="text" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none" required />
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-400 uppercase mb-1">Teléfono</label>
                                <input v-model="form.tlfn" type="text" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none" required />
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-400 uppercase mb-1">Dirección Completa</label>
                                <input v-model="form.direccion" type="text" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none" required />
                            </div>

                            <div class="flex gap-4">
                                <div class="flex-1 flex flex-col">
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1">Ciudad</label>
                                    <input v-model="form.ciudad" type="text" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none" required />
                                </div>
                                <div class="w-1/3 flex flex-col">
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1">C.P.</label>
                                    <input v-model="form.cp" type="text" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none" required />
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <label class="block font-bold text-gray-700 mb-3">MÉTODO DE ENVÍO</label>
                            <div class="space-y-2">
                                <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer transition-colors" :class="form.metodo_envio === 'domicilio' ? 'border-blue-600 bg-blue-50' : 'border-gray-200'">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" v-model="form.metodo_envio" value="domicilio" class="w-4 h-4 text-blue-600">
                                        <span class="text-sm font-medium text-gray-800">Envío a domicilio</span>
                                    </div>
                                    <span class="text-sm font-bold text-gray-600">{{ formatearPrecio(cart.costeEnvioBase) }}</span>
                                </label>

                                <label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer transition-colors" :class="form.metodo_envio === 'recogida' ? 'border-blue-600 bg-blue-50' : 'border-gray-200'">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" v-model="form.metodo_envio" value="recogida" class="w-4 h-4 text-blue-600">
                                        <span class="text-sm font-medium text-gray-800">Recogida en Local (Sonseca / Lucena)</span>
                                    </div>
                                    <span class="text-sm font-bold text-green-600">GRATIS</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <label class="block font-bold text-gray-700 mb-3">MÉTODO DE PAGO</label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors" :class="{'border-blue-600 bg-blue-50': form.metodo_pago === 'transferencia'}">
                                    <input type="radio" v-model="form.metodo_pago" value="transferencia" class="w-4 h-4 text-blue-600">
                                    <span class="text-sm font-medium">Transferencia Bancaria</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors" :class="{'border-blue-600 bg-blue-50': form.metodo_pago === 'tarjeta'}">
                                    <input type="radio" v-model="form.metodo_pago" value="tarjeta" class="w-4 h-4 text-blue-600">
                                    <span class="text-sm font-medium">Tarjeta de Crédito</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" :disabled="form.processing" class="w-full bg-[#010cf7] text-white py-4 rounded-xl font-bold uppercase hover:bg-blue-800 transition-all shadow-lg active:scale-95 disabled:opacity-50 mt-4">
                            {{ form.processing ? 'PROCESANDO PEDIDO...' : `FINALIZAR Y PAGAR ${formatearPrecio(cart.totalFinal)}` }}
                        </button>
                    </form>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 h-fit sticky top-24">
                    <h2 class="text-xl font-bold mb-6 text-gray-800 uppercase tracking-tight">RESUMEN DEL PEDIDO</h2>
                    <div class="max-h-64 overflow-y-auto mb-6 pr-2 space-y-4">
                        <div v-for="item in cart.items" :key="item.id" class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-800 text-sm uppercase">{{ item.referencia }}</span>
                                <span class="text-gray-400 text-xs italic">Cantidad: {{ item.cantidad }}</span>
                            </div>
                            <span class="font-bold text-gray-900">{{ formatearPrecio(item.precio * item.cantidad) }}</span>
                        </div>
                    </div>

                    <div class="border-t pt-6 space-y-3">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span>{{ formatearPrecio(cart.subtotal) }}</span>
                        </div>
                        
                        <div v-if="cart.cupon" class="flex justify-between text-green-600 font-bold bg-green-50 p-2 rounded-lg">
                            <span>Cupón: {{ cart.cupon.nombre }}</span>
                            <span>- {{ formatearPrecio(cart.descuentoImporte) }}</span>
                        </div>

                        <div class="flex justify-between text-gray-500">
                            <span>Gastos de envío</span>
                            <span>{{ formatearPrecio(cart.envio) }}</span>
                        </div>

                        <div class="flex justify-between text-2xl font-black text-[#010cf7] pt-4 border-t mt-4">
                            <span>TOTAL</span>
                            <span>{{ formatearPrecio(cart.totalFinal) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>