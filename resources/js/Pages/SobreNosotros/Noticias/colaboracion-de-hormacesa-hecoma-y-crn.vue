<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Colaboración de HORMACESA y HECOMA y el CRN | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">La colaboración de HORMACESA y HECOMA y el CRN dan presencia a un poema de Vicente Aleixandre, en la Alcazaba de Málaga</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/AlcazabaMalaga_3.jpg" alt="Alcazaba Malaga">
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">HORMACESA, HECOMA® y el CRN Producción, colaboran para decorar la Alcazaba de Málaga con un poema del nobel Vicente Aleixandre.</h2>
        <p>La colaboración con la empresa construcciones HORMACESA, en el proyecto del Ayuntamiento de Málaga para la reforma del pasaje Pintor Nogales y para el acondicionamiento del muro de la rampa de acceso al conjunto monumental de la Alcazaba de Málaga, el Centro de Referencia Nacional (CRN) Producción, Carpintería y Mueble se ha grabado los paneles de recubrimiento del muro del monumento. Esos paneles resistentes a la intemperie se han grabado con  poema «Ciudad del paraíso» del Premio Nobel Vicente Aleixandre.</p>
        <p>HORMACESA se puso en contacto con el Centro de Referencia Nacional Producción, Carpintería y Mueble, tras la imposibilidad de encontrar empresas capaces de realizar el proyecto. El CRN de Encinas Reales (Córdoba), es referente en el mecanizado con control numérico (CNC) y estrecho colaborador de nuestra empresa. Tras realizar varias pruebas, con varios tipos de materiales,  se escoge un tablero fenólico específico por su capacidad para resistir inclemencias climáticas y la intemperie.</p>
        <p>El personal técnico del CRN, con el asesoramiento y los ingenieros de HECOMA, diseña una herramienta de corte específica, con superficie de corte en diamante PCD.  Imprescindible para desempeñar esta tarea con éxito ya el mejor acabado posible. HECOMA, con los planos resultantes, fabrica la herramienta en breve plazo y la entrega al CRN para realizar el trabajo.</p>
        <p>Partiendo de los planos y los archivos de CAD, se hizo la programación en control numérico del poema. Este está distribuido en 6 paneles de gran tamaño, en los que , individualmente,  se realizó el trabajo de grabado en el centro de mecanizado a control numérico de 5 ejes del CRN.</p>
        <p>El resultado final adorna el acceso a la Alcazaba de Málaga, monumento de imprescindible visita dentro del patrimonio de la ciudad de Málaga.</p>
        <p>Les dejamos, unas fotos de la máquina en nuestras instalaciones y un vídeo demostrativo de la operación de la máquina, que nos ha cedido el fabricante.</p>
        <div class="flex justify-center">
          <img src="/images/noticias/AlcazabaMalaga_3.jpg" alt="Alcazaba Malaga" width="100%">
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Servicios para Herramientas de corte de HECOMA®, rentabilidad para su negocio.</h2>
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