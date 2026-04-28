<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

// Array de productos completo
const catalogoFRESAS = [
    { serie: "SERIE F10", titulo: "FRESAS PARA RANURAR Z4", imagen: "images/fresas/f10.jpg", link: "/f10_fresa_para_ranurar_z4" },
    { serie: "SERIE F11", titulo: "FRESAS PARA RANURAR Z8", imagen: "images/fresas/f11.jpg", link: "/f11-fresa-para-ranurar-de-z8" },
    { serie: "SERIE F12", titulo: "FRESAS PARA RANURAR Z4+v4", imagen: "images/fresas/f12.jpg", link: "/f12-fresa-para-ranurar-de-z4-v4" },
    { serie: "SERIE F13", titulo: "FRESAS EXTESIBLE PARA RANURAR Z4+V4", imagen: "images/fresas/f13.jpg", link: "/f13-fresa-para-ranurar-extensible-z4-y-v4" },
    { serie: "SERIE F14", titulo: "FRESAS PARA GALCES Z4 (CORTES RECTOS)", imagen: "images/fresas/f14.jpg", link: "/f14-fresa-para-galces-z4-cortes-rectos" },
    { serie: "SERIE F15", titulo: "FRESAS PARA GALCES Z4 (CORTES ALTERNOS)", imagen: "images/fresas/f15.jpg", link: "/f15-fresa-para-mecanizar-galces-z4-axiales-alternos" },
    { serie: "SERIE F16", titulo: "FRESAS PARA GALCES Z4+V4", imagen: "images/fresas/f16.jpg", link: "/f16-fresa-para-galces-z4-v4" },
    { serie: "SERIE F17", titulo: "FRESAS EXTENSIBLE PARA RANURAR Y ESPIGAR Z4+V4", imagen: "images/fresas/f17.jpg", link: "/f17-fresa-extensible-ranurar-espigar-z4-v4" },
    { serie: "SERIE F20", titulo: "FRESAS RADIO CÓNCAVO 1/4", imagen: "images/fresas/f20.jpg", link: "/f20-fresa-radio-1-4-concavo" },
    { serie: "SERIE F21", titulo: "FRESAS RADIO CÓNCAVO 1/2", imagen: "images/fresas/f21.jpg", link: "/f21-fresa-radio-1-2-concavo" },
    { serie: "SERIE F22", titulo: "FRESAS RADIO CONVEXO 1/4", imagen: "images/fresas/f22.jpg", link: "/f22-fresa-radio-1-4-convexo" },
    { serie: "SERIE F23", titulo: "FRESAS RADIO CONVEXO 1/2", imagen: "images/fresas/f23.jpg", link: "/f23-fresa-radio-1-2-convexo" },
    { serie: "SERIE F30", titulo: "FRESAS PARA BISELADOS", imagen: "images/fresas/f30.jpg", link: "/f30-fresa-de-bisel" },
    { serie: "SERIE F40", titulo: "FRESAS PARA PLAFONES", imagen: "images/fresas/f40.jpg", link: "/f40-fresa-para-plafones" },
    { serie: "SERIE F41", titulo: "JUEGO FRESAS MOLDURA-CONTRAMOLDURA", imagen: "images/fresas/f41.png", link: "/f41-juego-fresas-moldura-contramoldura" },
    { serie: "SERIE F50", titulo: "FRESAS PARA TIRADORES", imagen: "images/fresas/f50.png", link: "/f50-fresa-tirador" },
    { serie: "SERIE F60", titulo: "FRESAS PARA JUNTAS LONGITUDINALES", imagen: "images/fresas/f60.png", link: "/f60-fresa-juntas-longitudinales" },
    { serie: "SERIE F61", titulo: "FRESAS PARA INGLETES (JUNTAS A 90º)", imagen: "images/fresas/f61.png", link: "/f61-fresa-para-juntas-90o" },
    { serie: "SERIE F70", titulo: "FRESAS ESPECIALES P≤20", imagen: "images/fresas/f70.png", link: "https://api.whatsapp.com/send?phone=34667407692&text=Hola!%20Quiero%20informarme%20sobre%20Serie%20F70" },
    { serie: "SERIE F71", titulo: "FRESAS ESPECIALES P>20", imagen: "images/fresas/f71.png", link: "https://api.whatsapp.com/send?phone=34667407692&text=Hola!%20Quiero%20informarme%20sobre%20Serie%20F71" },
];
</script>

<template>
    <Head>
        <title>Fresas para Madera | Herramientas de Corte Profesional</title>
        <meta name="description" content="¿Buscas un corte limpio y duradero? Descubre nuestras fresas industriales para madera, tableros y materiales compuestos. Herramientas diseñadas para resistir el uso intensivo y maximizar el rendimiento de tu maquinaria. Consulta el stock." />
        <meta name="keywords" content="fresas, herramienta corte de madera, fresas para madera" />
    </Head>
  
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">FRESAS PARA MADERA</h1>
            </div>
        </section>
  
        <section class="container mx-auto px-6 mb-10">
            <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
                <h2 class="text-[#010cf7] text-3xl font-bold">Fresas de Alto Rendimiento</h2>
                <p>Descubre nuestra completa gama de fresas, diseñadas para ofrecer precisión, durabilidad y acabados perfectos en todo tipo de mecanizados, desde fresas para ranurar hasta fresas para galces. En HECOMA contamos con referencias en stock permanente y la posibilidad de fabricar perfiles y dimensiones especiales a medida según tus necesidades. Cada fresa se produce con materiales de alta calidad (metal duro y HSS) y está pensada para maximizar el rendimiento y la estabilidad en corte.</p>
                <p>Las referencias marcadas están en stock permanente seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Ante cualquier duda, consúltenos.</p>     
                
                <h2 class="text-[#010cf7] text-3xl font-bold">Nuestro catálogo de fresas:</h2>
                <p>El presente catálogo incluye la gama estándar de nuestras fresas de alto rendimiento. HECOMA, como fabricante de herramienta especial, podrá fabricarle cualquier tipo de herramienta que no se incluya en el presente catálogo, y ponemos a su disposición nuestro departamento técnico-comercial para asesorarle y ofrecerle la mejor solución. En el catálogo se describen las aplicaciones más habituales con este tipo de herramienta y pretendemos que le sirva de guía para la elección de la herramienta más adecuada a su necesidad.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 justify-start">
                    <a v-for="(item, index) in catalogoFRESAS":key="index" :href="item.link" class="group flex flex-col h-[400px] border border-gray-200 shadow-sm hover:shadow-md transition-all overflow-hidden rounded-sm bg-white" >
                        <div class="h-[80%] w-full flex items-center justify-center bg-white p-4">
                            <img :src="item.imagen" :alt="item.titulo" class="block max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300" @error="$event.target.src='/2026/03/img_brocas.png'" />
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
    h3 { line-height: 1.2; margin: 0; }
    .group { display: flex; flex-direction: column; }
    .grid > a { width: 100%; }
</style>