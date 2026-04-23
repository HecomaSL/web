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
  <Head title="Obtén la máxima rentabilidad en su herramienta | HECOMA" />

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
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide"> Más del 60% de la producción mundial se usa para fabricar «Metal duro» para herramientas de corte. El Wolframio o Tungsteno</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/wolframio.jpg" alt="Wolframita de Portugal" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <p>El metal duro es la base de la mayoría de las herramientas que usamos para corte en la industria. Pero: ¿Qué es realmente el «Metal duro»? ¿De donde se obtiene? ¿Por que se usa?. Con este artículo os acercamos a este material y sus ventajas en el mecanizado de madera y derivados.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold ">¿Qué es el metal duro y qué se utiliza en las herramientas de corte?</h2>
        <p>El metal duro no es un metal en si ni una aleación de ellos. En realidad es un material compuesto o «Composite». Su elementos fundamentales son :</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Materiales cerámicos  o carburos, como el carburo de tungsteno, carburo de titanio, de tántalo o cromo</span></li>
          <li><span class="text-gray-700 font-normal">Metal aglomerante, generalmente cobalto, níquel y/o hierro</span></li>
        </ul>

        <!-- imgytext 1 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/wolframio_2.jpg')">
            <img src="/images/noticias/wolframio_2.jpg" alt="wolframio o tungsteno" class="hover:opacity-90 transition" />
            <p>wolframio o tungsteno</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/wolframio.jpg')">
            <img src="/images/noticias/wolframio.jpg" alt="Wolframita" class="hover:opacity-90 transition" />
            <p>Wolframita</p>
          </div>
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold">¿Cómo se obtiene?</h2>
        <p>Como ya he explicado no es una aleación, por tanto no se obtiene por fundición de los materiales que lo componen. Se obtiene por un proceso denominado Sinterización del carburo de tungsteno (Karl Heinrich Schroeter y Baumhauer 1923) dando como resultado lo que conocemos como «Metal duro» o Widia (Krupp Hartmetall 1926).</p>
        <p>La «Sinterización» es un proceso de fabricación de piezas sólidas moldeadas, consistente en compactar a alta presión varios polvos metálicos y/o cerámicas mezclados. Una vez compactadas, se realiza un tratamiento térmico a una temperatura inferior a la de fusión de la mezcla de materiales, obteniéndose una pieza consolidada y compacta. (fuente: wikipedia)</p>

        <!-- imgytext 2 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/polvo_tungsteno.jpg')">
            <img src="/images/noticias/polvo_tungsteno.jpg" alt="Polvo de tungsteno" class="hover:opacity-90 transition" />
            <p>Polvo de tungsteno</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/polvo_carburo_tungsteno.jpg')">
            <img src="/images/noticias/polvo_carburo_tungsteno.jpg" alt="Micro estructura de polvo de carburo de tungsteno" class="hover:opacity-90 transition" />
            <p>Micro estructura de polvo de<br>carburo de tungsteno</p>
          </div>
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold">¿Cómo se obtiene?</h2>
        <p>Las ventajas son muy variadas y no solo durante el uso de las herramientas. Desde su fabricación ya cuenta con enormes ventajas con respecto a otro tipo de materiales. Veamos algunas de ellas:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">El wolframio es el metal con el más alto punto de fusión (3.410 °C,  2870 °C en forma de carburo), con la mayor resistencia a tracción y con el coeficiente de dilatación térmica más bajo de todos los metales en estado puro. Por tanto tiene gran dureza, resistencia térmica y a la agresión química.</span></li>
          <li><span class="text-gray-700 font-normal">Usando la sinterización, aunamos ventajas de los materiales metálicos y cerámicos. La fundición de los mismos materiales no obtiene los mismos resultados de dureza y resistencia.</span></li>
          <li><span class="text-gray-700 font-normal">Se pueden generar formas complejas sin tener que mecanizar, por tanto sin material sobrante, con menor uso de energía y de tiempo de fabricación.</span></li>
          <li><span class="text-gray-700 font-normal">Las piezas obtenidas son porosas, por tanto: son mas ligeras, se pueden recubrir con mayor éxito y/o se le pueden añadir lubricantes en su fabricación.</span></li>
        </ul>
        <p>Su proceso de fabricación no genera desperdicios(vital con materiales caros y escasos como el wolframio) y  se hace a temperaturas mas bajas, con el consiguiente ahorro energético</p>
        <h2 class="text-[#010cf7] text-3xl font-bold">¿Por qué se usa para herramientas de corte?</h2>
        <p>Como resultado de las ventajas del material, las herramientas de corte fabricadas con «metal duro»:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Son muy resistentes a la abrasión, por tanto tienen mayor duración</span></li>
          <li><span class="text-gray-700 font-normal">Elevada dureza y resistencia a la compresión, lo que nos permite trabajar con materiales compuestos , laminados, poli-laminados, etc.</span></li>
          <li><span class="text-gray-700 font-normal">Soportan temperaturas más altas de trabajoque las herramientas de acero de alta velocidad (HSS), por tanto pueden trabajar a una velocidad muy superior.</span></li>
          <li><span class="text-gray-700 font-normal">Mantienen mejor el borde de corte afilado,  por tanto proporcionan un acabado mejor.</span></li>
        </ul>

        <!-- imgytext 3 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/F1711001.jpg')">
            <img src="/images/noticias/F1711001.jpg" alt="Polvo de tungsteno" class="hover:opacity-90 transition" />
            <p>F1711001.<br>Herramienta con superficies<br>de corte fabricadas en Metal duro.</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa-unero.jpg')">
            <img src="/images/noticias/fresa-unero.jpg" alt="Uñero con superficies de corte en MD" class="hover:opacity-90 transition" />
            <p>Uñero con superficies de corte en MD</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_mango.jpg')">
            <img src="/images/noticias/fresa_mango.jpg" alt="Fresa de eje con cuchillas intercambiables fabricadas en MD" class="hover:opacity-90 transition" />
            <p>Fresa de eje con cuchillas<br>intercambiables fabricadas en MD</p>
          </div>
        </div>

        <h2 class="text-[#010cf7] text-3xl font-bold">Calidades. ¿Cual es el mejor «metal duro» para las herramientas de corte para la madera?</h2>
        <p>Como en todo, existen calidades diferentes según su proceso de fabricación y los materiales empleados en ella.  Los componentes del «Metal Duro» son fabricados en procesos distintos y con requerimientos específicos. Se obtienen diferentes propiedades en función de la composición y aplicación buscada. Fundamentalmente, las calidades difieren según la matriz aglomerante, el porcentaje de los materiales y la granulometría.</p>
        <p>Con diferentes composiciones obtenemos el equilibrio entre dureza, resistencia al desgaste y tenacidad que hacen al «Metal Duro» tan eficaz. Como punto fundamental en la calidad, clasificamos el  MD según la granulometría de la materia prima, obteniéndose mejores prestaciones (dureza y resistencia al desgaste) cuanto mas fina sea esta:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Nanograno: partículas de carburo de diámetro inferior a  200 nm  (nanómetros o la mil millonésima parte de un metro) .</span></li>
          <li><span class="text-gray-700 font-normal">Grano ultrafino: partículas entre 200 y 500 nm</span></li>
          <li><span class="text-gray-700 font-normal">Micro grano: partículas de entre  0,5 y 1 µm (micras o la millonésima parte de un metro)</span></li>
          <li><span class="text-gray-700 font-normal">Grano fino: partículas de 1 a 1,3 µm</span></li>
          <li><span class="text-gray-700 font-normal">Grano medio: partículas de 1,3 a 2,5 µm</span></li>
          <li><span class="text-gray-700 font-normal">Grano grueso: partículas de 2,5 a 6,0 µm</span></li>
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