<script setup>
import { ref } from 'vue'; // Añadir ref
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
// Creamos la referencia para el contenedor
const carouselRef = ref(null);

const scrollCarousel = (direction) => {
  if (carouselRef.value) {
    const scrollAmount = direction === 'left' ? -300 : 300;
    carouselRef.value.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  }
};
</script>

<template>
  <Head title="Fresas Uñero | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Fresas de Uñero: El 65% de clientes nos demandan herramienta para este trabajo</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/fresa-unero.jpg" alt="Fresas de Uñero" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <p>Esta nueva tendencia se ha consolidado en el mercado. Se ha puesto de moda en el diseño de muebles cocina, baño y en general, para todo tipo de mueble que incluya puertas y/o cajones. Al eliminan los tiradores, el diseño se vuelve mas moderno y funcional, al tener líneas mas limpias.</p>
        <p>En HECOMA® hemos desarrollado varias soluciones sencillas y eficientes para mecanizar tiradores tipo «Uñero» en diferentes tipos de materiales.</p>
        <p>Las fresas de «uñero» las fabricamos habitualmente en un diámetro exterior de 160mm y con 4 cortes. También los podemos fabricar con las medidas que el cliente necesite, en cuanto a perfil, diámetro, grosor de tablero y del material de este.</p>
        <p>El material de las superficies de corte,  en el modelo que se muestra en las fotos, es METAL DURO de alta calidad fabricado para trabajar DM. También existen modelos de tipo cabezal de placas intercambiables y con placas de diamante PCD.</p>
        <p>La referencia mostrada en las imágenes es <a href="f17-fresa-extensible-ranurar-espigar-z4-v4">F1702006-18</a>, con medidas ø160mm*20mm*50mm en cuatro cortes (Z4)  y fabricado en metal duro (MD)</p>
        <div class="carousel-wrapper w-full my-12 px-[5%]">
          <div class="relative group">
            <button class="carousel-arrow left-0" @click="scrollCarousel('left')"> &lt; </button>
            <button class="carousel-arrow right-0" @click="scrollCarousel('right')"> &gt; </button>
            
            <div ref="carouselRef" class="carousel-container px-2">
              <div class="carousel-item">
                <img src="/images/noticias/unero_boceto.jpg" alt="Broca Helicoidal 1" class="rounded-lg shadow-md" style="object-fit: contain; background: #f0f0f0;">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/cabezal_unero.jpg" alt="Broca Helicoidal 2" class="rounded-lg shadow-md" style="object-fit: contain; background: #f0f0f0;">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/fresa-unero-4.jpg" alt="Broca Helicoidal 3" class="rounded-lg shadow-md" style="object-fit: contain; background: #f0f0f0;">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/fresa-unero-2.jpg" alt="Broca Helicoidal 4" class="rounded-lg shadow-md" style="object-fit: contain; background: #f0f0f0;">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/fresa-unero.jpg" alt="Broca Helicoidal 5" class="rounded-lg shadow-md" style="object-fit: contain; background: #f0f0f0;">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/fresa-unero-6.jpg" alt="Broca Helicoidal 5" class="rounded-lg shadow-md" style="object-fit: contain;background: #f0f0f0;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Estilos de Texto --- */
  p { text-align: justify; line-height: 1.6; }
  h2, h3 { line-height: 1.2; text-align: justify; }
  .imgytext p { text-align: center; }
  .imgytext img { height: 250px; width: 300px; padding: 1%; object-fit: cover; }
  .imgytext { padding: 1%; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
</style>
<style scoped>
  /* ========================================= */
  /* --- CARRUSEL CON FLECHAS (NUEVO/UNIFICADO) --- */
  /* ========================================= */
  .carousel-container { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth; gap: 4%; padding-bottom: 1rem; padding-top: 1rem; }
  /* Ocultar barra de scroll pero mantener funcionalidad */
  .carousel-container::-webkit-scrollbar { display: none; }
  .carousel-item { flex: 0 0 85%; scroll-snap-align: center; text-align: center; transition: transform 0.3s ease; }
  .carousel-item img { width: 100%; height: auto; aspect-ratio: 4 / 3; object-fit: cover; }

  /* --- ESTILOS DE LAS FLECHAS --- */
  .carousel-arrow { position: absolute; top: 50%; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; cursor: pointer; font-size: 1.5rem; padding: 0.8rem 1.2rem; z-index: 10; border-radius: 50%; transition: background-color 0.3s ease, opacity 0.3s ease; opacity: 0; }
  /* Mostrar flechas al hacer hover sobre el contenedor en PC */
  .group:hover .carousel-arrow { opacity: 1; }
  .carousel-arrow:hover { background-color: rgba(0, 0, 0, 0.8); }
  /* Ajustes para Desktop (Flechas) */
  @media (min-width: 768px) { .carousel-item { flex: 0 0 30.6%; }
    .carousel-arrow { font-size: 2rem; padding: 1rem 1.5rem; }
    .carousel-arrow.left-0 { left: 1rem; }
    .carousel-arrow.right-0 { right: 1rem; }
  }
  /* Ajustes para Móvil (Ocultar flechas) */
  @media (max-width: 768px) { .carousel-item p { font-size: 13px; } .carousel-arrow { display: none; } }
</style>