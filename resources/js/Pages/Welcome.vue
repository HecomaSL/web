<script setup>
import { computed } from 'vue';
import { usePage, Link, Head } from '@inertiajs/vue3'; // <--- FALTA IMPORTAR Head
import MainLayout from '@/Layouts/MainLayout.vue';

// Accedemos a las propiedades compartidas de Inertia
const page = usePage();

// Creamos una propiedad computada para saber el destino del enlace
const areaTecnicaLink = computed(() => {
    return page.props.auth.user ? '/dashboard' : '/login';
});
</script>

<template>
    <Head title="Herramientas Corte Madera" />
    <MainLayout>
        <section class="sectionColor bg-[#0000BB] text-white py-16 px-6">
            <div class="container mx-auto max-w-5xl text-center">
                <div class="mb-8 flex justify-center">
                    <img src="https://hecoma.com/wp-content/uploads/2020/12/lgoo-hecoma-blanco.png" alt="HECOMA Logo" class="h-24 md:h-32 object-contain" />
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-8 leading-tight uppercase tracking-wide">Fabricación de Herramientas de Corte para Madera de Alto Rendimiento</h1>
                <div class="text-lg md:text-xl leading-relaxed max-w-4xl mx-auto space-y-6">
                    <p class="text-justify">Como fabricantes de herramientas de corte para madera, madera técnica y plásticos, ofrecemos soluciones en diamante (PCD) y metal duro (HM). Con plantas de producción en Sonseca (Toledo) y Lucena (Córdoba), cubrimos el centro y sur de España con asesoramiento técnico presencial. Especialistas en el diseño de herramientas especiales a medida con plazos de entrega mínimos para optimizar tu producción industrial.</p>
                </div>
            </div>
        </section>

        <section class="py-16 px-6">
            <div class="container mx-auto max-w-5xl text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 leading-tight uppercase tracking-wide">CENTRO DE RECURSOS Y HERRAMIENTAS DE CORTE DE MADERA</h2>
                
                <div class="flex flex-col md:flex-row justify-center items-center md:items-stretch gap-6 imgytext-main">
                    <a href="/servicios" class="flex-1">
                        <div class="servicios">
                            <h3>SERVICIOS</h3>
                            <img src="https://hecoma.com/wp-content/uploads/2020/11/servicios.png" alt="Fresa reparada" width="100%">
                            <p>Nuestra gran diferencia: el desarrollo de herramientas a medida y afilado de calidad</p>
                        </div>
                    </a>
                    <a href="/catalogo" class="flex-1">
                        <div class="catalogo">
                            <h3>CATÁLOGO</h3>
                            <img src="https://hecoma.com/wp-content/uploads/2020/11/catalogo.png" alt="Fresa reparada" width="100%">
                            <p>Eche un vistazo a nuestra gran gama de productos para trabajos de madera.</p>
                        </div>
                    </a>
                    <a href="/noticias" class="flex-1">
                        <div class="noticias">
                            <h3>NOTICIAS</h3>
                            <img src="https://hecoma.com/wp-content/uploads/2020/11/noticias.png" alt="Fresa reparada" width="100%">
                            <p>Póngase al día con las novedades y noticias sobre el mundo de la herramienta, eventos…</p>
                        </div>
                    </a>
                    <Link :href="areaTecnicaLink" class="flex-1">
                        <div class="areaTecnica">
                            <h3>AREA TÉCNICA</h3>
                            <img src="https://hecoma.com/wp-content/uploads/2026/02/Captura-de-pantalla-2026-02-13-121317-1.png" alt="Fresa reparada" width="100%">
                            <p>Acceda a su cuenta para gestionar sus pedidos, consultar precios y realizar sus compras</p>
                        </div>
                    </Link>
                </div>
            </div>
        </section>
        
        <section class="contacto py-16 px-6 bg-[#f5f9fb]">
            <div class="container mx-auto max-w-6xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold leading-tight uppercase tracking-wide mb-4">CONTACTO</h2>
                    <p class="text-lg">
                        ¿Tienes alguna duda? Estaremos encantados de ayudarte. 
                        Ponte en contacto con nosotros haciendo click <a href="/contacto" class="font-bold hover:underline">aquí.</a>
                    </p>
                </div>

                <div class="flex flex-col md:flex-row gap-8 justify-center items-stretch">
                    <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-md p-4 flex flex-col items-center">
                        <h3 class="text-[#003399] text-xl md:text-2xl font-bold uppercase mb-4">Sonseca</h3>
                        <div class="w-full h-[350px] overflow-hidden rounded-lg">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.42047632631!2d-3.982636!3d39.685249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6a115e701d7ea7%3A0x778ccf570a392130!2sHerramientas%20de%20corte%20para%20madera%20S.L.%20HECOMA!5e0!3m2!1ses!2ses!4v1776407987341!5m2!1ses!2ses" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-md p-4 flex flex-col items-center">
                        <h3 class="text-[#003399] text-xl md:text-2xl font-bold uppercase mb-4">Lucena</h3>
                        <div class="w-full h-[350px] overflow-hidden rounded-lg">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.7251254704947!2d-4.5082153!3d37.3963323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d70d203160d91%3A0x858d2135793072e7!2sHECOMA%20%26%20Incoypre!5e0!3m2!1ses!2ses!4v1776408039362!5m2!1ses!2ses" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="imag mt-12">
                <img src="/images/financiacion_ue.png" alt="Financiación UE">
            </div>

            <div class="flex flex-col md:flex-row justify-center items-center md:items-stretch gap-6 imgytext-main">
                <img src="/images/ayuda1.jpg" alt="Ayuda 1">
                <img src="/images/ayuda2.png" alt="Ayuda 2">
                <img src="/images/ayuda3.jpg" alt="Ayuda 3">
                <img src="/images/ayuda4.jpg" alt="Ayuda 4">
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
    .sectionColor { background-color: #0000BB; }
    strong { letter-spacing: 0.02em; }
    h2, p { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

    /* Ajuste para que los bloques de recursos se vean bien en grid/flex */
    .imgytext-main div {
        align-items: center;
        display: flex; 
        flex-direction: column; 
        padding: 1rem;
    }

    .imgytext-main p { text-align: center; }
    .imgytext-main img { height: 200px; width: 200px; object-fit: contain; }

    /* Estilos para las imágenes de ayuda inferiores */
    .imgytext img { 
        height: auto; 
        max-width: 200px; 
    }
    
    .contacto .imgytext{
        display: flex;
        align-items: center;
    }
    .contacto a { color:blue; }
    .imag { display: grid; place-items: center; }
</style>