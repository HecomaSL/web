<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="AFILADO DE HERRAMIENTAS DE DIAMANTE | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">AFILADO DE HERRAMIENTAS DE DIAMANTE</h1>
        <p class="text-white font-bold ">Servicios de afilado confiables, de calidad y con el máximo rendimiento, también para su herramienta de diamante.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Servicio especializado de afilado, rectificado y mantenimiento de herramientas de diamante PCD</h2>
        <p>Optimice la producción de su planta y recupere la precisión original de su herramienta de diamante PCD mediante nuestros servicios avanzados de mantenimiento técnico. Como fabricantes especializados, conocemos con exactitud la rentabilidad estratégica que el diamante policristalino aporta a los procesos de mecanizado más exigentes.</p>
        <p>Sabemos que su durabilidad es muy superior a la herramienta de metal duro convencional, pero solo un proceso de afilado por erosión de alta precisión garantiza que el filo recupere su geometría geométrica sin microfisuras.</p>
        <p>Un mantenimiento preventivo y profesional no solo alarga el ciclo de vida de sus fresas y discos, sino que asegura acabados superficiales perfectos, reduciendo drásticamente las paradas de máquina y maximizando el rendimiento de su inversión en herramienta de corte.</p>
        <img src="images/servicios/afilado-diamante.jpg" alt="Afilado fresa diamante">
        <p>Las últimas tecnologías para afilado por electroerosión mediante máquina de CNC, nuestro personal con alta cualificación y gran experiencia, nuestros controles de calidad, así como una ágil logística, hacen de HECOMA S.L. su aliado perfecto en el día a día de su fábrica.</p>
        <img src="images/servicios/afilado-en-maquina-diamante.jpg" alt="Afilado en maquina diamante">
        <p>Confíe a HECOMA sus:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Sierras y discos de diamante</span></li>
          <li><span class="text-gray-700 font-normal">Fresas de diamante</span></li>
          <li><span class="text-gray-700 font-normal">Brocas de diamante</span></li>
          <li><span class="text-gray-700 font-normal">Trituradores  de diamante</span></li>
          <li><span class="text-gray-700 font-normal">Discos incisores  de PCD para perfiladoras</span></li>
          <li><span class="text-gray-700 font-normal">Herramientas de diamante para softformado, postformado y preformado (una de nuestras especialidades</span></li>
          <li><span class="text-gray-700 font-normal">etc</span></li>
        </ul>
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