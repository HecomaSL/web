<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 2.4 Discos finos para maderas de calidad - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.4 Discos finos para maderas de calidad.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.4, una referencia de espesor reducido diseñada específicamente para el corte de maderas de calidad. Estos discos de alto rendimiento ofrecen un trabajo rápido y preciso, garantizando un acabado excelente incluso en condiciones de uso intensivo.</p>
          <p>La ventaja competitiva  reside en su capacidad para realizar cortes quirúrgicos con una mínima extracción de viruta. Al contar con un cuerpo de espesor extrafino, se reduce la resistencia al avance y la carga sobre el motor de la maquinaria, lo que permite un deslizamiento suave y evita el sobrecalentamiento de las maderas más sensibles.</p>
          <p>Esta característica es fundamental cuando se trabaja con maderas exóticas o nobles de alto valor económico, donde cada milímetro de material salvado se traduce en rentabilidad.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed ">
        <p>Además, su geometría de diente está calibrada para respetar la estructura celular de la madera, evitando desgarros en las fibras y proporcionando una superficie lista para el acabado final sin necesidad de rectificados agresivos. Gracias al diseño técnico de HECOMA®, su cuerpo fino permite un mayor aprovechamiento de la materia prima al generar una hendidura de corte mínima, reduciendo el desperdicio en maderas nobles.</p>
        <p>Es la solución ideal para profesionales que buscan estabilidad y suavidad en el seccionado, protegiendo la integridad de las fibras y asegurando una terminación impecable en cada pieza.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Diseño fino para un corte más eficiente y con menor consumo de material</span></li>
            <li><span class="text-gray-700 font-normal">Optimizado para obtener un alto rendimiento en maderas de calidad</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente pensada para un corte limpio y estable, reduciendo vibraciones</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para trabajos profesionales donde se requiere precisión y durabilidad.</span></li>
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