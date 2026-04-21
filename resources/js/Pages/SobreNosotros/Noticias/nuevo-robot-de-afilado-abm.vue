<script setup>
import { ref } from 'vue'; // Añadir ref
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Nuevo Robot de afilado ABM en producción en HECOMA | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Nuevo Robot de afilado ABM en producción en HECOMA</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/robot-abm.jpg" alt="Walter Heliotronic Power Diamond 400" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Hemos incorporado a nuestra planta de Lucena un nuevo robot de afilado ABM Premium-Load 3600.</h2>
        <p>Se ha recibido un incentivo de la Agencia de Innovación y Desarrollo de Andalucía IDEA, de la Junta de Andalucía, por un importe de  65.646,00€, cofinanciado en un 80% por la Unión Europea través del Fondo Europeo de Desarrollo Regional, FEDER para la realización del proyecto «Adquisición de maquinaria herramienta robotizada para el acabado y reparación de herramientas de corte para madera» con el objetivo de «Conseguir un tejido empresarial mas competitivo».</p>
        <p>En el camino de la mejora continua, HECOMA® sigue su plan de inversiones en maquinaria de última generación.  La puesta en marcha de este nuevo ROBOT en la planta de Lucena, agiliza en gran medida los procesos de fabricación y de <a href="/afilado">mantenimiento de herramientas para nuestros clientes.</a></p>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/robot-detalle-afilado.jpg" alt="Afilado PCD Electro abrasión" >
            <p>Detalle de afilado</p>
          </div>
          <div>
            <img src="/images/noticias/robot-vista-general.jpg" alt="Afilado PCD Electro abrasión" >
            <p>Robot vista general</p>
          </div>
          <div>
            <img src="/images/noticias/robot-abm.jpg" alt="Afilado PCD Electro abrasión" >
            <p>ABM Premium Load 3600</p>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Ampliación de la capacidad productiva</h2>
        <p>La adquisición de esta nueva maquinaria robotizada, unida a la contratación de nuevo personal para utilizarla, amplia nuestra capacidad productiva en nuestra sede de Lucena. La demanda de nuestros productos y servicios para la industria de la madera en Andalucía crece a buen ritmo, por lo que para mantener nuestro compromiso con nuestros clientes, se amplia y reparte la capacidad de trabajo entre nuestras dos plantas de Lucena y Sonseca.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Mejora de procesos</h2>
        <p>Ademas de atender la demanda de afilado de herramientas en Andalucía, la nueva Premium-Load 3600, nos permite dar acabado a determinadas herramientas que se fabrican en esta sede. Estas anteriormente habían de ser terminadas en nuestra sede manchega</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">La mejor tecnología</h2>
        <p>Tras estudiar varias opciones, y verlas en funcionamiento en una reciente feria nacional de maquinaria-herramienta, decidimos incorporar este modelo del fabricante ABM, a nuestra cadena de producción.</p>
        <p>Este modelo ofrece la garantía de calidad y acabado que perseguimos en HECOMA®. Con los afilados de alta precisión de esta máquina automática, el cliente obtiene el mejor afilado de su herramienta, con la mínima eliminación de material de corte posible ( mayor número de afilados son posibles ).</p>
        <p>El objetivo perseguido: «La mejor rentabilidad de su herramienta y maquinaria para el trabajo de la madera»</p>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/robot_brazo-robotico.jpg" alt="Afilado PCD Electro abrasión" >
            <p>Brazo Robótico de carga</p>
          </div>
          <div>
            <img src="/images/noticias/robot_vista-de-trabajo.jpg" alt="Afilado PCD Electro abrasión" >
            <p>Vista de trabajo</p>
          </div>
          <div>
            <img src="/images/noticias/robot_trabajando.jpg" alt="Afilado PCD Electro abrasión" >
            <p>Trabajando</p>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Como funciona</h2>
        <p>En el siguiente vídeo pueden observar, en 2 minutos, el proceso automático de la máquina una vez cargada y programada para el trabajo. El trabajo es totalmente automático, lo que redunda en la eficiencia, la seguridad de los operarios y en la productividad.</p>
        <div class="flex justify-center">
          <div class="video-container shadow-xl rounded-lg overflow-hidden">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6LQhl4iDZfo?si=z8BqjgqsUfkgW6B8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Estilos de Texto --- */
  p { text-align: justify; line-height: 1.6; }
  h2, h3 { line-height: 1.2; text-align: justify; }
  .imgytext p { text-align: center; }
  .imgytext img { height: 250px; width: 300px; padding: 1%; object-fit: cover; }
  .imgytext { padding: 1%; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
  /* --- Video ---*/
  .video-container { position: relative; width: 100%; max-width: 100%; padding-bottom: 56.25%; height: 0; }
  /* El iframe ocupa todo el espacio del contenedor */
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  @media (max-width: 768px) { .video-container { max-width: 100%; } }
  /* --- Fin Video ---*/
</style>