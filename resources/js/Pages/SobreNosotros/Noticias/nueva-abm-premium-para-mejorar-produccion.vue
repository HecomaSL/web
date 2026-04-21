<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Nueva ABM PREMIUM para mejorar nuestra producción | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Seguimos avanzando: nueva ABM PREMIUM para mejorar nuestra producción</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/robot-abm.jpg" alt="Robot abm">
        </div>
        <p>En nuestro compromiso constante con la innovación y la mejora continua, en HECOMA hemos incorporado recientemente a nuestra planta de Sonseca (Toledo) una nueva máquina de afilado y acabado de herramientas de corte: la ABM modelo PREMIUM.</p>
        <p>Esta incorporación supone un importante salto tecnológico en nuestra línea de producción, centrada en herramientas con superficies de corte en metal duro (Widia), utilizadas en procesos industriales de fabricación de muebles y derivados de la madera. Gracias a esta nueva máquina, mejoramos notablemente la precisión, velocidad y calidad de acabado, reduciendo al mismo tiempo la necesidad de manipulación manual y aumentando la seguridad de nuestros técnicos.</p>
        <p>Además del evidente salto en capacidad productiva –estimado en un 10% de aumento de unidades procesadas anualmente–, los beneficios más relevantes se reflejan en la calidad final de las herramientas, la agilidad en los plazos de entrega y el refuerzo de nuestro posicionamiento competitivo en un sector cada vez más exigente.</p>
        <p>Este avance ha sido posible gracias al apoyo recibido a través de un incentivo de la Junta de Comunidades de Castilla-La Mancha, cofinanciado en un 80% por el Fondo Europeo de Desarrollo Regional (FEDER), con una subvención de 63.711€.</p>
        <div class="flex justify-center">
          <h2 class="text-center text-[#010cf7] text-3xl font-bold">«Conseguir un tejido empresarial mas competitivo»</h2>
        </div>
        <p>Con esta nueva adquisición, seguimos apostando por la excelencia, la innovación y el servicio al cliente, valores que definen cada paso de nuestro recorrido. A continuación le presentamos unas imagenes de la máquina y algún vídeo de su funcionamiento:</p>
        <div class="flex justify-center">
          <img src="/images/noticias/robot-abm.jpg" alt="Robot abm">
        </div>
        <div class="flex justify-center">
          <div class="video-container shadow-xl rounded-lg overflow-hidden">
            <iframe src="https://www.youtube.com/embed/6LQhl4iDZfo" frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
        </div>
        <div class="flex justify-center">
          <img src="/images/noticias/SUBVENCION-FIE2023.jpg" alt="">
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
</style>