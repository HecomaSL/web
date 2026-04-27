<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

const catalogoDiscos = [
    { serie: "SERIE 1", titulo: "CORTE DE TABLERO", imagen: "/images/discos/discos.jpg", link: "/corte-tablero" },
    { serie: "SERIE 2", titulo: "DISCOS DE APLICACIONES ESPECIALES", imagen: "/images/discos/discos.jpg", link: "/discos-aplicaciones-especiales" },
    { serie: "SERIE 3", titulo: "INCISORES", imagen: "/images/discos/discos.jpg", link: "/incisores" },
    { serie: "SERIE 4", titulo: "DISCOS PARA SECCIONADORA, TABLEROS LAMINADOS Y BILAMINADOS", imagen: "/images/discos/discos.jpg", link: "/discos-para-seccionadora-y-tableros-laminados" },
    { serie: "SERIE 5", titulo: "DISCOS PARA RANURAR", imagen: "/images/discos/discos.jpg", link: "/discos-para-ranurar" },
    { serie: "SERIE 6", titulo: "DISCOS PARA MAQUINA PORTATIL", imagen: "/images/discos/discos.jpg", link: "/discos-maquina-portatil" },
    { serie: "SERIE 7", titulo: "DISCOS PARA MATERIALES NO FERROSOS", imagen: "/images/discos/discos.jpg", link: "/discos-materiales-no-ferrosos" },
    { serie: "SERIE 8", titulo: "DISCOS PARA MATERIALES FERROSOS", imagen: "/images/discos/discos.jpg", link: "/discos-materiales-ferrosos" },
    { serie: "SERIE 9", titulo: "DISCOS PARA MADERA MACIZA", imagen: "/images/discos/discos.jpg", link: "/discos-madera-maciza" },
    { serie: "SERIE 10", titulo: "DISCOS PARA SIERRA MULTIPLE", imagen: "/images/discos/discos.jpg", link: "/discos-sierra-multiple" },
    { serie: "SERIE 11", titulo: "DISCOS SILENCIOSOS", imagen: "/images/discos/discos.jpg", link: "/discos-silenciosos" },
];
</script>

<template>
    <Head title="DISCOS - HECOMA" />
  
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">DISCOS DE CORTE PARA MADERA </h1>
            </div>
        </section>
  
        <section class="container mx-auto px-6 mb-10">
            <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
                <h2 class="text-[#010cf7] text-3xl font-bold">Discos de Corte Industrial de Alto Rendimiento</h2>
                <p>Nuestros <b>discos de corte</b> están diseñados para ofrecer un gran rendimiento, durabilidad y cortes limpios. Fabricados con materiales de alta calidad, aseguran precisión y eficiencia en cada aplicación, optimizando tus procesos de producción y garantizando acabados profesionales.</p>
                <p>Las referencias <b>marcadas están en stock</b> permanente y seran entregadas en un plazo estimado de entrega de <b>48–72 horas laborables</b> desde la confirmación del pago. El <b>resto de las referencias</b> se entregan en un plazo máximo <b>entre 3 y 9 semanas</b>. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
                <h2 class="text-[#010cf7] text-3xl font-bold">Nuestro catálogo de Discos de corte:</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <a v-for="(item, index) in catalogoDiscos" :key="index" :href="item.link" class="group flex flex-col h-[420px] border border-gray-200 shadow-sm hover:shadow-md transition-all overflow-hidden rounded-sm bg-white" >
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
    h3 { line-height: 1.2; margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .group { display: flex; flex-direction: column; }
    .grid > a { width: 100%; }
</style>