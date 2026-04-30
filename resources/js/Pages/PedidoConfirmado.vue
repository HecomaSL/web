<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({ pedido: Object });
const copiado = ref(null);

const copiarAlPortapapeles = (texto, campo) => {
    const str = String(texto ?? '');
    if (!navigator.clipboard) {
        const textArea = document.createElement("textarea");
        textArea.value = str;
        document.body.appendChild(textArea);
        textArea.select();
        try { document.execCommand('copy'); activarFeedback(campo); }
        catch (err) { console.error('Error al copiar', err); }
        document.body.removeChild(textArea);
        return;
    }
    navigator.clipboard.writeText(str).then(() => activarFeedback(campo));
};

const activarFeedback = (campo) => {
    copiado.value = campo;
    setTimeout(() => { copiado.value = null; }, 2000);
};
</script>

<template>
    <Head title="Pedido Confirmado - HECOMA" />

    <MainLayout>
        <div class="py-12 bg-gray-50 min-h-screen flex items-center justify-center px-4">
            <div class="max-w-3xl w-full bg-white p-8 md:p-12 rounded-2xl shadow-xl text-center">

                <!-- Icono check -->
                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 mb-2 uppercase tracking-tight">
                    ¡Pedido {{ props.pedido?.codigo_pedido ?? '#wp_' + props.pedido?.id }} con éxito!
                </h1>
                <p class="text-gray-600 mb-8 text-lg">Gracias por confiar en <strong>HECOMA</strong>. Tu pedido se encuentra en estado <span class="text-orange-600 font-bold uppercase">"Pendiente de Pago"</span>.</p>

                <!-- Instrucciones de transferencia -->
                <div class="bg-blue-50 border-l-4 border-[#010cf7] p-6 text-left mb-8 rounded-r-xl">
                    <h3 class="text-[#010cf7] font-bold mb-3 flex items-center uppercase tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                        </svg>
                        Instrucciones para la Transferencia
                    </h3>

                    <p class="text-blue-800 text-sm mb-5 font-medium">Realiza el ingreso por el importe total de tu compra a la siguiente cuenta bancaria: </p>

                    <div class="space-y-3 bg-white p-5 rounded-lg border border-blue-100 shadow-sm">

                        <!-- Banco -->
                        <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                            <span class="text-gray-500 text-xs font-bold uppercase">Banco:</span>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-900 font-semibold">Banco Santander</span>
                                <button @click="copiarAlPortapapeles('Banco Santander', 'banco')" class="btn-copy" title="Copiar Banco">
                                    <span v-if="copiado === 'banco'" class="text-[10px] text-green-600 font-bold uppercase">¡Copiado!</span>
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- IBAN -->
                        <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                            <span class="text-gray-500 text-xs font-bold uppercase">IBAN:</span>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-900 font-mono font-bold tracking-tighter">ES77 0049 5539 0121 1611 3874</span>
                                <button @click="copiarAlPortapapeles('ES7700495539012116113874', 'iban')" class="btn-copy" title="Copiar IBAN">
                                    <span v-if="copiado === 'iban'" class="text-[10px] text-green-600 font-bold uppercase">¡Copiado!</span>
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                            <span class="text-gray-500 text-xs font-bold uppercase">Precio:</span>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-900 font-mono font-bold tracking-tighter">{{ props.pedido?.total }}€</span>
                                <button @click="copiarAlPortapapeles(props.pedido?.total, 'precio')" class="btn-copy" title="Copiar Precio">
                                    <span v-if="copiado === 'precio'" class="text-[10px] text-green-600 font-bold uppercase">¡Copiado!</span>
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Concepto -->
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-xs font-bold uppercase">Concepto:</span>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-900 font-bold italic">
                                    PAGO {{ props.pedido?.codigo_pedido ?? '#wp_' + props.pedido?.id }}
                                </span>
                                <button @click="copiarAlPortapapeles('PAGO ' + (props.pedido?.codigo_pedido ?? '#wp_' + props.pedido?.id), 'concepto')" class="btn-copy" title="Copiar Concepto">
                                    <span v-if="copiado === 'concepto'" class="text-[10px] text-green-600 font-bold uppercase">¡Copiado!</span>
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs text-blue-600 mt-4 italic font-medium">* Los pedidos se procesarán una vez se confirme la recepción del importe en nuestra cuenta (suele tardar 24-48h laborales). </p>
                </div>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-10">
                    <Link href="/dashboard" class="w-full sm:w-auto bg-[#010cf7] text-white px-10 py-4 rounded-xl font-bold uppercase hover:bg-blue-800 transition-all shadow-lg active:scale-95 text-center">
                        Ver mis pedidos
                    </Link>
                    <Link href="/catalogo" class="w-full sm:w-auto bg-gray-100 text-gray-700 px-10 py-4 rounded-xl font-bold uppercase hover:bg-gray-200 transition-all border border-gray-200 text-center">
                        Volver a la tienda
                    </Link>
                </div>

                <p class="mt-8 text-gray-400 text-sm"> ¿Algún problema con el pago? <Link href="/contacto" class="text-blue-500 underline">Contáctanos</Link> </p>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
.btn-copy { @apply p-1.5 text-blue-400 hover:text-[#010cf7] hover:bg-blue-100 rounded-lg transition-all flex items-center justify-center min-w-[40px] border border-transparent hover:border-blue-200; }
span[class*="text-green-600"] { animation: fadeIn 0.2s ease-out; }
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(2px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>