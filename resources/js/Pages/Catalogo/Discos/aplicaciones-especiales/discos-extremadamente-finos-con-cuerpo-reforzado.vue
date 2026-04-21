<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 2.6 Discos Extremadamente Finos Con Cuerpo Reforzado - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.6 Discos Extremadamente Finos Con Cuerpo Reforzado.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.6, una referencia de alto rendimiento diseñada para conseguir un corte ultra preciso y rápido. Estos discos extremadamente finos destacan por incorporar un cuerpo reforzado, una innovación técnica de HECOMA® que aporta una estabilidad y seguridad superiores en los trabajos más exigentes.</p>
          <p>Gracias a esta arquitectura, se minimiza la flexión lateral del disco a pesar de su espesor mínimo, garantizando un acabado excelente y un aprovechamiento total de la materia prima. Es la solución definitiva para el seccionado de materiales delicados donde la velocidad de corte y la precisión milimétrica son críticas.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Diseño de espesor extremadamente fino para un corte más eficiente y con mínima pérdida de material</span></li>
            <li><span class="text-gray-700 font-normal">Cuerpo reforzado para mejorar la rigidez y reducir deformaciones durante el trabajo</span></li>
            <li><span class="text-gray-700 font-normal">Alta estabilidad de corte para minimizar vibraciones y mejorar la calidad de terminación</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones donde se requiere máxima precisión y alto rendimiento.</span></li>
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