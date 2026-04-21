<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Incorporamos la Vollmer QXD250 a producción | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Un paso más en innovación: incorporamos la Vollmer QXD250 a nuestra producción</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>Recientemente hemos incorporado a nuestra cadena de producción un nuevo robot del fabricante Vollmer, concretamente el modelo Vollmer QXD250, una solución de última generación destinada al acabado y mantenimiento de herramientas con superficies de corte fabricadas en diamante policristalino (PCD).</p>
        <img src="/images/noticias/Vollmer_QXD250.jpeg" alt="Vollmer QXD250">
        <p>La Vollmer QXD250 está especialmente diseñada para trabajos de alta precisión sobre herramientas de PCD, un material que se ha consolidado como imprescindible en el sector industrial de la madera debido a la creciente utilización de materiales modernos altamente abrasivos. Este tipo de aplicaciones exige una precisión extrema, una calidad de acabado superior y una resistencia muy elevada de la herramienta, cualidades en las que el diamante destaca de forma incuestionable.</p>
        <p>En la actualidad, nuestra empresa dispone ya de tres máquinas robotizadas destinadas al trabajo con diamante. Con esta nueva incorporación, ampliamos nuestra capacidad productiva mediante un sistema de carga automática de herramientas, tecnología de la que hasta ahora sólo disponíamos en una de nuestras máquinas, mientras que el resto operaban con carga manual.</p>
        <img src="/images/noticias/Vollmer_QXD250_2.jpeg" alt="Vollmer QXD250">
        <p>La automatización del proceso de carga permite incrementar la productividad hasta 2,5 veces, al tiempo que mejora significativamente la seguridad del operario y la eficiencia global del proceso productivo.</p>
        <img src="/images/noticias/Vollmer_QXD250_3.jpeg" alt="Vollmer QXD250">
        <p>Gracias a su elevada capacidad de trabajo, la excelente calidad de acabado y la altísima precisión que proporciona esta nueva tecnología, damos un paso más en la mejora continua de nuestros productos, aumentando la precisión y la durabilidad de nuestras herramientas, optimizando los plazos de entrega y reforzando la productividad que ofrecemos a nuestros clientes.</p>
        <p>Este proyecto ha contado con un incentivo de la Junta de Comunidades de Castilla-La Mancha, con una inversión de treinta dos mil novecientos un euros (32.901,00€) de los cuales han sido concedidos diez mil seiscientos treinta euros con treinta un céntimos (10.630,31€), cofinanciado en un 80 % por la Unión Europea a través del Fondo Europeo de Desarrollo Regional (FEDER), en el marco del proyecto:</p>
        <p style="text-align: center;">«Conseguir un tejido empresarial más competitivo»</p>
        
        <video ref="miVideo" class="w-full rounded-lg shadow-xl" controls >
            <source src="https://hecoma.com/wp-content/uploads/2026/04/Vollmer-QXD250-_-video.mp4" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
      </div>
    </section>

  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p {
    text-align: justify;
    line-height: 1.6;
  }
  h2 {
    line-height: 1.2;
  }
</style>