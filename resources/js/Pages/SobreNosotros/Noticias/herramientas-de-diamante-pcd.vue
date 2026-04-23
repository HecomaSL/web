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
  <Head title="Herramientas de Diamante (PCD) | HECOMA" />

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
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Herramientas de Diamante (PCD)<br>Entre 60 y 150 veces el rendimiento del MD</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/fresa_mango_a_medida.jpg" alt="Rendimiento Herramientas" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold text-center">Mejora el rendimiento con nuestras Herramientas de PCD</h2>
        <p>El diamante policristalino (PCD en sus siglas en Inglés), se postula como uno de los mejores materiales para elaborar las superficies de corte de herramientas para madera y derivados. En HECOMA®, desde casi nuestra fundación, conocemos las ventajas de este material, y por tanto nos especializamos en su mantenimiento y en la fabricación de herramientas utilizando este material. Conozcamos un poco mas de este.</p>
        <h2>¿Que es el PCD (diamante policristalino)?</h2>
        <p>El PCD, también llamado diamante sintético, es un material de corte fabricado a partir de diamante sintetizado industrialmente. Por su dureza y resistencia a la abrasión, es utilizado con éxito en el mecanizado y corte de madera (y derivados como aglomerados, DM, solid surface…) , plástico, metal, piedra, hormigón, etc</p>

        <!-- imgytext 1 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/afilado_electroerosion.jpg')">
            <img src="/images/noticias/afilado_electroerosion.jpg" alt="Afilado PCD Electro abrasión" class="hover:opacity-90 transition" />
            <p>Afilado PCD Electro abrasión</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_extensible_pcd.jpg')">
            <img src="/images/noticias/fresa_extensible_pcd.jpg" alt="Fresa extensible de PCD" class="hover:opacity-90 transition" />
            <p>Fresa extensible de PCD</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_mango_a_medida.jpg')">
            <img src="/images/noticias/fresa_mango_a_medida.jpg" alt="Fresa de eje PCD" class="hover:opacity-90 transition" />
            <p>Fresa de eje PCD</p>
          </div>
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold">Que ventajas nos aportan</h2>
        <p>Las herramientas fabricadas (sus superficies de corte) con este material:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Calidad de corte muy superior, obteniendo acabados de mucha calidad durante mas tiempo.</span></li>
          <li><span class="text-gray-700 font-normal">Rendimiento muy superior, por la duración del su filo se necesitan menos procesos de afilado. Con un mínimo de 60 veces mas rendimiento, y según trabajos y con el mantenimiento adecuado, hasta 200 veces la duración del la mejor aleación de metal duro.</span></li>
          <li><span class="text-gray-700 font-normal">Ideal para trabajar con los materiales mas abrasivos, ya que por su dureza no se desgasta como las aleaciones de metal duro</span></li>
          <li><span class="text-gray-700 font-normal">Mayor capacidad y velocidad de corte, debido a un filo muy efectivo y a que soporta temperaturas de trabajo mas elevadas</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold">Cuidados y mantenimiento</h2>
        <p>Como toda herramienta, necesita de unos cuidados y mantenimiento. A continuación os mostramos en detalle el proceso de mantenimiento que realizamos en HECOMA®, y como mantener la herramienta durante su uso en fábrica:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Medición/Comprobación de herramientas:</span></li>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">El primer paso es la medición mediante proyección, de los desperfectos y desgaste en las superficies de corte. La necesidad de precisión es muy alta, por lo que nuestras máquinas de medición usan proyección de imagen con gran ampliación. Nuestros técnicos visualizan todas las dimensiones de la herramienta a través de la carrera de desplazamiento de esta. Asistidos por un ordenador de mediciones, se calculan las necesidades de mantenimiento de la herramienta.</span></li>
          </ul>
          <div class="flex justify-center">
            <div class="video-container shadow-xl rounded-lg overflow-hidden">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/UG3Lmlb_CTw?si=QPm9fN7RER_lXLJl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <li><span class="text-gray-700 font-normal">Calibración automática del robot de afilado:</span></li>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Para determinar la posición y el tamaño de los filos de PCD en la herramienta, antes de cada procedimiento de afilado, se efectúa una medición automática de la pieza por parte del robot de afilado. Especificando únicamente un punto por filo, la maquina palpa por sí sola varios puntos en el filo en función del valor ajustado.</span></li>
          </ul>
          <div class="flex justify-center">
            <div class="video-container shadow-xl rounded-lg overflow-hidden">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/rAT9u8E4KcE?si=hliGy_8_OB4p4BTP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <li><span class="text-gray-700 font-normal">Procedimiento de afilado de herramientas de PCD:</span></li>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">El afilado de herramientas de PCD se realiza sin contacto con la muela. El procedimiento se denomina electroerosión. Este consiste en la generación de un arco eléctrico entre la superficie de PCD y la muela (que suele ser de una aleación de cobre) en un medio dieléctrico. Ambos, pieza y muela, han de ser por tanto, conductores eléctricos.</span></li>
            <li><span class="text-gray-700 font-normal">El arco eléctrico es el que arranca partículas de la superficie hasta conseguir la forma deseada.Existen tres tipos de procedimientos de erosión: la erosión por penetración, la erosión por hilo y la erosión por disco/rotación. En HECOMA®  usamos la erosión por hilo y la erosión por disco/rotación. Estas funcionan conforme al mismo principio obteniendo excelentes resultados en cuanto a precisión y calidad de superficie.</span></li>
          </ul>
          <div class="flex justify-center">
            <div class="video-container shadow-xl rounded-lg overflow-hidden">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/SWYJ06ULgiA?si=LPbrMJfQP4i0IFdH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <li><span class="text-gray-700 font-normal">Consejos de uso de la herramienta de PCD:</span></li>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Durante su uso en fábrica, hay que seguir una serie de medidas para proteger y mantener nuestra herramienta. Las superficies de corte son sensibles a golpes y requieren de una serie de cuidados:</span></li>
            <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
              <li><span class="text-gray-700 font-normal">Para evitar daños en las placas de PCD, hay que tener cuidado en su manipulación, evitando golpes contra elementos metálicos.</span></li>
              <li><span class="text-gray-700 font-normal">Controlar el estado de desgaste de las herramientas, las mellas, roturas o placas defectuosas. La mayoría de las máquinas de mecanizado cuentan con amperímetro, el cual nos muestra el consumo de la máquina trabajando. Valores de consumo altos indican posibles defectos de este tipo en la herramienta</span></li>
              <li><span class="text-gray-700 font-normal">El polvo, unido a las resinas , barnices y colas, pueden crear depósitos en la herramienta. Estos reducen la eficacia de corte, la capacidad de evacuación de virutas, o incluso provocan desequilibrio en la herramienta. Por estos motivos, es necesaria una limpieza periódica de la herramienta, usando productos indicados para este menester</span></li>
              <li><span class="text-gray-700 font-normal">Una aspiración insuficiente, y la acumulación de virutas resultante del trabajo, pueden provocar un desgaste adicional de las placas, e incluso roturas en estas</span></li>
              <li><span class="text-gray-700 font-normal">El correcto montaje, equilibrado y estado del eje, también son fundamentales para evitar daños. Para ello es conveniente revisar estos y usar solamente bujes, anillos separadores y portaherramientas calibrados y en perfectas condiciones</span></li>
              <li><span class="text-gray-700 font-normal">Una vez montada la herramienta, comprobar que la velocidad, avance y el sentido de rotación sean los correctos</span></li>
            </ul>
          </ul>
          <li><span class="text-gray-700 font-normal">Cuando afilar las herramientas de PCD:</span></li>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Una serie de consejos para detectar cuando nuestra herramienta puede necesitar un mantenimiento. Este garantiza su larga vida y calidad de acabados:</span></li>
            <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
              <li><span class="text-gray-700 font-normal">Si la calidad de acabado en la superficie trabajada no es la adecuada</span></li>
              <li><span class="text-gray-700 font-normal">Si el desgaste de su fresa de moldura o fresa de ranurar, de la sierra circular de su escuadradora o seccionadora, presentan un pecho de placa igual o superior a  0,2 mm. , es indicado el afilado</span></li>
              <li><span class="text-gray-700 font-normal">Si el consumo de corriente del motor del eje es alto, y no hay roturas en las placas y estas están limpias, el filo de estas está agotado</span></li>
              <li><span class="text-gray-700 font-normal">Si alguna placa presenta astillado, es conveniente su sustitución o afilado</span></li>
            </ul>
          </ul>
        </ul>
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