<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="CATALOGO - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">CATALOGO</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Herramientas de Corte para Madera: Soluciones Industriales de Alto Rendimiento</h2>
        <p>Descubre el catálogo completo de herramientas industriales de HECOMA, diseñado especialmente para profesionales y empresas que buscan alto rendimiento, precisión y fiabilidad en cada aplicación técnica. Como <a href="/fabricacion-a-medida">fabricantes especialistas</a>, integramos la tecnología más avanzada en el desarrollo de soluciones de corte, ofreciendo herramientas con geometrías optimizadas para maximizar la vida útil y la calidad del acabado. Nuestro catálogo incluye:</p>
        <div class="space-4 text-gray-700 botones">   
          <a href="/discos"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">DISCOS</button></a>
          <a href="/fresas"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">FRESAS</button></a>
          <a href="/brocas"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">BROCAS</button></a>
        </div>
        <p>Cada producto en nuestro catálogo ha sido desarrollado con <b>materiales de máxima calidad</b> y <b>tecnología avanzada</b>, garantizando durabilidad, acabados precisos y resultados consistentes en trabajos exigentes.</p>
        <p>El catálogo de HECOMA es tu herramienta de referencia para elegir productos que <b>impulsan la productividad</b> y <b>reducen tiempos de producción</b>, apoyado siempre por nuestro <b>asesoramiento técnico especializado</b> y <b>entrega ágil</b></p>
        <img src="images/servicios/afilado.jpg" alt="Afilado de herramientas">
        <img src="images/servicios/fabricacion-medida.jpg" alt="Fabricacion a medida">
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  .botones { display: flex; justify-content: space-around; }
  a { color:blue; }
</style>