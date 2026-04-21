<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Obtén la máxima rentabilidad en su herramienta | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Obtén la máxima rentabilidad en su herramienta con HECOMA®.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        
        <div class="flex justify-center">
          <img  src="/images/historia/hecoma-fabricacion.jpg" alt="Rendimiento Herramientas" class="rounded-lg shadow-md w-full md:w-auto">
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold">¿Cómo obtenemos la máxima rentabilidad de nuestra herramienta de corte para madera?</h2>
        <p>La máxima rentabilidad la conseguimos teniendo en cuenta los siguientes factores: Idoneidad, correcto uso y mantenimiento adecuado. Veamos con detenimiento cada uno de ellos.</p>
        <h3 class="text-[#010cf7] text-2xl md:text-3xl font-bold">Idoneidad de la herramienta</h3>
        <p>HECOMA® fabrica su herramienta de corte para madera de forma específica para el trabajo a realizar. Es decir, cada herramienta se fabrica conociendo el trabajo que desea realizar el cliente, el material que va a trabajar, la máquina donde se instala la herramienta, la velocidad con la que se va a trabajar, etc. Todos estos factores son DETERMINANTES para el diseño y fabricación de la Herramienta.</p>
        <p>Por tanto, para obtener rendimiento y durabilidad de la herramienta que adquirimos, lo primero es transmitir al fabricante toda la información posible.</p>
        
        <h3 class="text-[#010cf7] text-2xl md:text-3xl font-bold">Correcto uso de la herramienta</h3>
        <p>Al igual que seleccionar la herramienta adecuada al trabajo a realizar, es muy importante usar esta de forma correcta. Aquí entran de nuevo múltiples factores, pero lo fundamental es usar la herramienta solo para lo que fue diseñada:</p>
        
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal"><b>Rangos de velocidad ajustados</b> a los indicados, tanto en avance como en RPMs.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Materiales</b>. La herramienta está pensada para trabajar con un tipo de materiales específicos. Usar la herramienta para otros materiales puede producir mala calidad de acabado y acortar la vida de esta.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Modelo de máquina</b>. Cada máquina tiene unas especificaciones de trabajo únicas.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Limpieza periódica</b> con el producto adecuado eliminando restos de adhesivos, barnices y resinas.</span></li>
        </ul>

        <h3 class="text-[#010cf7] text-2xl md:text-3xl font-bold">Mantenimiento</h3>
        <p>El Reafilado, reparación y ajuste de las superficies de corte. Este es el factor crítico y la calidad de estos trabajos determinan el rendimiento y la vida de su herramienta.</p>
        <p>En HECOMA® nuestro objetivo principal es LA RENTABILIDAD DE SU HERRAMIENTA. Con maquinaria avanzada y un afilado concienzudo, garantizamos que la herramienta funcione con menos vibraciones y mejor acabado.</p>

        <p>Si busca alargar la vida útil de su herramienta, le aconsejamos afilar a menudo en lugar de «apurar» al máximo:</p>
        
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">El estado del filo es determinante en el acabado.</span></li>
          <li><span class="text-gray-700 font-normal">El re afilado será más rápido y menos costoso.</span></li>
          <li><span class="text-gray-700 font-normal">Minimizará la posibilidad de daños en las superficies de corte.</span></li>
          <li><span class="text-gray-700 font-normal">Podrá re afilarse muchas más veces al retirar menos material cada vez.</span></li>
        </ul>

        <div class="flex justify-center mt-10">
          <div class="video-container shadow-xl rounded-lg overflow-hidden border border-gray-100">
            <iframe src="https://www.youtube.com/embed/EqSfdHvMbV0" title="Mantenimiento HECOMA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
        </div>

      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Estilos de Texto --- */
  p { text-align: justify; line-height: 1.6; }
  h2, h3 { line-height: 1.2; text-align: left; }

  /* --- Video Responsive (Proporción 16:9) --- */
  .video-container { position: relative; width: 100%; max-width: 850px; padding-bottom: 56.25%; height: 0; }
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

  /* --- Ajustes Móvil --- */
  @media (max-width: 768px) {
    .video-container { max-width: 100%; }
    h2, h3 { font-size: 1.5rem; text-align: justify; }
    p { font-size: 1rem; }
  }

  .imgytext p { text-align: center; }
  .imgytext img { height: 250px; width: 250px; padding: 1%; object-fit: cover; }
  .imgytext { padding: 1%; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
</style>