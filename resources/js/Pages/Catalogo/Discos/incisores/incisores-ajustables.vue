<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 3.4 Incisores ajustables - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 3.4 Incisores ajustables.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Incisores, ponemos a su disposición la Serie 3.4, compuesta por incisores ajustables diseñados para ofrecer la máxima versatilidad y precisión en el pre-corte de paneles. Gracias a su sistema de ajuste, esta herramienta permite adaptar el ancho de corte a distintas configuraciones de disco principal, garantizando un acabado limpio y sin astillados.</p>
          <p>La ingeniería de los incisores ajustables permite una regulación micrométrica mediante juegos de arandelas de precisión, lo que asegura una coincidencia exacta con el espesor del diente de la sierra principal en cada afilado.</p>
          <p>Este diseño extensible es crucial para talleres que manejan diversos tipos de tableros y requieren una flexibilidad total sin comprometer la rigidez del conjunto. Es la inversión más rentable para entornos de producción variables donde la agilidad en el cambio de herramientas y la precisión absoluta en melaminas y laminados son prioridades críticas.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Desarrollados por HECOMA®, estos incisores son la solución técnica ideal para trabajar con materiales revestidos y superficies decorativas, permitiendo cambios rápidos de configuración sin sacrificar la calidad profesional del seccionado.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Incisor ajustable para regular el ancho de corte según el disco principal</span></li>
            <li><span class="text-gray-700 font-normal">Diseñados para mejorar la calidad del canto mediante un pre-corte preciso</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para trabajar en seccionadoras y máquinas de corte de paneles</span></li>
            <li><span class="text-gray-700 font-normal">Alta precisión y estabilidad para obtener resultados uniformes y repetitivos.</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para el mecanizado de tableros revestidos, melaminas y otros materiales delicados.</span></li>
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