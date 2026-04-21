<script setup>
import { ref } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
// Creamos la referencia para el contenedor
const carouselRef = ref(null);

const scrollCarousel = (direction) => {
  if (carouselRef.value) {
    const container = carouselRef.value;
    const scrollAmount = 300; // El desplazamiento por click
    const maxScroll = container.scrollWidth - container.clientWidth;

    if (direction === 'left') {
      // Si estamos al principio (o muy cerca) y damos a la izquierda, vamos al final
      if (container.scrollLeft <= 5) 
        container.scrollTo({ left: maxScroll, behavior: 'smooth' });
      else 
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      if (container.scrollLeft >= maxScroll - 5) 
        container.scrollTo({ left: 0, behavior: 'smooth' });
      else 
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
  }
};
</script>

<template>
  <Head title="Reparación de herramientas de corte | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Reparación de herramientas de corte con la máxima calidad</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/fresaz4_4usada.jpg" alt="Fresa usada">
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Reparación de herramientas de corte</h2>
        <p>Ahorra hasta un 25% reparando su herramienta de corte con HECOMA®. Misma calidad y duración que una herramienta nueva ahorrando costes y de forma mas sostenible para el medio ambiente.</p>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/fresa_galces_usada.jpg" alt="Fresa reparada" width="100%">
            <p>Fresa para labrar galces Z4+4 usada 2</p>
          </div>
          <div>
            <img src="/images/noticias/fresaz4_4usada.jpg" alt="Fresa reparada" width="100%">
            <p>Fresa para labrar galces Z4+4 usada</p>
          </div>
        </div>
        <p>En estas imágenes podemos apreciar esta herramienta con sus placas de corte en metal duro dañadas y al final de su vida por desgaste y después de varios afilados. Se trata de una fresa para labrar galces en Z4+4.</p>
        <p>En HECOMA® somos fabricantes y renovar su herramienta de corte a un estado igual o mejor que nueva, creemos que es una gran opción. Pero,  ¿qué ventajas obtiene el cliente con nuestro servicio de reparación de herramientas?:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal"><b>Ahorro de hasta un 25% en los costes.</b> El cliente no ha de desembolsar el coste de una nueva herramienta ya que la reparada iguala o incluso mejora el rendimiento de la herramienta en origen.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Mejora en la calidad y rendimiento de la herramienta de cuando era nueva.</b> La herramienta que reparamos, además de su renovación completa, pasa por estrictos controles de calidad que garantizan su precisión, equilibrado y acabado. Por lo que en la mayoría de las ocasiones, la herramienta funciona mejor, con menos vibraciones y consumo eléctrico en su maquinaria, que cuando era nueva.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Sostenibilidad.</b> Reutilizamos el cuerpo de la herramienta, con el consecuente ahorro en materiales y en energía para su fabricación.</span></li>
          <li><span class="text-gray-700 font-normal"><b>Reutilización.</b> Si las necesidades de fabricación han cambiado, la herramienta se puede remodelar durante la reparación para adaptarse a las nuevas necesidades del cliente.</span></li>
        </ul>
        <div class="flex justify-center imgytext">
          <div>
            <img src="/images/noticias/fresa_galces_1.jpg" alt="Fresa reparada" width="100%">
            <p>Fresa reparada</p>
          </div>
          <div>
            <img src="/images/noticias/fresa_galces_2.jpg" alt="Fresa reparada" >
            <p>Fresa reparada</p>
          </div>
          <div>
            <img src="/images/noticias/fresa_galces_1.jpg" alt="Fresa reparada" >
            <p>Fresa reparada</p>
          </div>
        </div>
        <p>Las imágenes mas arriba muestran el trabajo de reparación terminado.  La herramienta  ha seguido los siguientes pasos en su reparación:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Limpieza profunda con ultrasonidos y desengrasado</span></li>
          <li><span class="text-gray-700 font-normal">Retirada de las placas desgastadas</span></li>
          <li><span class="text-gray-700 font-normal">Revisión y Re mecanizado del cuerpo</span></li>
          <li><span class="text-gray-700 font-normal">Soldadura de nuevas placas de metal duro de la máxima calidad.  En HECOMA®  solo usamos placas de la mejor calidad y del fabricante de referencia en el sector. Garantizamos la mayor duración y rendimiento del mercado en su herramienta reparada</span></li>
          <li><span class="text-gray-700 font-normal">Inspección de cotas y re equilibrado de la herramienta</span></li>
          <li><span class="text-gray-700 font-normal">Repintado y  regrabado de nuevo de la identificación de la herramienta</span></li>
          <li><span class="text-gray-700 font-normal">Control de calidad final y embalaje en una de nuestras cajas de máxima protección</span></li>
        </ul>
        <p>En la galería final, podemos observar el estado original y el final con mas detalle y comparar. Estos resultados son posibles tanto para herramientas fabricadas por HECOMA, como para fabricadas por otras empresas, siempre que la calidad y estado del cuerpo de la herramienta de origen lo permitan.</p>
        
        <h2 class="text-[#010cf7] text-2xl md:text-3xl font-bold mb-6 text-center">Nuestra Gama de Herramientas</h2>
        <div class="carousel-wrapper w-full my-12 px-[5%]">
          <div class="relative group">
            <button class="carousel-arrow left-0" @click="scrollCarousel('left')"> &lt; </button>
            <button class="carousel-arrow right-0" @click="scrollCarousel('right')"> &gt; </button>
            
            <div ref="carouselRef" class="carousel-container px-2">
              <div class="carousel-item">
                <img src="/images/noticias/fresaz4_4usada.jpg" alt="Broca Helicoidal 1" class="rounded-lg shadow-md">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/fresa_galces_usada.jpg" alt="Broca Helicoidal 2" class="rounded-lg shadow-md">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/reparada3.jpg" alt="Broca Helicoidal 3" class="rounded-lg shadow-md">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/reparada2.jpg" alt="Broca Helicoidal 4" class="rounded-lg shadow-md">
              </div>
              <div class="carousel-item">
                <img src="/images/noticias/reparada1.jpg" alt="Broca Helicoidal 5" class="rounded-lg shadow-md">
              </div>
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
  td { padding: 3%;font-size: 0.8em; line-height: 1.3; word-wrap: break-word; overflow-wrap: break-word; vertical-align: middle; border: 1px solid red; }
  @media (min-width: 768px) { th, td { padding-top: 2%; padding-bottom: 2%; } }
  td:first-child { letter-spacing: -0.01em; }

  /* --- Boton ---*/
  .btn-mdi-dark { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 2px; transition: all 0.3s ease; padding: 1rem 3rem; font-size: 16px; width: auto; letter-spacing: 0.05em; }
  .btn-mdi-dark:hover { background-color: #002266; transform: translateY(-1px); }
  @media (max-width: 768px) { .btn-mdi-dark { font-size: 13px;  padding: 0.9rem 1.5rem; width: 100%; } }
  .bf { text-align: center; }
  /* --- fin Boton ---*/

  /* --- Video ---*/
  .video-container { position: relative; width: 100%; max-width: 100%; padding-bottom: 56.25%; height: 0; }
  /* El iframe ocupa todo el espacio del contenedor */
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  @media (max-width: 768px) { .video-container { max-width: 100%; } }
  /* --- Fin Video ---*/
  .imgytext p { text-align: center; }
  .imgytext img { height: 350px; width: 350px; }
  .imgytext { margin: 1%; }
</style>

<style scoped>
  /* ========================================= */
  /* --- CARRUSEL CON FLECHAS (NUEVO/UNIFICADO) --- */
  /* ========================================= */
  .carousel-container { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth; gap: 4%; padding-bottom: 1rem; padding-top: 1rem; }
  /* Ocultar barra de scroll pero mantener funcionalidad */
  .carousel-container::-webkit-scrollbar { display: none; }
  .carousel-item { flex: 0 0 85%; scroll-snap-align: center; text-align: center; transition: transform 0.3s ease; }
  .carousel-item img { width: 100%; height: auto; aspect-ratio: 4 / 3; object-fit: cover; }

  /* --- ESTILOS DE LAS FLECHAS --- */
  .carousel-arrow { position: absolute; top: 50%; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; cursor: pointer; font-size: 1.5rem; padding: 0.8rem 1.2rem; z-index: 10; border-radius: 50%; transition: background-color 0.3s ease, opacity 0.3s ease; opacity: 0; }
  /* Mostrar flechas al hacer hover sobre el contenedor en PC */
  .group:hover .carousel-arrow { opacity: 1; }
  .carousel-arrow:hover { background-color: rgba(0, 0, 0, 0.8); }
  /* Ajustes para Desktop (Flechas) */
  @media (min-width: 768px) { .carousel-item { flex: 0 0 30.6%; }
    .carousel-arrow { font-size: 2rem; padding: 1rem 1.5rem; }
    .carousel-arrow.left-0 { left: 1rem; }
    .carousel-arrow.right-0 { right: 1rem; }
  }
  /* Ajustes para Móvil (Ocultar flechas) */
  @media (max-width: 768px) { .carousel-item p { font-size: 13px; } .carousel-arrow { display: none; } }
</style>