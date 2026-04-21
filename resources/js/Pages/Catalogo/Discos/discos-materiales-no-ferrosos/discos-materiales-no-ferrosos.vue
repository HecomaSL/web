<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 7.1 Discos para aluminio y otros metales ligeros no ferrosos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 7.1 Discos para aluminio y otros metales ligeros no ferrosos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos para materiales no ferrosos, ponemos a su disposición la Serie 7.1, formada por herramientas especializadas en el seccionado de aluminio y otros metales ligeros. Estos discos han sido diseñados para ofrecer un corte limpio, preciso y seguro en aplicaciones profesionales e industriales exigentes.</p>
          <p>Gracias a la ingeniería de HECOMA®, están especialmente adaptados para trabajar sobre materiales como aluminio, cobre y diversas aleaciones ligeras, garantizando un rendimiento constante y una excelente calidad de acabado superficial.</p>
          <p>Su geometría de corte avanzada permite una evacuación eficiente de la viruta, evitando el sobrecalentamiento y asegurando una larga durabilidad del filo en procesos de producción continua.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para el corte de materiales no ferrosos, como aluminio y metales ligeros</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente diseñada para un corte suave, evitando la adherencia del material al diente</span></li>
            <li><span class="text-gray-700 font-normal">Alta estabilidad de corte y reducción de vibraciones para mejorar la calidad del acabado</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones profesionales donde se requiere precisión y seguridad en el mecanizado de metales ligeros</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para el corte de perfiles, tubos y chapas en sierras circulares y equipos industriales</span></li>
        </ul>
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