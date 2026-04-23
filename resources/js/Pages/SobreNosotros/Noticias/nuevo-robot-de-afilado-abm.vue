<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

const imagenExpandida = ref(null);

const abrirImagen = (url) => {
  imagenExpandida.value = url;
  document.body.style.overflow = 'hidden';
};

const cerrarImagen = () => {
  imagenExpandida.value = null;
  document.body.style.overflow = 'auto';
};

const manejarTecla = (e) => {
  if (e.key === 'Escape') cerrarImagen();
};

onMounted(() => window.addEventListener('keydown', manejarTecla));
onUnmounted(() => window.removeEventListener('keydown', manejarTecla));
</script>

<template>
  <Head title="Nuevo Robot de afilado ABM en producción en HECOMA | HECOMA" />

  <MainLayout>

    <!-- ===== MODAL ===== -->
    <Transition name="fade">
      <div
        v-if="imagenExpandida"
        class="modal-overlay"
        @click.self="cerrarImagen"
      >
        <button class="boton-cerrar" @click="cerrarImagen" aria-label="Cerrar imagen">&times;</button>
        <div class="contenedor-imagen">
          <img :src="imagenExpandida" alt="Imagen ampliada" class="imagen-grande" />
        </div>
      </div>
    </Transition>
    <!-- ===== FIN MODAL ===== -->

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

        <!-- imgytext 1 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot-detalle-afilado.jpg')">
            <img src="/images/noticias/robot-detalle-afilado.jpg" alt="Detalle de afilado" class="hover:opacity-90 transition" />
            <p>Detalle de afilado</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot-vista-general.jpg')">
            <img src="/images/noticias/robot-vista-general.jpg" alt="Robot vista general" class="hover:opacity-90 transition" />
            <p>Robot vista general</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot-abm.jpg')">
            <img src="/images/noticias/robot-abm.jpg" alt="ABM Premium Load 3600" class="hover:opacity-90 transition" />
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

        <!-- imgytext 2 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot_brazo-robotico.jpg')">
            <img src="/images/noticias/robot_brazo-robotico.jpg" alt="Brazo Robótico de carga" class="hover:opacity-90 transition" />
            <p>Brazo Robótico de carga</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot_vista-de-trabajo.jpg')">
            <img src="/images/noticias/robot_vista-de-trabajo.jpg" alt="Vista de trabajo" class="hover:opacity-90 transition" />
            <p>Vista de trabajo</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/robot_trabajando.jpg')">
            <img src="/images/noticias/robot_trabajando.jpg" alt="Trabajando" class="hover:opacity-90 transition" />
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
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  @media (max-width: 768px) { .video-container { max-width: 100%; } }
  /* --- Fin Video ---*/

  /* Estilos del Overlay (Fondo oscuro) */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    cursor: zoom-out;
  }

  .contenedor-imagen {
    max-width: 90%;
    max-height: 90%;
    display: flex;
    justify-content: center;
  }

  .imagen-grande {
    max-width: 100%;
    max-height: 90vh;
    object-fit: contain;
    border-radius: 4px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    cursor: default;
    transform: scale(1.5);
    transform-origin: center center;
  }

  /* Botón X */
  .boton-cerrar {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 50px;
    color: white;
    background: none;
    border: none;
    cursor: pointer;
    line-height: 1;
    transition: transform 0.2s ease;
    z-index: 10000;
  }

  .boton-cerrar:hover {
    transform: scale(1.2);
    color: #ff4444;
  }

  /* Animación de entrada y salida suave */
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
</style>