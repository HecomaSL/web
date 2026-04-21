<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="AFILADO DE HERRAMIENTAS DE MADERA | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">AFILADO DE HERRAMIENTAS PARA CORTE DE MADERA</h1>
        <p class="text-white font-bold ">Servicios de afilado confiables, de calidad y con el máximo rendimiento.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Afilado y mantenimiento profesional para maximizar el rendimiento de sus herramientas</h2>
        <p>Saque el máximo partido a su herramienta con nuestros servicios de afilado y mantenimiento. El rendimiento, la calidad de acabados y la fiabilidad, son nuestro baluarte.  Somos fabricantes, y por tanto recomendamos un correcto mantenimiento y afilado de sus herramientas de metal duro o acero rápido (HSS), para alargar su vida sin perder calidad.</p>
        <iframe width="100%" height="450" src="https://www.youtube.com/embed/EqSfdHvMbV0" title="Mantenimiento Herramientas de corte" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-xl shadow-lg mt-8"></iframe>
        <img src="images/servicios/afilado-calidad.jpg">
        <p>Las últimas tecnologías <a href="https://hecoma.com/incorporamos-walter-heliotronic-power-diamond-400/">para afilado mediante tecnología CNC</a>, nuestro personal con alta cualificación y gran experiencia, nuestros controles de calidad, así como una ágil logística, hacen de HECOMA S.L. su aliado perfecto en el día a día de su fábrica</p>
        <img src="images/servicios/afilado-calidad-2.jpg">
        <p>Recupere la calidad de acabados y rendimiento de su herramienta para corte de la madera, confiando a HECOMA sus:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Discos / Sierras circulares metal duro y acero (HSS)</span></li>
            <li><span class="text-gray-700 font-normal">Sierras de cinta (afilado, triscado y reparación)</span></li>
            <li><span class="text-gray-700 font-normal">Fresas de todo tipo y uso (ranurar, espigar, galces, etc.)</span></li>
            <li><span class="text-gray-700 font-normal">Brocas metal duro, acero (HSS), de mango roscado, sujeción rápida, etc.</span></li>
            <li><span class="text-gray-700 font-normal">Cuchillas de torno, reversibles, corrugadas, etc.</span></li>
            <li><span class="text-gray-700 font-normal">Bedanos</span></li>
            <li><span class="text-gray-700 font-normal">Cadenas de escopleadoras</span></li>
            <li><span class="text-gray-700 font-normal">...</span></li>
        </ul>
        <p>Nuestro equipo comercial le ofrece el asesoramiento necesario y la recogida de sus herramientas de forma directa, sin intermediarios. Si lo desea, también recogemos y entregamos de forma urgente con las principales empresas de mensajería. Nuestros acuerdos a nivel nacional le ofrecen entrega puntual en 24, 48 o 72 horas, según su necesidad.</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  #divh1 p { text-align: center; }
</style>