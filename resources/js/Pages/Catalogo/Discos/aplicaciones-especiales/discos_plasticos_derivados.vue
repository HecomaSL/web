<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 2.2 Discos Para Plásticos y Derivados - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.2 Discos Para Plásticos y Derivados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra serie de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.2, una referencia técnica diseñada específicamente para el corte de materiales plásticos, derivados de la madera y resinas.</p>
          <p>Esta herramienta ha sido desarrollada por HECOMA® para ofrecer un seccionado preciso en superficies que tienden a astillarse o fundirse con discos convencionales.</p>
          <p>Gracias a su geometría de corte optimizada, estos discos aseguran una evacuación de calor eficiente y un acabado limpio, eliminando la aparición de rebabas en el material. Es la solución ideal para talleres que trabajan con plásticos técnicos y materiales compuestos que exigen una máxima calidad de terminación y durabilidad del filo.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">El ángulo de ataque de estos discos es de 10º.</span></li>
            <li><span class="text-gray-700 font-normal">Dentado en forma de trapecio plano</span></li>
            <li><span class="text-gray-700 font-normal">Ancho de diente entre 2,5 mm y 3,5 mm</span></li>
            <li><span class="text-gray-700 font-normal">Diámetros entre 200 mm y 350 mm.</span></li>
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