<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 11.2 Discos silenciados para marcos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 11.2 Discos silenciados para marcos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Integrada en nuestra familia de soluciones acústicas, la Serie 11.2 se especializa exclusivamente en el corte de marcos, donde la precisión del inglete es el factor determinante. Estos discos han sido desarrollados bajo la ingeniería de HECOMA® para ofrecer una estabilidad lateral absoluta, eliminando las micro-vibraciones que suelen comprometer las uniones críticas.</p>
          <p>Gracias a sus sistemas de amortiguación acústica, esta serie reduce drásticamente el ruido en el taller mientras garantiza un acabado limpio y sin astillamientos, facilitando un ajuste hermético y milimétrico de las piezas.</p>
          <p>Su estructura está optimizada para mantener la integridad del filo durante jornadas de producción intensiva, convirtiéndose en la herramienta indispensable para talleres de enmarcación que exigen un rendimiento constante, un confort operativo superior y resultados de alta gama en cada ensamblaje.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco diseñado específicamente para el corte de marcos, optimizando el resultado en este tipo de aplicaciones.</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente orientada a conseguir bordes limpios y minimizar astillados, especialmente en piezas vistas</span></li>
            <li><span class="text-gray-700 font-normal">Alta estabilidad de corte para mejorar la precisión en cortes exigentes y facilitar un ensamblaje perfecto</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para trabajos profesionales donde se requiere un acabado uniforme y gran repetitividad, como fabricación de marcos y componentes similares</span></li>
            <li><span class="text-gray-700 font-normal">Ideal para carpintería y producción de puertas, molduras y estructuras donde el corte del marco sea determinante para el ajuste final</span></li>
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