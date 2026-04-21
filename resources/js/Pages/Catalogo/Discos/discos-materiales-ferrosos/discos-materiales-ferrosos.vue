<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 8.1 Discos para materiales ferrosos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 8.1 Discos para materiales ferrosos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos para materiales ferrosos, ponemos a su disposición la Serie 8.1, compuesta por herramientas de alta resistencia diseñadas para ofrecer un corte preciso, seguro y eficiente en aplicaciones profesionales e industriales.</p>
          <p>Estos discos están específicamente desarrollados para trabajar sobre aceros y otros metales ferrosos, garantizando un rendimiento constante incluso en las condiciones más exigentes.</p>
          <p>La tecnología de los discos para materiales ferrosos se basa en el uso de dientes de carburo metálico de alta tenacidad, capaces de seccionar el acero con una generación mínima de calor.</p>
          <p>Al realizar un «corte en frío», se evita la alteración térmica de la estructura del metal y se eliminan prácticamente las chispas y el polvo abrasivo, creando un entorno de trabajo mucho más limpio y seguro que los discos de resina convencionales</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>El cuerpo de la sierra está diseñado con ranuras de expansión láser que absorben las vibraciones, permitiendo que el disco mantenga su rigidez estructural frente a la resistencia del material ferroso.</p>
        <p>Gracias a la calidad de fabricación de HECOMA®, esta serie asegura una larga vida útil del filo y una estabilidad superior durante el proceso de corte, convirtiéndose en la opción ideal para talleres metálicos y entornos de producción que requieren fiabilidad y una excelente terminación en cada pieza.</p>
      </div>

    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para el corte de materiales ferrosos, como acero y derivados</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente adaptada para un corte estable y controlado en metal</span></li>
            <li><span class="text-gray-700 font-normal">Alta resistencia del cuerpo del disco para soportar altas cargas y trabajos intensivos</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones industriales donde se requiere precisión y fiabilidad en el corte de metal</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para uso en sierras circulares y equipos específicos para el mecanizado de materiales ferrosos</span></li>
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