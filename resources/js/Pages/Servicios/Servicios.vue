<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="SERVICIOS | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">SERVICIOS DE AFILADO DE HERRAMIENTAS DE ALTA PRECISIÓN</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Servicios técnicos especializados en herramientas de corte</h2>
        <p>En HECOMA, llevamos más de 20 años ayudando a empresas a mejorar la productividad y eficiencia mediante herramientas de corte de alta precisión y soluciones a medida. Combinamos tecnología avanzada con experiencia técnica especializada, asegurado resultados precisos, duraderos y adaptados a las necesidades de cada cliente..</p>
        <p>Trabajamos con un enfoque orientado a la calidad y al rendimiento, ofreciendo asesoramiento profesional, mantenimiento y soluciones que garantizan un corte estable, seguro y eficiente en el día a día. Nos comprometemos a acompañarte en cada fase del proyecto, aportando soporte cercano y respuesta ágil para que tu maquinaria y tus herramientas trabajen siempre al máximo nivel.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Elige el servicio que mejor se adapta a tu producción</h2>
      <div class="space-4 text-gray-700 botones">     
        <a href="/afilado"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">Afilado</button></a>
        <a href="/fabricacion-a-medida"><button class="px-6 py-2 bg-white text-[#010cf7] border-2 border-white rounded-lg font-bold transition-all duration-300 hover:bg-[#010cf7] hover:text-white hover:border-[#010cf7] shadow-md">Fabricacion a Medida</button></a> 
      </div>
      <br>
      <img src="/images/servicios/afilado.jpg" alt="">
      <br>
      <img src="/images/servicios/fabricacion-a-medida.jpg" alt="">
    </section>

  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  #divh1 p { text-align: center; }
  .botones {
    display: flex;
    justify-content: space-around;
  }
</style>