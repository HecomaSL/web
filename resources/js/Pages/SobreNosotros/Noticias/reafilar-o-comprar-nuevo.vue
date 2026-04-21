<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="¿Reafilar o comprar nuevo? | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">¿Reafilar o comprar nuevo? Cómo saber cuándo tu herramienta ha llegado al límite</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>Para un jefe de taller, la eficiencia se mide en la calidad del corte y en la seguridad de sus operarios. Sin embargo, estirar la vida útil de un disco o una fresa más allá de lo técnicamente aconsejable puede salir muy caro. El Metal Duro (MD) es un material excepcional, pero no es eterno. Saber identificar el punto de no retorno es clave para evitar accidentes y paradas no programadas.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. El límite del Metal Duro: La regla del diente pequeño</h2>
        <p>Cada vez que una herramienta pasa por el proceso de afilado, retiramos una pequeña capa de material para recuperar el filo. El problema surge cuando, tras múltiples afilados, el volumen del diente de carburo se reduce drásticamente:</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Riesgo de Rotura</h3>
            <p>Un diente demasiado pequeño tiene menos superficie de soldadura al cuerpo de la herramienta. Bajo altas presiones de avance, el diente puede desprenderse, convirtiéndose en un proyectil a alta velocidad.</p>
          </div>
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-xl md:text-2xl font-semibold text-center mb-4">Pérdida de Geometría</h3>
            <p>Al reducirse el tamaño, los ángulos de corte originales cambian. La herramienta ya no "muerde" igual, aumenta la fricción, se genera más calor y el acabado del tablero comienza a quemarse.</p>
          </div>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. Tecnología de Vanguardia: Afilado por Electroerosión CNC</h2>
        <p>En HECOMA no solo afilamos; garantizamos que la herramienta mantiene sus propiedades estructurales. El método convencional de fricción puede generar estrés térmico en el metal duro si no se controla perfectamente.</p>
        
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Checklist: ¿Como saber si es hora de jubilar tu herramienta?</h2>
        <p>Antes de enviarnos tu próximo lote de afilado, verifica estos 4 puntos críticos en tus discos y fresas:</p>
        <div class="w-full overflow-hidden border border-red-600 rounded-sm shadow-sm table-container">
          <table class="w-full border-collapse bg-white table-fixed">
            <thead>
              <tr class="bg-[#003399] text-white">
                <th class="w-[33%] text-center">Punto de Control</th>
                <th class="w-[33%] text-center">Estado Crítico</th>
                <th class="w-[33%] text-center">Acción Recomendada</th>
              </tr>
            </thead>
            <tbody class="text-gray-600">
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Tamaño del diente</td>
                <td class="text-justify text-gray-500">Menos de 1/3 del tamaño original.</td>
                <td class="text-justify">Sustitución inmediata.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Cuerpo del disco</td>
                <td class="text-justify text-gray-500">Presencia de grietas o color azulado (quemado).</td>
                <td class="text-justify">Retirar de producción.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Soldadura</td>
                <td class="text-justify text-gray-500">Signos de corrosión o desprendimiento.</td>
                <td class="text-justify">Reparación o descarte.</td>
              </tr>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="font-bold text-[#003399]">Rendimiento</td>
                <td class="text-justify text-gray-500">Vibraciones excesivas o ruido anormal.</td>
                <td class="text-justify">Revisión técnica en HECOMA</td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">4. La importancia de un diagnóstico experto</h2>
        <p>Un operario puede tener buen ojo, pero solo un centro de afilado especializado puede certificar la seguridad de una herramienta fatigada. En nuestro servicio de Mantenimiento Preventivo, si detectamos que un disco ya no es apto para un reafilado seguro, te asesoramos para la reposición por una herramienta nueva de alto rendimiento, evitando riesgos innecesarios en tu taller.</p>
        <div class="flex flex-col md:flex-row gap-6 w-full ">
          <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-sm p-6 md:p-8 custom-card">
            <h3 class="text-[#003399] text-2xl md:text-2xl font-semibold text-center mb-4">Tu seguridad es nuestra prioridad</h3>
            <p class="bf text-gray-600 text-l md:text-base text-justify leading-relaxed">Optimiza tus costes y protege a tu equipo con nuestro servicio de afilado CNC de última generación.</p>
            <div class="flex justify-center">
              <button type="button" onclick="window.location.href='https://afilado.hecoma.com'" class="btn-mdi-dark">Pide afilado ahora</button>
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