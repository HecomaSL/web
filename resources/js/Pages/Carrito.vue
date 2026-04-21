<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore'; // Importamos la tienda real

// Accedemos al store
const cart = useCartStore();

// Formateador de precios
const formatearPrecio = (valor) => {
    return new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'EUR'
    }).format(valor);
};
</script>

<template>
    <Head title="Tu Carrito - HECOMA" />

    <MainLayout>
        <section class="py-16 px-6 bg-gray-50 min-h-screen">
            <div class="container mx-auto max-w-6xl">
                <h1 class="text-3xl font-bold mb-10 uppercase tracking-wide text-[#0000BB]">
                    Tu Carrito de Compra
                </h1>

                <div v-if="cart.items.length > 0" class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="flex-1 space-y-4">
                        <div v-for="item in cart.items" :key="item.id" 
                             class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-6">
                            
                            <div class="flex-1 text-center sm:text-left">
                                <span class="text-xs font-bold text-gray-400 uppercase">
                                    {{ item.tipo }} | {{ item.familia }}
                                </span>
                                <h3 class="font-bold text-lg text-gray-800">{{ item.referencia }}</h3>
                                
                                <p v-if="item.stock === 'si'" class="text-green-600 text-sm font-medium">
                                    ✓ En stock (Entrega 48/72h)
                                </p>
                                <p v-else class="text-orange-500 text-sm font-medium">
                                    🕒 Disponible bajo pedido (Entrega 3-9 semanas)
                                </p>
                                
                                <p class="text-[#0000BB] font-bold mt-1">
                                    {{ formatearPrecio(item.precio) }} <span class="text-gray-400 text-sm font-normal">/ ud.</span>
                                </p>
                            </div>

                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden bg-white">
                                <button @click="cart.updateQuantity(item.id, item.cantidad - 1)" 
                                        class="px-3 py-1 hover:bg-gray-100 text-xl text-gray-600">-</button>
                                <span class="px-4 py-1 font-semibold border-x border-gray-300">
                                    {{ item.cantidad }}
                                </span>
                                <button @click="cart.updateQuantity(item.id, item.cantidad + 1)" 
                                        class="px-3 py-1 hover:bg-gray-100 text-xl text-gray-600">+</button>
                            </div>

                            <div class="text-right min-w-[120px]">
                                <p class="font-bold text-xl text-gray-800">
                                    {{ formatearPrecio(item.precio * item.cantidad) }}
                                </p>
                                <button @click="cart.removeFromCart(item.id)" 
                                        class="text-red-500 text-xs uppercase font-bold hover:underline mt-1">
                                    Eliminar
                                </button>
                            </div>
                        </div>

                        <div class="text-right">
                            <button @click="cart.clearCart()" class="text-gray-400 text-sm hover:text-red-500 transition-colors">
                                🗑 Vaciar carrito
                            </button>
                        </div>
                    </div>

                    <div class="lg:w-1/3">
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 sticky top-24">
                            <h2 class="text-xl font-bold mb-6 border-b pb-2 uppercase text-gray-700">Resumen</h2>
                            
                            <div class="space-y-3 border-b pb-4 mb-4">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal (Base)</span>
                                    <span>{{ formatearPrecio(cart.subtotal) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Envío</span>
                                    <span>{{ formatearPrecio(cart.envio) }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between text-2xl font-bold text-[#0000BB] mb-8">
                                <span>TOTAL</span>
                                <span>{{ formatearPrecio(cart.totalFinal) }}</span>
                            </div>

                            <a href="/tramitar-pedido"><button class="w-full bg-[#0000BB] text-white py-4 rounded-lg font-bold uppercase hover:bg-blue-800 transition-all shadow-lg active:scale-95">
                                Tramitar Pedido
                            </button></a>

                            <Link href="/catalogo" class="block text-center mt-4 text-gray-500 hover:underline text-sm font-medium">
                                ← Continuar comprando
                            </Link>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center py-24 bg-white rounded-2xl shadow-sm border-2 border-dashed border-gray-200">
                    <div class="text-6xl mb-4">🛒</div>
                    <p class="text-xl text-gray-500 mb-8 font-medium">Tu carrito está vacío en este momento</p>
                    <Link href="/catalogo" class="bg-[#0000BB] text-white px-10 py-4 rounded-xl font-bold uppercase hover:bg-blue-800 transition-colors shadow-xl">
                        Explorar Catálogo
                    </Link>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
/* Transiciones suaves para la interactividad */
button {
    transition: all 0.2s ease;
}
</style>