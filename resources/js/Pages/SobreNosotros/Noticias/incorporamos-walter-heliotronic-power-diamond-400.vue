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
  <Head title="Incorporamos la Walter Heliotronic Power Diamond 400 | HECOMA" />

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
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Incorporamos la Walter Heliotronic Power Diamond 400<br>a nuestra fábrica de Sonseca</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/walter-heliotronic.jpg" alt="Walter Heliotronic Power Diamond 400" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <p>La Walter Heliotronic Power Diamond 400 es una máquina automática que nos permite seguir evolucionando en nuestra capacidad productiva. Es capaz de trabajar sobre materiales de corte variados, tanto metal duro, acero rápido y varios tipos de diamante. La máquina en su conjunto es la única implantada en nuestro sector con sus características, en el territorio nacional.</p>

        <!-- imgytext 1 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic.jpg')">
            <img src="/images/noticias/walter-heliotronic.jpg" alt="Vista desde el cargador" class="hover:opacity-90 transition" />
            <p>Vista desde el cargador</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-2.jpg')">
            <img src="/images/noticias/walter-heliotronic-2.jpg" alt="Vista desde la zona de mecanizado" class="hover:opacity-90 transition" />
            <p>Vista desde la zona de mecanizado</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-3.jpg')">
            <img src="/images/noticias/walter-heliotronic-3.jpg" alt="Brazo robótico de carga" class="hover:opacity-90 transition" />
            <p>Brazo robótico de carga</p>
          </div>
        </div>

        <p>La variante que adquirimos cuenta con un brazo robótico de carga y bahías de herramientas para tratar y ya tratadas. De esta forma la productividad de la máquina y seguridad para los operarios se incrementan de forma muy significativa.</p>

        <!-- imgytext 2 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-llegada.jpeg')">
            <img src="/images/noticias/walter-heliotronic-llegada.jpeg" alt="Llegada del transporte" class="hover:opacity-90 transition" />
            <p>Llegada del transporte</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-mecanizado.jpeg')">
            <img src="/images/noticias/walter-heliotronic-mecanizado.jpeg" alt="Módulo de mecanizado" class="hover:opacity-90 transition" />
            <p>Módulo de mecanizado</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-cargador.jpeg')">
            <img src="/images/noticias/walter-heliotronic-cargador.jpeg" alt="Módulo de cargador" class="hover:opacity-90 transition" />
            <p>Módulo de cargador</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/walter-heliotronic-ambos.jpeg')">
            <img src="/images/noticias/walter-heliotronic-ambos.jpeg" alt="Ubicación de ambos módulos" class="hover:opacity-90 transition" />
            <p>Ubicación de ambos módulos</p>
          </div>
        </div>

        <p>Su capacidad de trabajo, la calidad de acabados y la muy elevada precisión que nos proporciona, incrementa, aún mas, la calidad de nuestra herramienta, su precisión y su duración.  Un paso mas adelante, en la constante mejora de nuestros productos, su plazo de entrega y en la mejora de productividad de nuestra herramienta para nuestros clientes.</p>
        <p>Les dejamos, por el momento, un vídeo demostrativo de la operación de la máquina, que nos ha cedido el fabricante:</p>
        <div class="flex justify-center">
          <div class="video-container shadow-xl rounded-lg overflow-hidden">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/dZcYJpUeuqk?si=pcXEVVbk38TMyr6b" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
    transform: scale(1.2);
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