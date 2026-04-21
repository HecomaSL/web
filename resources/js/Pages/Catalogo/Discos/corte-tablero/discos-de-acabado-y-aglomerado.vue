<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 1.3. Discos de acabado y aglomerado - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.3. Discos de acabado y aglomerado.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra línea de Discos de corte de tablero, presentamos la Serie 1.3, una gama de discos de acabado y aglomerado diseñados específicamente para el lijado y preparación de superficies críticas..</p>
          <p>Estos discos son la herramienta ideal para trabajar con madera, MDF, melamina y tablero aglomerado, permitiendo eliminar imperfecciones e igualar la pieza con total precisión. Gracias al diseño de HECOMA®, esta serie garantiza un acabado uniforme y profesional, dejando la superficie lista para procesos posteriores de pintura, barnizado o lacado. Son la solución perfecta para la fabricación de muebles donde la estética y la suavidad del material son fundamentales.</p>
          <p>Los discos de acabado y aglomerado son abrasivos ideales para el lijado y preparación de superficies en madera, MDF, melamina y tablero aglomerado. Se usan para eliminar imperfecciones, igualar la pieza y dejar un acabado uniforme, listo para pintar, barnizar o lacar. Perfectos para carpintería y fabricación de muebles, ofrecen buen rendimiento, control y un acabado profesional.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Medidas disponibles</h2>        
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  .img { display: flex; justify-content: center; }
</style>