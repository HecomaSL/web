<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Podrías pasar el total por la URL si quisieras, 
// pero por ahora vamos a dar las instrucciones generales.
</script>

<template>
    <Head title="Pedido Confirmado" />

    <MainLayout>
        <div class="py-12 bg-gray-50 min-h-screen flex items-center">
            <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">¡Pedido recibido con éxito!</h1>
                <p class="text-gray-600 mb-8">Gracias por confiar en HECOMA. Tu pedido se encuentra en estado <b>"Pendiente de Pago"</b>.</p>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 text-left mb-8">
                    <h3 class="text-blue-800 font-bold mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                        </svg>
                        Instrucciones para la Transferencia
                    </h3>
                    <p class="text-blue-700 text-sm mb-4">Realiza el ingreso por el total del carrito a la siguiente cuenta:</p>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between border-b border-blue-100 pb-1">
                            <span class="text-blue-900 font-medium">Banco:</span>
                            <span class="text-blue-800">Banco Santander</span>
                        </div>
                        <div class="flex justify-between border-b border-blue-100 pb-1">
                            <span class="text-blue-900 font-medium">IBAN:</span>
                            <span class="text-blue-800 font-mono">ES7700495539012116113874</span>
                        </div>
                        <div class="flex justify-between border-b border-blue-100 pb-1">
                            <span class="text-blue-900 font-medium">Concepto:</span>
                            <span class="text-blue-800 font-bold italic text-sm">Nº Pedido o Nombre Completo</span>
                        </div>
                    </div>
                </div>

                <p class="text-sm text-gray-500 mb-8">
                    * Una vez recibamos la transferencia, procederemos al envío de tus productos.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Link href="/dashboard" class="bg-[#010cf7] text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 transition">
                        Ver mis pedidos
                    </Link>
                    <Link href="/" class="bg-gray-200 text-gray-800 px-8 py-3 rounded-lg font-bold hover:bg-gray-300 transition">
                        Volver a la tienda
                    </Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>