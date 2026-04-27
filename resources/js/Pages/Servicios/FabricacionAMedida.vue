<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="FABRICACION A MEDIDA HERRAMIENTAS DE CORTE | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">FABRICACIÓN DE HERRAMIENTAS DE CORTE A MEDIDA</h1>
        <p class="text-white font-bold ">Fabricamos la herramienta especial, con las características que usted nos pida, en un plazo muy breve.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Herramientas especiales a medida con calidad, precisión y rapidez de fabricación</h2>
        <p>En HECOMA S.L., entendemos que los procesos de fabricación más exigentes requieren soluciones que no se encuentran en un catálogo estándar. Por ello, nos especializamos en el diseño y fabricación de herramienta especial de alto rendimiento, adaptada estrictamente a sus especificaciones técnicas y con uno de los plazos de entrega más competitivos del mercado.</p>
        <img src="images/servicios/fabricacion-medida.jpg">
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Por qué elegir nuestra fabricación a medida?</h2>
        <p>Nuestro equipo comercial le ofrece el asesoramiento necesario y convierte sus necesidades en las especificaciones necesarias para la fabricación, sin intermediarios, directo a diseño y a nuestra fábrica.</p>
        <p>Convertimos sus desafíos de producción en herramientas de precisión mediante un proceso integrado que garantiza:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium text-justify">
          <li><span class="text-gray-700 font-normal"><b>Calidad y Rendimiento Superior:</b> Fabricamos herramientas con acabados de máxima precisión que aseguran una vida útil prolongada y un comportamiento óptimo en máquina, reduciendo tiempos de parada</span></li>
          <li><span class="text-gray-700 font-normal"><b>Ingeniería Propia y Diseño CAD/CAM:</b> No dependemos de terceros. Contamos con instalaciones de vanguardia y técnicos expertos que transforman un boceto o una necesidad en un plano técnico ejecutable mediante tecnología CNC de última generación.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Asesoramiento Directo «Fábrica-Cliente»:</b> Nuestro equipo comercial no solo toma pedidos; ofrece consultoría técnica. Eliminamos intermediarios para que la comunicación fluya directamente desde sus necesidades hacia nuestros departamentos de diseño y producción.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Materias Primas de Élite:</b> Utilizamos exclusivamente materiales (metal duro y diamante) de proveedores líderes mundiales, garantizando una resistencia al desgaste excepcional.</span></li>
        </ul>
        <img src="images/servicios/fabricacion-medida-2.jpg" >
        <p>En fábrica, nuestro personal con alta cualificación y experiencia, nuestros controles de calidad, así como una ágil logística, hacen de HECOMA S.L. su aliado perfecto, también, para los trabajos especiales.</p> 
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