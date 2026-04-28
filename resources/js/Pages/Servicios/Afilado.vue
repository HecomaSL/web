<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head>
    <title>Afilado de Herramientas de Alta Precision | HECOMA</title>
    <meta name="description" content="No espere a que la calidad de su producto final disminuya o a que su maquinaria sufra por un sobreesfuerzo innecesario. En el mundo del mecanizado y la carpintería industrial, el estado de sus herramientas es el factor que define la línea entre la rentabilidad y las pérdidas ocultas. No espere a que sea demasiado tarde." />
    <meta name="keywords" content="afilado, afilado de herramientas, brocas, fresas, discos, " />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">SERVICIOS DE AFILADO DE HERRAMIENTAS DE ALTA PRECISIÓN</h1>
        <p class="text-white font-bold ">En HECOMA, devolvemos a sus herramientas la geometría de corte original. Especialistas en soluciones integrales para la industria de la madera, el metal y composites.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Excelencia en el mantenimiento de herramientas de corte</h2>
        <p>El rendimiento de su línea de producción depende directamente del estado de sus filos. Un afilado deficiente no solo empeora el acabado del producto, sino que aumenta el consumo energético y reduce la vida útil de la maquinaria.</p>
        <p>Un mantenimiento preventivo y profesional no solo alarga el ciclo de vida de sus fresas y discos, sino que asegura acabados superficiales perfectos, reduciendo drásticamente las paradas de máquina y maximizando el rendimiento de su inversión en herramienta de corte</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Nuestros servicios de afilado:</h2>
          <div class="space-y-4 text-gray-700">
            <p>En HECOMA, entendemos que una herramienta bien afilada es el corazón de una producción eficiente. Con décadas de experiencia en el sector, nos hemos consolidado como el partner estratégico para industrias que exigen la máxima precisión. No solo recuperamos el filo; optimizamos la geometría de corte de sus herramientas para prolongar su vida útil y garantizar acabados impecables en cada pieza.</p>
            <p>El desgaste es inevitable, pero la pérdida de calidad no tiene por qué serlo. Por eso, en HECOMA nos especializamos en.</p>
            <div class="space-4 text-gray-700 botones"> 
              <a href="/afilado-para-diamante"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">Afilado Herramientas de Diamante</button></a>
              <a href="/afilado-para-madera"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">Afilado Herramientas de MD y HSS</button></a>  
            </div>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Su herramienta necesita pasar por HECOMA?</h2>
          <div class="space-y-4 text-gray-700">
            <p>No espere a que la calidad de su producto final disminuya o a que su maquinaria sufra por un sobreesfuerzo innecesario. En el mundo del mecanizado y la carpintería industrial, el estado de sus herramientas es el factor que define la línea entre la rentabilidad y las pérdidas ocultas. No espere a que sea demasiado tarde. Asegure la máxima eficiencia de su taller hoy mismo.</p>
            <div class="space-4 text-gray-700 botones"> 
              <button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">SOLICITE SU AFILADO AQUI</button>  
            </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  #divh1 p { text-align: center; }
  .botones { display: flex; justify-content: space-around; }
</style>