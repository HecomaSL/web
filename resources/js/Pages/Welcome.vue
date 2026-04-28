<script setup>
import { computed } from 'vue';
import { usePage, Link, Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const page = usePage();

const areaTecnicaLink = computed(() => {
    return page.props.auth.user ? '/dashboard' : '/login';
});
</script>

<template>
    <Head title="Herramientas Corte Madera" />
    <MainLayout>
        <section class="w-full overflow-hidden">
            <div class="slider-container">
                <div class="slider" id="slider">
                    <ul class="slides">
                        <li class="slide"><a href="#"><img src="/images/SLIDER1.jpg" alt="SLIDER 1"></a></li>
                        <li class="slide"><a href="#"><img src="/images/SLIDER2.jpg" alt="SLIDER 2"></a></li>
                        <li class="slide"><a href="#"><img src="/images/SLIDER3.jpg" alt="SLIDER 3"></a></li>
                        <li class="slide"><a href="#"><img src="/images/SLIDER4.jpg" alt="SLIDER 4"></a></li>
                        <li class="slide"><a href="#"><img src="/images/SLIDER1.jpg" alt="SLIDER 1"></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="sectionColor bg-[#0000BB] text-white py-16 px-6">
            <div class="container mx-auto max-w-5xl text-center">
                <div class="mb-8 flex justify-center">
                    <img src="/images/logo-hecoma-blanco.png" alt="HECOMA Logo" class="h-24 md:h-32 object-contain" />
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-8 leading-tight uppercase tracking-wide">Fabricación de Herramientas de Corte para Madera de Alto Rendimiento</h1>
                <p class="text-xl text-center">Como fabricantes de herramientas de corte para madera, madera técnica y plásticos, ofrecemos soluciones en diamante (PCD) y metal duro (HM). Con plantas de producción en <a href="https://maps.app.goo.gl/iFUmCyCxncteymou5">Sonseca (Toledo)</a> y <a href="https://maps.app.goo.gl/wXWTaA6HyoetsaGn9">Lucena (Córdoba)</a>, cubrimos el centro y sur de España con asesoramiento técnico presencial. Especialistas en el diseño de herramientas especiales a medida con plazos de entrega mínimos para optimizar tu producción industrial.</p>
            </div>
        </section>

        

        <section class="py-16 px-6">
            <div class="container mx-auto max-w-5xl text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 leading-tight uppercase tracking-wide">CENTRO DE RECURSOS Y HERRAMIENTAS DE CORTE DE MADERA</h2>

                <div class="flex flex-col md:flex-row justify-center items-center md:items-stretch gap-6 imgytext-main">
                    <a href="/servicios" class="flex-1">
                        <div class="servicios">
                            <h3>SERVICIOS</h3>
                            <img src="/images/servicios.png" alt="Fresa reparada" width="100%">
                            <p>Nuestra gran diferencia: el desarrollo de herramientas a medida y afilado de calidad</p>
                        </div>
                    </a>
                    <a href="/catalogo" class="flex-1">
                        <div class="catalogo">
                            <h3>CATÁLOGO</h3>
                            <img src="/images/catalogo.png" alt="Fresa reparada" width="100%">
                            <p>Eche un vistazo a nuestra gran gama de productos para trabajos de madera.</p>
                        </div>
                    </a>
                    <a href="/noticias" class="flex-1">
                        <div class="noticias">
                            <h3>NOTICIAS</h3>
                            <img src="/images/noticias.png" alt="Fresa reparada" width="100%">
                            <p>Póngase al día con las novedades y noticias sobre el mundo de la herramienta, eventos… </p>
                        </div>
                    </a>
                    <Link :href="areaTecnicaLink" class="flex-1">
                        <div class="areaTecnica">
                            <h3>AREA TÉCNICA</h3>
                            <img src="/images/areatecnica.png" alt="Fresa reparada" width="100%">
                            <p>Acceda a su cuenta para gestionar sus pedidos, consultar precios y realizar sus compras </p>
                        </div>
                    </Link>
                </div>
            </div>
        </section>

        <section class="contacto py-16 px-6 bg-[#f5f9fb]">
            <div class="container mx-auto max-w-6xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold leading-tight uppercase tracking-wide mb-4">CONTACTO</h2>
                    <p class="text-lg">¿Tienes alguna duda? Estaremos encantados de ayudarte. Ponte en contacto con nosotros haciendo click <a href="/contacto" class="font-bold hover:underline">aquí.</a></p>
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

            <div class="imag mt-12 mb-8">
                <img src="/images/financiacion_ue.png" alt="Financiación UE" class="max-w-full h-auto">
            </div>

            <div class="flex flex-wrap justify-center items-center gap-6">
                <img src="/images/ayuda1.jpg" alt="Ayuda 1" class="h-20 object-contain">
                <img src="/images/ayuda2.png" alt="Ayuda 2" class="h-20 object-contain">
                <img src="/images/ayuda3.jpg" alt="Ayuda 3" class="h-20 object-contain">
                <img src="/images/ayuda4.jpg" alt="Ayuda 4" class="h-20 object-contain">
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
strong { letter-spacing: 0.02em; }
h2, p { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
.sectionColor a { text-decoration: underline; font-weight: bold; }
.sectionColor { background-color: #0000BB; }
.imgytext-main div { align-items: center; display: flex; flex-direction: column; padding: 1rem; }
.imgytext-main p { text-align: center; }
.imgytext-main img { height: 200px; width: 200px; object-fit: contain; }
.contacto a { color: blue; }
.imag { display: grid; place-items: center; }
.slider-container { width: 100%; margin: 0; padding: 0; }
.slider { width: 100%; position: relative; }
.slides { display: flex; width: 100%; margin: 0; padding: 0; list-style: none; }

.slide { width: 100vw; flex-shrink: 0; animation: slide-animation 20s linear infinite; }

.slide img { width: 100%; height: auto; display: block; }

.slides:hover .slide { animation-play-state: paused; }

@keyframes slide-animation {
    0%, 20%   { transform: translateX(0); }
    25%, 45%  { transform: translateX(-100vw); }
    50%, 70%  { transform: translateX(-200vw); }
    75%, 95%  { transform: translateX(-300vw); }
    100%      { transform: translateX(-400vw); }
}

* { box-sizing: border-box; }

.contacto img { max-width: 250px; }
</style>