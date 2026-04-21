<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 2.5 Discos muy finos con cuerpo de alta tenacidad - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.5 Discos muy finos con cuerpo de alta tenacidad.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.5, una referencia de alto rendimiento que combina un espesor reducido con un cuerpo de alta tenacidad. Esta herramienta ha sido diseñada para lograr un corte preciso y estable, garantizando un acabado superior incluso en los trabajos más exigentes y continuos.</p>
          <p>Lo que distingue a esta serie es el uso de aceros especiales sometidos a tratamientos térmicos de última generación, que confieren al núcleo de la sierra una memoria elástica excepcional. A diferencia de otros discos finos convencionales que pueden oscilar bajo presión, nuestro cuerpo de alta tenacidad absorbe las cargas laterales y disipa el calor de forma eficiente, manteniendo la planitud absoluta durante el seccionado.</p>
          <p>Esta estabilidad mecánica permite trabajar a velocidades de avance superiores en procesos industriales automatizados, donde el aprovechamiento crítico del material debe convivir con una resistencia extrema al pandeo.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed ">
        <p>Gracias a la ingeniería avanzada de HECOMA®, estos discos resisten mejor las tensiones mecánicas y el calor, evitando deformaciones en el cuerpo de la sierra a pesar de su perfil extra fino. Es la solución ideal para procesos industriales que requieren el máximo aprovechamiento del material sin sacrificar la rigidez ni la calidad de terminación profesional.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Diseño de espesor muy fino para un corte más rápido y con menor pérdida de material</span></li>
            <li><span class="text-gray-700 font-normal">Cuerpo de alta tenacidad para mejorar la resistencia y la estabilidad durante el corte</span></li>
            <li><span class="text-gray-700 font-normal">Mayor control para obtener un acabado limpio y minimizar vibraciones</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones donde se requiere alta precisión y máximo rendimiento.</span></li>
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