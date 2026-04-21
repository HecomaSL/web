<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="¿Qué material elegir para tus fresas? | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Fresas Metal Duro o Acero Rápido ¿Qué material elegir para tus fresas?</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>En el mundo del mecanizado, no existe la "mejor herramienta" en términos absolutos, sino la herramienta más adecuada para cada material. La duda entre elegir fresas de Metal Duro o Acero Rápido es una constante en el taller. Comprender la metalurgia de cada una es vital para optimizar tiempos de producción y, sobre todo, para garantizar la rentabilidad de cada proyecto.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. Rendimiento y durabilidad: Comparativa de materiales según el volumen de trabajo</h2>
        <p>La diferencia principal radica en la dureza y la elasticidad. Mientras que una ofrece resistencia al desgaste, la otra destaca por la tenacidad de su filo. Aquí tienes las dos opciones principales que fabricamos en HECOMA:</p>
        <h3 class="text-[#010cf7] text-3xl font-bold mb-6 text-center">Caracteristicas</h3>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h4 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Metal Duro: Ultra-Velocidad</h4>
            <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
              <li><span class="text-gray-700 font-normal">Productividad Extrema: Mecaniza a velocidades donde otros se funden</span></li>
              <li><span class="text-gray-700 font-normal">Filo de Diamante: Precisión quirúrgica en cada pasada</span></li>
              <li><span class="text-gray-700 font-normal">Acabado Espejo: Superficies perfectas que eliminan el pulido posterior</span></li>
            </ul>
          </div>
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h4 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">HSS: El Todoterreno</h4>
            <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
              <li><span class="text-gray-700 font-normal">Tenacidad de Hierro: Soporta impactos y vibraciones sin fracturas</span></li>
              <li><span class="text-gray-700 font-normal">Versatilidad Sin Límites: La solución ideal para geometrías complejas</span></li>
              <li><span class="text-gray-700 font-normal">Inversión Inteligente: El equilibrio perfecto entre costo y rendimiento</span></li>
            </ul>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. El factor clave: El acabado "espejo" en madera maciza</h2>
        <p>Si tu prioridad es el acabado visual en maderas naturales, el Acero Rápido tiene una ventaja técnica difícil de batir. Debido a su estructura molecular, permite un afilado con un radio de punta mucho más fino que el metal duro:</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Uso del Acero Rápido en maderas resinosas</h3>
            <p class="text-gray-600 text-sm md:text-base text-justify leading-relaxed">A diferencia del Metal Duro, que puede sufrir micro-roturas ante nudos o maderas con tensiones, las fresas de Acero Rápido absorben mejor los impactos. Esto las convierte en la herramienta predilecta para el artesano que trabaja pino, abeto o maderas macizas donde se requiere un lijado mínimo posterior.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/fresas'" class="btn-mdi-dark">Ver catalogo Fresas</button>
            </div>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Resumen Técnico para la Toma de Decisión</h2>
        <p>¿Qué material encaja mejor con tu carga de trabajo actual? Consulta esta tabla comparativa rápida:</p>
        <div class="w-full overflow-hidden border border-red-600 rounded-sm shadow-sm table-container">
          <table class="w-full border-collapse bg-white table-fixed">
            <thead>
              <tr class="bg-[#003399] text-white">
                <th class="w-[25%] text-center">Característica</th>
                <th class="w-[25%] text-center">Metal Duro</th>
                <th class="w-[25%] text-center">Acero Rápido</th>
                <th class="w-[25%] text-center">Aplicación Ideal</th>
              </tr>
            </thead>
            <tbody class="text-gray-600">
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Dureza</td>
                <td class="text-justify text-gray-500">Muy Alta</td>
                <td class="text-justify">Media-Alta</td>
                <td class="text-justify">Producción continua</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Tenacidad</td>
                <td class="text-justify text-gray-500">Baja (Frágil)</td>
                <td class="text-justify">Muy Alta</td>
                <td class="text-justify">Maderas con nudos.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Resistencia Calor</td>
                <td class="text-justify text-gray-500">Excelente</td>
                <td class="text-justify">Moderada</td>
                <td class="text-justify">Altas RPM en CNC</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Acabado Final</td>
                <td class="text-justify text-gray-500">Muy Bueno</td>
                <td class="text-justify">Excelente (muy bueno)</td>
                <td class="text-justify">Madera natural.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">4. Recomendaciones de Mantenimiento</h2>
        <p>Para maximizar la inversión en tus fresas de Metal Duro o Acero Rápido, el afilado es el factor determinante. En HECOMA recomendamos limpiar siempre los restos de resina antes de proceder al afilado. Recuerda que el Acero Rápido es más sensible al calor durante el reafilado; por ello, en nuestro centro técnico utilizamos procesos de refrigeración avanzada para no destemplar el acero y mantener la dureza del filo original.</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-2xl md:text-2xl font-semibold text-center mb-4">Expertos en herramientas de corte</h3>
            <p class="bf text-gray-600 text-l md:text-base text-justify leading-relaxed">Ya sea que necesites la durabilidad del metal duro o la finura del acero rápido, en HECOMA fabricamos la solución a tu medida.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='/fresas'" class="btn-mdi-dark">Compra Nuestras Fresas</button>
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

</style>