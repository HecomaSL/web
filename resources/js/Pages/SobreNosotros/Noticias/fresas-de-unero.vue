<script setup>
import { ref, onMounted } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

// Lista de imágenes original
const images = [
  { src: '/images/noticias/unero_boceto.jpg', alt: 'Boceto' },
  { src: '/images/noticias/cabezal_unero.jpg', alt: 'Cabezal' },
  { src: '/images/noticias/fresa-unero-4.jpg', alt: 'Fresa 4' },
  { src: '/images/noticias/fresa-unero-2.jpg', alt: 'Fresa 2' },
  { src: '/images/noticias/fresa-unero.jpg', alt: 'Fresa Principal' },
  { src: '/images/noticias/fresa-unero-6.jpg', alt: 'Fresa 6' },
];

const containerRef = ref(null);
const isTransitioning = ref(false);

const scrollCarousel = (direction) => {
  if (isTransitioning.value || !containerRef.value) return;

  const container = containerRef.value;
  const itemWidth = container.querySelector('.carousel-item').offsetWidth + 20;// Ancho + Gap
  
  isTransitioning.value = true;
  container.style.transition = 'transform 0.5s ease-in-out';

  if (direction === 'right')
    container.style.transform = `translateX(-${itemWidth}px)`;
  else {
    // Para ir a la izquierda, movemos el último elemento al principio antes de animar
    container.style.transition = 'none';
    container.prepend(container.lastElementChild);
    container.style.transform = `translateX(-${itemWidth}px)`;
    setTimeout(() => {
      container.style.transition = 'transform 0.5s ease-in-out';
      container.style.transform = 'translateX(0)';
    }, 1);
  }
};

const handleTransitionEnd = () => {
  isTransitioning.value = false;
  const container = containerRef.value;
  
  // Si nos movimos a la derecha, movemos el primer elemento al final de la cola
  if (container.style.transform.includes('-')) {
    container.style.transition = 'none';
    container.appendChild(container.firstElementChild);
    container.style.transform = 'translateX(0)';
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
          <img src="/images/noticias/fresa-unero.jpg" alt="Fresas de Uñero" class="rounded-lg shadow-md w-full md:w-auto">
        </div>
        
        <p>Esta nueva tendencia se ha consolidado en el mercado. Se ha puesto de moda en el diseño de muebles cocina, baño y en general, para todo tipo de mueble que incluya puertas y/o cajones. Al eliminan los tiradores, el diseño se vuelve mas moderno y funcional, al tener líneas mas limpias.</p>
        <p>En HECOMA® hemos desarrollado varias soluciones sencillas y eficientes para mecanizar tiradores tipo «Uñero» en diferentes tipos de materiales.</p>
        <p>Las fresas de «uñero» las fabricamos habitualmente en un diámetro exterior de 160mm y con 4 cortes. También los podemos fabricar con las medidas que el cliente necesite, en cuanto a perfil, diámetro, grosor de tablero y del material de este.</p>
        <p>El material de las superficies de corte, en el modelo que se muestra en las fotos, es METAL DURO de alta calidad fabricado para trabajar DM. También existen modelos de tipo cabezal de placas intercambiables y con placas de diamante PCD.</p>
        <p>La referencia mostrada en las imágenes es <a href="f17-fresa-extensible-ranurar-espigar-z4-v4" class="text-blue-600 hover:underline">F1702006-18</a>, con medidas ø160mm*20mm*50mm en cuatro cortes (Z4) y fabricado en metal duro (MD)</p>

        <div class="carousel-viewport overflow-hidden relative my-12 px-[2%]">
          <button class="carousel-arrow left-0" @click="scrollCarousel('left')"> &lt;</button>
          <button class="carousel-arrow right-0" @click="scrollCarousel('right')"> &gt;</button>
          
          <div ref="containerRef" class="carousel-track flex gap-5" @transitionend="handleTransitionEnd" >
            <div v-for="(img, index) in images" :key="index" class="carousel-item flex-none w-[85%] md:w-[calc(33.33%-14px)]" >
              <img :src="img.src" :alt="img.alt" class="rounded-lg shadow-md w-full aspect-[4/3] object-contain bg-[#f0f0f0]">
            </div>
          </div>
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold text-center">Servicios para Herramientas de corte de HECOMA®, rentabilidad para su negocio.</h2>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  p { text-align: justify; line-height: 1.6; }
  .carousel-viewport { position: relative;width: 100%;overflow: hidden; }
  .carousel-track { display: flex;will-change: transform; }

  /* Flechas */
  .carousel-arrow { position: absolute; top: 50%;transform: translateY(-50%); background-color: rgba(1, 12, 247, 0.8); color: white; border: none; cursor: pointer; font-size: 1.5rem; padding: 0.8rem 1.2rem; z-index: 20; border-radius: 50%; transition: all 0.3s ease; }
  .carousel-arrow.left-0 { left: 10px; }
  .carousel-arrow.right-0 { right: 10px; }
  .carousel-arrow:hover { background-color: #010cf7;transform: translateY(-50%) scale(1.1); }

  @media (max-width: 768px) { .carousel-arrow { display: none; } }
</style>