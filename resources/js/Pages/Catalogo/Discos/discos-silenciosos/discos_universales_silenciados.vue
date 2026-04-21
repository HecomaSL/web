<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 11.1 Discos universales silenciados - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 11.1 Discos universales silenciados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra arquitectura de soluciones acústicas, la Serie 11.1 se integra como una variante fundamental en discos universales silenciados, específicamente diseñada para equilibrar un rendimiento polivalente con una reducción drástica del impacto sonoro. Esta serie aprovecha la ingeniería de HECOMA® para implementar sistemas de amortiguación que absorben las resonancias armónicas antes de que se conviertan en ruido..</p>
          <p>Al minimizar la vibración estructural, estos discos no solo optimizan el confort del operario, sino que garantizan una estabilidad de corte superior, permitiendo acabados de alta precisión y una mayor limpieza en cada pasada.</p>
          <p> Es una herramienta técnica versátil, ideal para talleres profesionales que buscan un mecanizado estable, fluido y silencioso, asegurando una durabilidad constante y un comportamiento térmico excelente en aplicaciones de corte universales donde la calidad del entorno de trabajo es una prioridad competitiva.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco universal apto para una amplia variedad de aplicaciones en carpintería y fabricación de muebles.</span></li>
            <li><span class="text-gray-700 font-normal">Diseño silenciado para disminuir el ruido y mejorar el confort del operario, especialmente en usos intensivos</span></li>
            <li><span class="text-gray-700 font-normal">Mayor estabilidad de corte gracias a la reducción de vibraciones, obteniendo un acabado más limpio y uniforme</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para cortes de calidad en madera y tableros (MDF, melamina, rechapados), según la aplicación y el tipo de diente</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para talleres que buscan un equilibrio entre rendimiento, precisión y baja sonoridad</span></li>
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