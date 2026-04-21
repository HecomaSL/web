<script setup>
import { ref } from 'vue'; // Añadir ref
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Incorporamos la Walter Heliotronic Power Diamond 400 | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Incorporamos la Walter Heliotronic Power Diamond 400<br>a nuestra fábrica de Sonseca</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/walter-heliotronic.jpg" alt="Walter Heliotronic Power Diamond 400" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <p>La Walter Heliotronic Power Diamond 400 es una máquina automática que nos permite seguir evolucionando en nuestra capacidad productiva. Es capaz de trabajar sobre materiales de corte variados, tanto metal duro, acero rápido y varios tipos de diamante. La máquina en su conjunto es la única implantada en nuestro sector con sus características, en el territorio nacional.</p>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/walter-heliotronic.jpg" alt="Vista desde el cargador" >
            <p>Vista desde el cargador</p>
          </div>
          <div>
            <img src="/images/noticias/walter-heliotronic-2.jpg" alt="Vista desde la zona de mecanizado" >
            <p>Vista desde la zona de mecanizado</p>
          </div>
          <div>
            <img src="/images/noticias/walter-heliotronic-3.jpg" alt="Brazo robótico de carga" >
            <p>Brazo robótico de carga</p>
          </div>
        </div>
        <p>La variante que adquirimos cuenta con un brazo robótico de carga y bahías de herramientas para tratar y ya tratadas. De esta forma la productividad de la máquina y seguridad para los operarios se incrementan de forma muy significativa.</p>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/walter-heliotronic-llegada.jpeg" alt="Llegada del transporte" >
            <p>Llegada del transporte</p>
          </div>
          <div>
            <img src="/images/noticias/walter-heliotronic-mecanizado.jpeg" alt="Módulo de mecanizado" >
            <p>Módulo de mecanizado</p>
          </div>
          <div>
            <img src="/images/noticias/walter-heliotronic-cargador.jpeg" alt="Módulo de cargador" >
            <p>Módulo de cargador</p>
          </div>
          <div>
            <img src="/images/noticias/walter-heliotronic-ambos.jpeg" alt="Ubicación de ambos módulos" >
            <p>Ubicación de ambos módulos</p>
          </div>
        </div>
        <p>Su capacidad de trabajo, la calidad de acabados y la muy elevada precisión que nos proporciona, incrementa, aún mas, la calidad de nuestra herramienta, su precisión y su duración.  Un paso mas adelante, en la constante mejora de nuestros productos, su plazo de entrega y en la mejora de productividad de nuestra herramienta para nuestros clientes.</p>
        <p>Les dejamos, por el momento, un vídeo demostrativo de la operación de la máquina, que nos ha cedido el fabricante:</p>
        <div class="flex justify-center">
          <div class="video-container shadow-xl rounded-lg overflow-hidden">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/dZcYJpUeuqk?si=pcXEVVbk38TMyr6b" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
  /* --- Video ---*/
  .video-container { position: relative; width: 100%; max-width: 100%; padding-bottom: 56.25%; height: 0; }
  /* El iframe ocupa todo el espacio del contenedor */
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  @media (max-width: 768px) { .video-container { max-width: 100%; } }
  /* --- Fin Video ---*/
</style>