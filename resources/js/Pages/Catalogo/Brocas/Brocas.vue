<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

const catalogoBrocas = [
  { serie: "SERIE 1", titulo: "BROCA MDI HELICOIDAL", imagen: "/images/brocas/brocas_mdi.png", link: "/brocas-mdi" },
];
</script>

<template>
    <Head>
        <title>Brocas para Herramientas Corte de Madera | HECOMA</title>
        <meta name="description" content="Amplia selección de brocas HSS, cobalto y diamante. Perforación perfecta en cualquier material" />
        <meta name="keywords" content="brocas, herramienta corte de madera, brocas para madera" />
    </Head>
  
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-15">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">BROCAS</h1>
            </div>
        </section>
  
        <section class="container mx-auto px-6 mb-16">
            <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
                <p>Nuestras brocas están diseñados para ofrecer un gran rendimiento y durabilidad. Fabricados con materiales de alta calidad, aseguran precisión y eficiencia en cada aplicación, optimizando tus procesos de producción.</p>
                <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas.  Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>    
                <h2 class="text-[#010cf7] text-3xl font-bold mb-8">Nuestro catalogo de brocas:</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <a v-for="(item, index) in catalogoBrocas" :key="index" :href="item.link" class="group flex flex-col h-[420px] border border-gray-200 shadow-sm hover:shadow-md transition-all overflow-hidden rounded-sm bg-white" >
                        <div class="h-[80%] w-full flex items-center justify-center bg-white p-6">
                            <img :src="item.imagen" :alt="item.titulo" class="block max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500" @error="$event.target.src='https://hecoma.com/wp-content/uploads/2026/03/img_brocas.png'" />
                        </div>
                        <div class="h-[20%] w-full bg-[#010cf7] flex flex-col items-center justify-center text-center px-4 py-2">
                            <span class="text-white text-[10px] font-semibold uppercase tracking-widest mb-1">{{ item.serie }}</span>
                            <h3 class="text-white text-xs font-bold leading-tight uppercase">{{ item.titulo }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </MainLayout>
</template>
  
<style scoped>
p { text-align: justify; line-height: 1.6; }
h2 { line-height: 1.2; }
h3 { line-height: 1.1; margin: 0; }
</style>
