<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Nuevos embalajes para herramientas | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Nuevos embalajes para herramientas HECOMA</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/historia/hecoma-paquete.jpg" alt="Cajas HECOMA">
        </div>
        <p>En este post,  os queremos mostrar nuestras nuevas cajas y embalajes de protección para nuestras herramientas de corte para madera. Después de meses de pruebas de diseño y de materiales, hemos conseguido un conjunto de cajas y espumas reticuladas de polietileno (Microlen®) con las prestaciones que buscamos.</p>
        <p>El resultado de todo este trabajo, es un embalaje resistente, altamente protector y con una imagen acorde con nuestras herramientas para madera. Tenemos diferentes medidas y formas interiores para ajustarse a todas nuestros productos:  discos de corte, fresas, cabezales , brocas, etc.  de forma que todas quedan óptimamente protegidas para su transporte</p>
        <p>En el siguiente montaje fotográfico podéis ver el resultado de nuestro trabajo: <a href="https://www.facebook.com/watch/?v=369543973494764">https://www.facebook.com/watch/?v=369543973494764</a>. ¿Qué os parece el resultado?</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Divs --*/
  .custom-card { font-size: 16px; background-color: #f0f4f8; }
  @media (max-width: 768px) { .custom-card { font-size: 13px; width: 100%; } }
  h3 { letter-spacing: -0.01em; line-height: 1.2; }
  /* -- fin divs --*/

  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; text-align: justify; }
  
  .table-container { font-size: 16px; }
  thead { background-color: blue; }
  @media (max-width: 768px) { thead { font-size: 10px; } tbody { font-size: 10px; } }
  table { border-collapse: collapse; table-layout: fixed; width: 100%; border: 1px solid red; }
  th { padding-top: 2%; padding-bottom: 2%; font-size: 1em; font-weight: bold; text-transform: uppercase; line-height: 1.2; vertical-align: middle; border: 1px solid red; }
  td { padding: 3%;font-size: 0.8em; line-height: 1.3; word-wrap: break-word; overflow-wrap: break-word; vertical-align: middle; border: 1px solid red; }
  @media (min-width: 768px) { th, td { padding-top: 2%; padding-bottom: 2%; } }
  td:first-child { letter-spacing: -0.01em; }
  a { color: blue; }
</style>