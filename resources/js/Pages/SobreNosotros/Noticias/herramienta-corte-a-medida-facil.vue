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
  <Head title="Mira que fácil y rápido puedes obtener tu herramienta de corte a medida | HECOMA" />

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
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Mira que fácil y rápido puedes obtener tu herramienta de corte a medida con HECOMA®.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/conjunto.jpg" alt="Conjunto">
        </div>
        <p>En este artículo te explicamos cómo puedes conseguir la herramienta especial a medida que necesitas para realizar ese trabajo especial de carpintería tal y como te hace falta. Paso a paso, es muy fácil, y rápido.</p>

        <!-- imgytext 1 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_mango.jpg')">
            <img src="/images/noticias/fresa_mango.jpg" alt="Fresas de mango" class="hover:opacity-90 transition" />
            <p>Fresas de mango con cuchillas<br>perfiladas a medida</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/conjunto_a_medida.jpg')">
            <img src="/images/noticias/conjunto_a_medida.jpg" alt="Conjunto a medida" class="hover:opacity-90 transition" />
            <p>Conjunto a medida</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_mango_a_medida.jpg')">
            <img src="/images/noticias/fresa_mango_a_medida.jpg" alt="Fresa de mango especial a medida" class="hover:opacity-90 transition" />
            <p>Fresa de mango especial a medida</p>
          </div>
        </div>

        <h2 class="text-center text-[#010cf7] text-3xl font-bold">Visita de nuestro comercial al cliente</h2>
        <p>Fabricamos a diario y a medida, fresas, brocas, cuchillas perfiladas, trituradores, herramientas de soft formado, pre formado y post formado, etc. Fabricamos tanto en metal duro como en diamante (PCD).  Utilizamos sólo materias primas de mejor calidad, procedentes de los primeros fabricantes a nivel mundial.</p>
        <p>Si eres cliente habitual, sólo tienes que llamar a tu comercial de zona HECOMA®. Este/esta se desplazará a tu empresa si es necesario. Con tus indicaciones elaborará un plano previo de lo que necesitas hacer. Si quieres, también le puedes dejar una muestra del material y/o trabajo a realizar.</p>
        <p>Si eres un nuevo cliente, ¡Bienvenido! <a href="https://hecoma.com/herramienta-corte-a-medida-facil/#:~:text=Si%20eres%20un%20nuevo%20cliente%2C%20%C2%A1Bienvenido!%20Ll%C3%A1manos%20o%20escribe%20a%C2%A0pedidos%40hecoma.com%C2%A0y%20en%20breve%20el/la%20comercial%20de%20tu%20zona%20te%20visitar%C3%A1%20o%20contactar%C3%A1%20para%20realizar%20el%20trabajo%20que%20necesites.">Llámanos</a> o escribe a <a href="mailto:pedidos@hecoma.com">pedidos@hecoma.com</a> y en breve el/la comercial de tu zona te visitará o contactará para realizar el trabajo que necesites.</p>

        <!-- imgytext 2 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/boceto_trabajo_especial.jpg')">
            <img src="/images/noticias/boceto_trabajo_especial.jpg" alt="Boceto trabajo especial" class="hover:opacity-90 transition" />
            <p>Boceto del trabajo especial<br>a realizar</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/dibujo_con_cliente.jpg')">
            <img src="/images/noticias/dibujo_con_cliente.jpg" alt="Dibujo con el cliente del trabajo especial a realizar" class="hover:opacity-90 transition" />
            <p>Dibujo con el cliente del<br>trabajo especial a realizar</p>
          </div>
        </div>

        <h2 class="text-center text-[#010cf7] text-3xl font-bold">Diseño informatizado y detallado</h2>
        <p>Tras la visita, nuestro técnico comercial transmite los requisitos a nuestro departamento de diseño de herramientas. En él, con lo último en herramientas CAD/CAM, nuestros ingenieros estudian y elaboran una propuesta de la herramienta para realizar el trabajo a medida que nos pides.</p>

        <!-- imgytext 3 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/diseno_cad_1.jpg')">
            <img src="/images/noticias/diseno_cad_1.jpg" alt="herramientas CAD/CAM" class="hover:opacity-90 transition" />
            <p>Diseño con herramientas<br>CAD/CAM</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/diseno_cad_2.jpg')">
            <img src="/images/noticias/diseno_cad_2.jpg" alt="herramientas CAD/CAM" class="hover:opacity-90 transition" />
            <p>Diseño con herramientas<br>CAD/CAM</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/trabajo_a_medida.jpg')">
            <img src="/images/noticias/trabajo_a_medida.jpg" alt="Trabajo a medida" class="hover:opacity-90 transition" />
            <p>Trabajo a medida que<br>desea el cliente</p>
          </div>
        </div>

        <h2 class="text-center text-[#010cf7] text-3xl font-bold">Fabricación de alta precisión</h2>
        <p>En cuanto nos confirmes que todo está correcto, el diseño se transmite a nuestras máquinas CNC de última generación, y ¡En marcha!.</p>
        <p>Somos fabricantes, las herramientas las hacemos nosotros, y nuestros técnicos e ingenieros están trabajando "codo con codo". Todo son ventajas para ti:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">La herramienta es fabricada tal y como se diseñó</span></li>
          <li><span class="text-gray-700 font-normal">Con precisión hasta la centésima</span></li>
          <li><span class="text-gray-700 font-normal">Y supervisada por nuestros ingenieros tanto en la fabricación como en el control de calidad</span></li>
        </ul>

        <!-- imgytext 4 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/perfilado_cnc.jpg')">
            <img src="/images/noticias/perfilado_cnc.jpg" alt="Perfilado CNC" class="hover:opacity-90 transition" />
            <p>Perfilado CNC</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/torneado_cnc.jpg')">
            <img src="/images/noticias/torneado_cnc.jpg" alt="Torneado CNC" class="hover:opacity-90 transition" />
            <p>Torneado CNC</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/mecanizado_cnc.jpg')">
            <img src="/images/noticias/mecanizado_cnc.jpg" alt="Mecanizado CNC" class="hover:opacity-90 transition" />
            <p>Mecanizado CNC</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/mecanizado_cnc_2.jpg')">
            <img src="/images/noticias/mecanizado_cnc_2.jpg" alt="Mecanizado CNC" class="hover:opacity-90 transition" />
            <p>Mecanizado CNC</p>
          </div>
        </div>

        <!-- imgytext 5 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_especial_medida.jpg')">
            <img src="/images/noticias/fresa_especial_medida.jpg" alt="Fresa especial a medida" class="hover:opacity-90 transition" />
            <p>Fresa especial a medida</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/fresa_especial_medida_2.jpg')">
            <img src="/images/noticias/fresa_especial_medida_2.jpg" alt="Fresa especial a medida" class="hover:opacity-90 transition" />
            <p>Fresa especial a medida</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/conjunto_especial_medida.jpg')">
            <img src="/images/noticias/conjunto_especial_medida.jpg" alt="Conjunto especial a medida" class="hover:opacity-90 transition" />
            <p>Conjunto especial a medida</p>
          </div>
        </div>

        <h2 class="text-center text-[#010cf7] text-3xl font-bold">Control de calidad, embalaje y envío</h2>
        <p>Tras el equilibrado y control final de calidad, se embala con nuestras cajas y protecciones especiales, para que viaje super protegida. La imagen es importante, pero lo es mas aún que la herramienta te llegue ¡intacta!.</p>
        <p>Tenemos acuerdos con varias compañías de transporte urgente, por tanto, si lo necesitas, la tienes en 24 horas en tu fábrica. O si lo prefieres, nuestro comercial de zona te la entrega en persona y te aconseja sobre su instalación, uso y mantenimiento.</p>
        <p>En pocos días, estás trabajando con tu herramienta a medida y haciendo el trabajo en madera que necesitas. Ya sabemos que tus clientes finales son cada vez mas exigentes con el diseño, los acabados y los plazos de entrega. Con HECOMA® les tendrás contentos, pues el acabado que te proporciona nuestra herramienta es el que necesitas y además te la fabricamos muy rápido.</p>

        <!-- imgytext 6 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/equilibrado_automatico.jpg')">
            <img src="/images/noticias/equilibrado_automatico.jpg" alt="Equilibrado automático de alta precisión" class="hover:opacity-90 transition" />
            <p>Equilibrado automático<br>de alta precisión</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/equilibrado_automatico_2.jpg')">
            <img src="/images/noticias/equilibrado_automatico_2.jpg" alt="Equilibrado automático de alta precisión" class="hover:opacity-90 transition" />
            <p>Equilibrado automático<br>de alta precisión</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/control_calidad.jpg')">
            <img src="/images/noticias/control_calidad.jpg" alt="Control de calidad" class="hover:opacity-90 transition" />
            <p>Control de calidad</p>
          </div>
        </div>

        <!-- imgytext 7 -->
        <div class="flex justify-center imgytext">
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/control_calidad_walter.jpg')">
            <img src="/images/noticias/control_calidad_walter.jpg" alt="Control de calidad Walter" class="hover:opacity-90 transition" />
            <p>Control de calidad Walter</p>
          </div>
          <div class="cursor-zoom-in" @click="abrirImagen('/images/noticias/grabado_laser.jpg')">
            <img src="/images/noticias/grabado_laser.jpg" alt="Grabado Laser" class="hover:opacity-90 transition" />
            <p>Grabado Laser</p>
          </div>
        </div>

        <h2 class="text-center text-[#010cf7] text-3xl font-bold">Mantenimiento</h2>
        <p>Por último, no olvides el mantenimiento correcto de tu herramienta. Este prolonga la vida útil de la herramienta y por tanto su rentabilidad. Con <a href="/afilado">nuestro servicio de afilado y mantenimiento</a> tendrás tu herramienta siempre en las mejores condiciones y siempre disponible. Quién mejor que el fabricante para tener tu herramienta especial siempre a punto, y como siempre en un plazo récord.</p>
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
  a { color: blue; }

  .imgytext p { text-align: center; }
  .imgytext img { height: 250px; width: 250px; padding: 1%; }
  .imgytext { padding: 1%; }

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