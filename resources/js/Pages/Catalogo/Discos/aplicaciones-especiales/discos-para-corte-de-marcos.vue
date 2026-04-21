<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 2.1 Discos Para corte de Marcos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.1 Discos Para corte de Marcos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.1, una referencia técnica diseñada específicamente para el corte de marcos. Esta herramienta ha sido desarrollada para ofrecer un corte excepcionalmente preciso y estable, condiciones indispensables para lograr uniones limpias y ensambles de alta calidad en trabajos de carpintería fina.</p>
          <p>La excelencia de esta serie reside en su cuerpo de acero pretensado de alta resistencia, diseñado para absorber las tensiones mecánicas y térmicas que suelen comprometer la rectitud del corte en ingletadoras. Es una herramienta crítica para procesos donde la precisión angular define la calidad del producto final, permitiendo trabajar con maderas nobles, molduras lacadas o recubiertas sin riesgo de astillamiento en las aristas vistas.</p>
          <p>Gracias a la ingeniería de HECOMA®, estos discos minimizan las vibraciones laterales, garantizando que los ángulos de inglete sean perfectos y el acabado superficial sea impecable. Es la solución ideal para la fabricación de marcos de cuadros, molduras decorativas y estructuras de mobiliario que exigen una terminación artesanal con rendimiento industrial.</p>
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