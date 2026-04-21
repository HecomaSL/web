<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore';
import { computed } from 'vue';

const cart = useCartStore();
const user = usePage().props.auth.user;

const form = useForm({
    nombre: user.nombre || '',
    email: user.email || '',
    tlfn: user.tlfn || '',
    direccion: user.direccion || '',
    ciudad: '',
    cp: '',
    metodo_pago: 'transferencia',
    items: [], // Se llenará antes de enviar
    total: 0   // Se llenará antes de enviar
});

const totalCarrito = computed(() => {
    return cart.items.reduce((total, item) => {
        // Aseguramos que pillamos el precio y la cantidad, se llamen como se llamen
        const precio = parseFloat(item.precio || item.price || 0);
        const cantidad = parseInt(item.quantity || item.cantidad || 0);
        
        return total + (precio * cantidad);
    }, 0);
});

const enviarPedido = () => {
    // 1. Mapeamos los datos del carrito al formato que espera el nuevo PedidoController
    form.items = cart.items.map(item => {
        return {
            id: item.id, // Se convertirá en idProducto en el servidor
            referencia: item.referencia, // Info extra para el controlador
            // Forzamos que sean números para evitar errores de tipo en la DB
            precio: parseFloat(item.precio || item.price || 0), // Se convertirá en precioUnitario
            cantidad: parseInt(item.quantity || item.cantidad || 0) // Se convertirá en cantidadProducto
        };
    });
    
    // 2. Asignamos el total calculado del carrito al formulario
    form.total = totalCarrito.value;

    // 3. Enviamos la petición POST al controlador
    form.post(route('pedido.store'), {
        // Solo si el servidor responde con éxito (200 OK)
        onSuccess: () => {
            cart.clearCart();
            // Rediriges a una página que tú crees o al dashboard con un modal
            window.location.href = '/pedido-confirmado'; 
        },
        // Si hay errores de validación (ej: tlfn vacío)
        onError: (errors) => {
            console.error("Errores en el formulario:", errors);
        },
        // Evitamos que se pueda pulsar el botón mil veces mientras carga
        preserveScroll: true,
    });
};

const formatearPrecio = (valor) => {
    const numero = parseFloat(valor);
    if (isNaN(numero)) return '0,00€';
    return numero.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '€';
};

</script>

<template>
    <Head title="Tramitar Pedido" />
    <MainLayout>
        <div class="py-12 bg-gray-100">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Datos de Entrega</h2>
                    <form @submit.prevent="enviarPedido" class="space-y-4">
                        <input v-model="form.nombre" placeholder="Nombre" class="w-full border p-2 rounded" required />
                        <input v-model="form.tlfn" placeholder="Teléfono" class="w-full border p-2 rounded" required />
                        <input v-model="form.direccion" placeholder="Dirección" class="w-full border p-2 rounded" required />
                        <div class="flex gap-2">
                            <input v-model="form.ciudad" placeholder="Ciudad" class="w-1/2 border p-2 rounded" required />
                            <input v-model="form.cp" placeholder="C.P." class="w-1/2 border p-2 rounded" required />
                        </div>
                        
                        <div class="mt-4">
                            <label class="block font-bold">Método de Pago</label>
                            <select v-model="form.metodo_pago" class="w-full border p-2 rounded">
                                <option value="transferencia">Transferencia Bancaria</option>
                                <option value="tarjeta">Tarjeta de Crédito</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-[#010cf7] text-white py-3 rounded font-bold hover:bg-blue-800 mt-4">
                            FINALIZAR Y PAGAR ({{ formatearPrecio(totalCarrito) }})
                        </button>
                    </form>
                </div>

                <div class="bg-white p-6 rounded-lg shadow h-fit">
                    <h2 class="text-xl font-bold mb-4">Tu Pedido</h2>
                    <div v-for="item in cart.items" :key="item.id" class="flex justify-between border-b py-2">
                        <span>{{ item.referencia }} (x{{ item.quantity || item.cantidad }})</span>
                        
                        <span class="font-bold">
                            {{ formatearPrecio((item.precio || item.price) * (item.quantity || item.cantidad)) }}
                        </span>
                    </div>
                    <div class="flex justify-between text-xl font-bold mt-4 text-[#010cf7]">
                        <span>Total:</span>
                        <span>{{formatearPrecio(totalCarrito) }}</span>
                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>