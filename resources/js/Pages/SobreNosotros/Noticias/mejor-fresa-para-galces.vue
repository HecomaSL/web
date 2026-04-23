<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

const imagenes = ref([
  { id: 1, url: '/images/fresas/f14.jpg', alt: 'Servicios' },
  { id: 2, url: '/images/fresas/f15.jpg', alt: 'Catálogo' },
  { id: 3, url: '/images/fresas/f16.jpg', alt: 'Noticias' }
]);

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
  <Head title="¿Reafilar o comprar nuevo? | HECOMA" />

  <MainLayout>

    <!-- ===== MODAL ===== -->
    <Transition name="fade">
      <div v-if="imagenExpandida" class="modal-overlay" @click.self="cerrarImagen">
        <button class="boton-cerrar" @click="cerrarImagen" aria-label="Cerrar imagen">&times;</button>
        <div class="contenedor-imagen">
          <img :src="imagenExpandida" alt="Imagen ampliada" class="imagen-grande" />
        </div>
      </div>
    </Transition>
    <!-- ===== FIN MODAL ===== -->

    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Guía de Compra: Cómo elegir la mejor Fresa para Galces</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>Seleccionar la herramienta adecuada marca la diferencia entre un acabado profesional y un panel astillado. En el mercado existen diversas opciones, pero para acertar con las fresas para galces, debemos fijarnos en la orientación del corte y la presencia de elementos de seguridad como los precortadores.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. La gran comparativa: ¿Cortes rectos o cortes alternos?</h2>
        <p>Esta es la duda más común en el taller. La disposición de las cuchillas en el cuerpo de la fresa cambia radicalmente el comportamiento de la máquina y el resultado en la madera:</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">F14: Cortes Rectos</h3>
            <h4 class="text-[#003399] text-xl md:text-m font-semibold text-center mb-4">Fresa para galces Z4</h4>
            <p>Es la opción todoterreno. Al tener los cortes paralelos al eje, ofrece una gran capacidad de evacuación de viruta y es muy sencilla de reafilar.</p>
            <!-- Imagen F14 clicable -->
            <div class="cursor-zoom-in overflow-hidden rounded-lg shadow-lg hover:opacity-90 transition mb-4" @click="abrirImagen('/images/fresas/f14.jpg')" >
              <img src="/images/fresas/f14.jpg" alt="Fresa cortes rectos F14" class="w-full h-64 object-cover" />
            </div>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/f14-fresa-para-galces-z4-cortes-rectos'" class="btn-mdi-dark">Ver Fresa F14</button>
            </div>
          </div>
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">F15: Cortes Alternos</h3>
            <h4 class="text-[#003399] text-xl md:text-m font-semibold text-center mb-4">Fresa para galces Z4 Axial</h4>
            <p>Sus cuchillas están inclinadas alternativamente. Esto crea un "efecto cizalla" que empuja la fibra hacia el centro del tablero, eliminando el astillado superficial.</p>
            <!-- Imagen F15 clicable -->
            <div class="flex justify-center cursor-zoom-in overflow-hidden rounded-lg hover:opacity-90 transition mb-4" @click="abrirImagen('/images/fresas/f15.jpg')" >
              <img src="/images/fresas/f15.jpg" alt="Fresa cortes alternos F15" class="h-64 object-contain" />
            </div>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/f15-fresa-para-mecanizar-galces-z4-axiales-alternos'" class="btn-mdi-dark">Ver fresa F15</button>
            </div>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. El siguiente nivel: El sistema V4 (Precortadores)</h2>
        <p>Si trabajas con materiales extremadamente delicados como melaminas de alta densidad o rechapados finos, ni siquiera el corte alterno es suficiente. Aquí es donde entra la ingeniería de precisión de la serie F16:</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Fresa para galces Z4 + V4</h3>
            <p>Esta Serie F16 combina la potencia de sus 4 cortes principales con 4 precortadores laterales (V4). Estos "cuchillos" realizan un corte previo en la fibra antes de que el diente principal retire el material, garantizando un ángulo de 90° perfecto y sin una sola mota de astillado.</p>
            <!-- Imagen F16 clicable -->
            <div
              class="flex justify-center cursor-zoom-in overflow-hidden rounded-lg hover:opacity-90 transition mb-4"
              @click="abrirImagen('/images/fresas/f16.jpg')"
            >
              <img src="/images/fresas/f16.jpg" alt="Fresa cortes rectos F16" class="h-64 object-contain" />
            </div>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/f16-fresa-para-galces-z4-v4'" class="btn-mdi-dark">Comprar F16 con Precortadores</button>
            </div>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Resumen Técnico para la Toma de Decisión</h2>
        <p>¿Qué modelo encaja mejor con tu producción actual? Aquí tienes la comparativa directa:</p>
        <div class="w-full overflow-hidden border border-red-600 rounded-sm shadow-sm table-container">
          <table class="w-full border-collapse bg-white table-fixed">
            <thead>
              <tr class="bg-[#003399] text-white">
                <th class="w-[25%] text-center">Modelo</th>
                <th class="w-[25%] text-center">Tipo de Corte</th>
                <th class="w-[25%] text-center">Ventaja Principal</th>
                <th class="w-[25%] text-center">Material Ideal</th>
              </tr>
            </thead>
            <tbody class="text-gray-600">
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">F14</td>
                <td class="text-justify text-gray-500">Recto (Z4)</td>
                <td class="text-justify">Económica y robusta</td>
                <td class="text-justify">Madera maciza</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">F15</td>
                <td class="text-justify text-gray-500">Alterno (Z4).</td>
                <td class="text-justify">Acabado suave, menos ruido</td>
                <td class="text-justify">Tableros y DM.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">F16</td>
                <td class="text-justify text-gray-500">Z4 + V4</td>
                <td class="text-justify">Acabado espejo sin astillas.</td>
                <td class="text-justify">Melaminas y Rechapados</td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">4. Recomendaciones de Mecanizado</h2>
        <p>Para maximizar la vida útil de tus fresas para mecanizar galces, asegúrate de trabajar con un avance constante. La F15 de cortes alternos requiere un ajuste preciso para aprovechar su ángulo de ataque, mientras que la F16 te permitirá trabajar en materiales que antes considerabas "imposibles" de mecanizar sin repasar.</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-2xl md:text-2xl font-semibold text-center mb-4">Equipa tu taller con lo mejor</h3>
            <p class="bf text-gray-600 text-l md:text-base text-justify leading-relaxed">En HECOMA somos especialistas en herramientas de alto rendimiento para el profesional de la madera.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/fresas'" class="btn-mdi-dark">Compre sus fresas para galces ahora</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Divs --*/
  .custom-card { font-size: 16px; background-color: #f0f4f8; }
  @media (max-width: 768px) { .custom-card { font-size: 13px; width: 100%; } }
  h3 { letter-spacing: -0.01em; line-height: 1.2; }
  /* -- fin divs --*/

  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; text-align: justify; }
  
  .table-container { font-size: 16px; }
  thead { background-color: blue; }
  @media (max-width: 768px) { thead { font-size: 10px; } tbody { font-size: 10px; } }
  table { border-collapse: collapse; table-layout: fixed; width: 100%; border: 1px solid red; }
  th { padding-top: 2%; padding-bottom: 2%; font-size: 1em; font-weight: bold; text-transform: uppercase; line-height: 1.2; vertical-align: middle; border: 1px solid red; }
  td { padding: 3%; font-size: 0.8em; line-height: 1.3; word-wrap: break-word; overflow-wrap: break-word; vertical-align: middle; border: 1px solid red; }
  @media (min-width: 768px) { th, td { padding-top: 2%; padding-bottom: 2%; } }
  td:first-child { letter-spacing: -0.01em; }

  /* --- Boton ---*/
  .btn-mdi-dark { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 2px; transition: all 0.3s ease; padding: 1rem 3rem; font-size: 16px; width: auto; letter-spacing: 0.05em; }
  .btn-mdi-dark:hover { background-color: #002266; transform: translateY(-1px); }
  @media (max-width: 768px) { .btn-mdi-dark { font-size: 13px; padding: 0.9rem 1.5rem; width: 100%; } }
  .bf { text-align: center; }
  /* --- fin Boton ---*/

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

  /* Contenedor de la imagen para que no toque los bordes */
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