<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 6.1 Discos Para Máquina Portatil - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 6.1 Discos Para Máquina Portatil.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La Serie 6.1 se consolida como la solución definitiva en discos para máquina portátil, específicamente diseñados para el profesional que exige un corte preciso, seguro y de alto rendimiento en entornos de obra y taller.</p>
          <p>Gracias a su avanzada ingeniería, estos discos están optimizados para ofrecer una estabilidad dinámica superior, reduciendo drásticamente las vibraciones y garantizando un manejo ergonómico en herramientas electroportátiles e inalámbricas.</p>
          <p>El diseño destaca por su geometría de diente de bajo rozamiento, lo que reduce la carga mecánica sobre el motor de la herramienta. Esta característica es vital para optimizar la autonomía en máquinas de batería, permitiendo realizar un mayor número de cortes por carga sin sacrificar la velocidad de avance.</p>
        </div>
    </div>
    <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Además, el cuerpo de la sierra ha sido rectificado con tolerancias industriales para evitar el «serpenteo» durante el corte manual, asegurando una trayectoria rectilínea y un acabado limpio incluso en maderas de construcción, tableros de encofrado o materiales compuestos.</p>
        <p>Con HECOMA, usted asegura una inversión en herramientas de corte industrial que combinan robustez técnica con la agilidad necesaria para los trabajos de montaje más exigentes.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para máquina portátil, adaptado a sierras circulares manuales y equipos similares.</span></li>
            <li><span class="text-gray-700 font-normal">Diseño orientado a un corte estable y controlado, facilitando el trabajo del operario</span></li>
            <li><span class="text-gray-700 font-normal">Alta resistencia del cuerpo del disco para soportar condiciones de trabajo exigentes y uso continuo</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para trabajos de carpintería, montaje y cortes en obra, con resultados fiables y limpios</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para profesionales que buscan un buen equilibrio entre rendimiento, seguridad y facilidad de uso</span></li>
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