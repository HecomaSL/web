<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Nuestras Brocas Helicoidales | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Presentamos nuestras Fresas y Brocas MDI Helicoidales</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>En el mecanizado de paneles y maderas técnicas, la diferencia entre un borde astillado y un acabado perfecto radica en la herramienta. Nuestras brocas MDI helicoidales (Metal Duro Integral) son el estándar de oro para centros de trabajo CNC que exigen velocidad, evacuación eficiente de viruta y una vida útil prolongada en materiales abrasivos.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. ¿Por qué elegir Brocas MDI Helicoidales?</h2>
        <p>A diferencia de las brocas de acero rápido (HSS), las herramientas de Metal Duro Integral ofrecen una rigidez excepcional. Esto permite trabajar con parámetros de corte mucho más agresivos, reduciendo los tiempos de ciclo y garantizando que la desviación del agujero sea prácticamente nula, incluso en materiales de gran dureza.</p>
        <h3 class="text-[#010cf7] text-3xl font-bold mb-6 text-center"> Ventajas Técnicas</h3>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h4 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Acabados de Alta Calidad</h4>
            <p class="text-gray-600 text-sm md:text-base text-justify leading-relaxed"> Diseñadas específicamente para evitar el astillado en las caras del tablero. Gracias a su geometría helicoidal, la compresión del material durante el corte garantiza bordes suaves listos para el canteado o barnizado.</p>
          </div>
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h4 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Rendimiento en CNC</h4>
            <p class="text-gray-600 text-sm md:text-base text-justify leading-relaxed">Con ángulos de hélice optimizados para la extracción rápida de residuos, estas herramientas están preparadas para ciclos de trabajo intensos en pantógrafos CNC, manteniendo el filo mucho más tiempo que el acero rápido.</p>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. El Factor Clave: Geometría y Flujo de Viruta</h2>
        <p>En HECOMA seleccionamos las mejores calidades de microgramo para nuestras herramientas. La elección de la hélice (positiva o negativa) es determinante según el tipo de sujeción y el acabado deseado en la cara superior o inferior del panel:</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Especialistas en Tableros</h3>
            <p class="text-gray-600 text-sm md:text-base text-justify leading-relaxed"> Nuestras brocas MDI helicoidales están diseñadas para trabajar con maderas macizas, tableros de partículas, MDF, materiales fenólicos y plásticos técnicos, asegurando siempre una evacuación de viruta fluida para evitar el sobrecalentamiento.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/brocas-mdi'" class="btn-mdi-dark">Ver catalogo Brocas MDi</button>
            </div>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Comparativa Técnica: Selección según el Material</h2>
        <p>Utiliza esta tabla para identificar la herramienta ideal según el tipo de acabado y material que trabajes en tu taller:</p>
        <div class="w-full overflow-hidden border border-red-600 rounded-sm shadow-sm table-container">
          <table class="w-full border-collapse bg-white table-fixed">
            <thead>
              <tr class="bg-[#003399] text-white">
                <th class="w-[25%] text-center">Tipo de Herramienta MDI</th>
                <th class="w-[25%] text-center">Configuración Hélice</th>
                <th class="w-[25%] text-center">Material Recomendado</th>
                <th class="w-[25%] text-center">Resultado Principal</th>
              </tr>
            </thead>
            <tbody class="text-gray-600">
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Fresa de Acabado</td>
                <td class="text-justify text-gray-500">Positiva / Negativa</td>
                <td class="text-justify">Maderas, Acrílicos y PVC</td>
                <td class="text-justify italic">Borde pulido y corte sin rebabas.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Fresa de Desbaste</td>
                <td class="text-justify text-gray-500">Hélice Rompevirutas</td>
                <td class="text-justify">MDF, Aglomerado y Contrachapado</td>
                <td class="text-justify italic">Alta velocidad de avance y menor esfuerzo.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Punta de Bola</td>
                <td class="text-justify text-gray-500">Geometría Esférica</td>
                <td class="text-justify">Grabados 3D y Relieves</td>
                <td class="text-justify italic">Acabado curvo suave en tallados complejos.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Fresa Alucobond</td>
                <td class="text-justify text-gray-500">Especial Plegado</td>
                <td class="text-justify">Composite y Paneles Sándwich</td>
                <td class="text-justify italic">Ranurado en V preciso para doblado manual.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Optimiza tu producción con HECOMA</h3>
            <p class="bf text-center text-gray-600 text-sm md:text-base  leading-relaxed">Expertos en herramientas de corte profesionales para la industria de la madera.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/brocas-mdi'" class="btn-mdi-dark">Compra Brocas MDI ahora</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Divs --*/
  /* Control de fuentes similar a la tabla para consistencia */
  .custom-card { font-size: 16px; background-color: #f0f4f8; }
  @media (max-width: 768px) { .custom-card { font-size: 13px; width: 100%; } }

  /* Títulos con el azul corporativo de la imagen */
  h3 { letter-spacing: -0.01em; line-height: 1.2; }
  /* -- fin divs --*/

  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; text-align: justify; }
  
  .table-container { font-size: 16px; }
  thead { background-color: blue; }
  @media (max-width: 768px) {
    thead { font-size: 10px; }
    tbody { font-size: 10px; }
  }
  table { border-collapse: collapse; table-layout: fixed; width: 100%; border: 1px solid red; }
  th { padding-top: 2%; padding-bottom: 2%; font-size: 1em; font-weight: bold; text-transform: uppercase; line-height: 1.2; vertical-align: middle; border: 1px solid red; }
  td { padding: 3%;font-size: 0.8em; line-height: 1.3; word-wrap: break-word; overflow-wrap: break-word; vertical-align: middle; border: 1px solid red; }
  @media (min-width: 768px) { th, td { padding-top: 2%; padding-bottom: 2%; } }
  td:first-child { letter-spacing: -0.01em; }
  /* --- Boton ---*/
  .btn-mdi-dark { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 2px; transition: all 0.3s ease; padding: 1rem 3rem; font-size: 16px; width: auto; letter-spacing: 0.05em; }
  .btn-mdi-dark:hover { background-color: #002266; transform: translateY(-1px); }
  @media (max-width: 768px) { .btn-mdi-dark { font-size: 13px;  padding: 0.9rem 1.5rem; width: 100%; } }
  .bf { text-align: center;}
  /* --- fin Boton ---*/
</style>