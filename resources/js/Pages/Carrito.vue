<script setup>
import { ref, computed, watch } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import axios from 'axios'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const codigoCupon = ref('')
const cuponError = ref('')
const cuponCargando = ref(false)
const formatearPrecio = (valor) => { return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(valor) }

const aplicarCupon = async () => {
    if (!codigoCupon.value.trim())
        return
    
    cuponError.value = ''
    cuponCargando.value = true

    try {
        const res = await axios.post('/cupones/validar', { codigo: codigoCupon.value.trim().toUpperCase(), subtotal: cart.subtotal })
        cart.aplicarCupon(res.data.cupon) 
        cuponError.value = ''
        codigoCupon.value = ''
    } catch (e) {
        cuponError.value = e.response?.data?.message ?? 'Cupón no válido o expirado'
        cart.quitarCupon()
    } finally {
        cuponCargando.value = false
    }
}

const quitarCupon = () => {
    cart.quitarCupon()
    codigoCupon.value = ''
    cuponError.value = ''
}

watch(() => cart.subtotal, (nuevoSubtotal) => {
    if (cart.cupon && cart.cupon.minimo_pedido)
        if (nuevoSubtotal < cart.cupon.minimo_pedido) {
            cuponError.value = `Pedido mínimo para este cupón: ${formatearPrecio(cart.cupon.minimo_pedido)}`
            cart.quitarCupon()
        }
})
</script>

<template>
    <Head title="Tu Carrito - HECOMA" />
    <MainLayout>
        <section class="py-10 px-6 bg-gray-50 min-h-screen">
            <div class="container mx-auto max-w-6xl">
                <h1 class="text-3xl font-bold mb-10 uppercase tracking-wide text-[#0000BB]">Tu Carrito de Compra</h1>
                <div v-if="cart.items.length > 0" class="flex flex-col lg:flex-row gap-8">
                    <div class="flex-1 space-y-4">
                        <div v-for="item in cart.items" :key="item.id" class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-6">
                            <div class="flex-1 text-center sm:text-left">
                                <span class="text-xs font-bold text-gray-400 uppercase">{{ item.tipo }} | {{ item.familia }}</span>
                                <h3 class="font-bold text-lg text-gray-800">{{ item.referencia }}</h3>
                                <p v-if="item.stock === 'si'" class="text-green-600 text-sm font-medium">✓ En stock</p>
                                <p v-else class="text-orange-500 text-sm font-medium">🕒 Bajo pedido</p>
                                <p class="text-[#0000BB] font-bold mt-1">{{ formatearPrecio(item.precio) }}</p>
                            </div>

                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden bg-white">
                                <button @click="cart.updateQuantity(item.id, item.cantidad - 1)" class="px-3 py-1 hover:bg-gray-100 text-xl text-gray-600">-</button>
                                <span class="px-4 py-1 font-semibold border-x border-gray-300">{{ item.cantidad }}</span>
                                <button @click="cart.updateQuantity(item.id, item.cantidad + 1)" class="px-3 py-1 hover:bg-gray-100 text-xl text-gray-600">+</button>
                            </div>

                            <div class="text-right min-w-[120px]">
                                <p class="font-bold text-xl text-gray-800">{{ formatearPrecio(item.precio * item.cantidad) }}</p>
                                <button @click="cart.removeFromCart(item.id)" class="text-red-500 text-xs uppercase font-bold hover:underline mt-1">Eliminar</button>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-1/3">
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 sticky top-24">
                            <h2 class="text-xl font-bold mb-6 border-b pb-2 uppercase text-gray-700">Resumen</h2>

                            <div class="space-y-3 border-b pb-4 mb-4">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span>{{ formatearPrecio(cart.subtotal) }}</span>
                                </div>
                                
                                <div v-if="cart.cupon" class="flex justify-between text-green-600 font-medium">
                                    <span>Descuento ({{ cart.cupon.nombre }})</span>
                                    <span>- {{ formatearPrecio(cart.descuentoImporte) }}</span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div v-if="!cart.cupon" class="flex gap-2">
                                    <input v-model="codigoCupon" type="text" placeholder="CÓDIGO" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm uppercase focus:outline-none focus:ring-2 focus:ring-[#0000BB]" @keyup.enter="aplicarCupon" />
                                    <button @click="aplicarCupon" :disabled="cuponCargando || !codigoCupon" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-700 disabled:opacity-50 transition-colors">
                                        {{ cuponCargando ? '...' : 'Aplicar' }}
                                    </button>
                                </div>
                                <p v-if="cuponError" class="text-red-500 text-xs mt-1">{{ cuponError }}</p>
                                <div v-if="cart.cupon" class="flex items-center justify-between bg-green-50 border border-green-200 rounded-lg px-3 py-2 text-sm">
                                    <span class="text-green-700 font-bold uppercase">✓ {{ cart.cupon.nombre }}</span>
                                    <button @click="quitarCupon" class="text-red-400 hover:text-red-600 font-bold">✕</button>
                                </div>
                            </div>

                            <div class="flex justify-between text-2xl font-bold text-[#0000BB] mb-8">
                                <span>TOTAL</span>
                                <span>{{ formatearPrecio(cart.subtotal - cart.descuentoImporte) }}</span>
                            </div>

                            <Link href="/tramitar-pedido" class="w-full bg-[#0000BB] text-white py-4 rounded-lg font-bold uppercase hover:bg-blue-800 transition-all shadow-lg text-center block">Tramitar Pedido</Link>
                            <Link href="/catalogo" class="block text-center mt-4 text-gray-500 hover:underline text-sm font-medium">← Continuar comprando</Link>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center py-24 bg-white rounded-2xl shadow-sm border-2 border-dashed border-gray-200">
                    <div class="text-6xl mb-4">🛒</div>
                    <p class="text-xl text-gray-500 mb-8 font-medium">Tu carrito está vacío</p>
                    <Link href="/catalogo" class="bg-[#0000BB] text-white px-10 py-4 rounded-xl font-bold uppercase hover:bg-blue-800 transition-colors shadow-xl">Explorar Catálogo</Link>
                </div>
            </div>
        </section>
    </MainLayout>
</template>