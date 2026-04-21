<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="NUESTROS VALORES | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">
          Valores y Compromiso Técnico en la Fabricación de Herramientas
        </h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg text-justify">
        <p>En HECOMA, nuestros valores se han construido a lo largo de más de 20 años de trayectoria, desde nuestra creación en 1999. Son el resultado de la experiencia acumulada, del trabajo constante y de una forma de entender cada proyecto basada en la calidad, la responsabilidad y el compromiso con nuestros clientes.</p>
        <p>Estos valores guían nuestra manera de trabajar y están presentes en cada decisión, proceso y servicio que ofrecemos. Creemos en una relación profesional basada en la confianza, la transparencia y el rigor técnico, orientada siempre a ofrecer soluciones eficientes y duraderas.</p>
        <p>La implicación con cada proyecto, el respeto por nuestro trabajo y la búsqueda constante de la excelencia nos permiten mantener relaciones a largo plazo con clientes y colaboradores. En HECOMA, nuestros valores no son solo una declaración de intenciones, sino el fundamento sobre el que seguimos creciendo y evolucionando como empresa.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6 uppercase">Compromiso con la Calidad y la Precisión Industrial</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-6">
          <div class="rounded-lg overflow-hidden shadow-md">
            <img src="/images/valores/hecoma-unero.jpg" alt="Fresa Uñero" class="w-full h-auto object-cover" />
          </div>
          <div>
            <div class="space-y-6 text-gray-700 leading-relaxed text-lg text-justify">
              <p>Durante nuestros más de 20 años de trayectoria, la calidad ha sido uno de los pilares fundamentales de HECOMA. Cada proyecto se aborda con un alto nivel de exigencia, cuidando cada detalle del proceso y aplicando criterios técnicos que garanticen soluciones eficientes, fiables y duraderas.</p>
              <p>Nuestro compromiso con la calidad se refleja en la forma en la que planificamos, desarrollamos y ejecutamos cada trabajo, independientemente de su complejidad. La atención al detalle, la selección de procesos adecuados y el control continuo nos permiten mantener estándares elevados en todos nuestros servicios.</p>
            </div>
          </div>
        </div>
        <p class="space-y-6 text-gray-700 leading-relaxed text-lg text-justify">Esta forma de trabajar nos ha permitido consolidar la confianza de nuestros clientes y construir relaciones profesionales a largo plazo, basadas en resultados, fiabilidad y una clara orientación a la excelencia. En HECOMA, la calidad no es un objetivo puntual, sino un compromiso constante.</p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6 uppercase">Mejora Continua e Innovación en Tecnología de Corte CNC</h2>
        <div class="space-y-6 text-gray-700 leading-relaxed text-lg text-justify">
          <p>En HECOMA, entendemos la mejora continua no solo como un objetivo, sino como el motor fundamental de nuestra diferenciación en el mercado de la herramienta industrial. Nuestro compromiso se traduce en una evolución constante de los procesos de fabricación, la actualización permanente de nuestro equipo técnico y la integración de tecnologías de última generación en nuestras plantas de Toledo y Córdoba. Esta filosofía nos permite desarrollar soluciones de corte cada vez más eficientes, precisas y duraderas, optimizando el rendimiento de materiales exigentes como el diamante y el metal duro.</p>
          <p>Apostar por la innovación tecnológica y la Industria 4.0 nos permite ofrecer un valor añadido real: mayor vida útil de la herramienta y una reducción significativa de los tiempos de parada en las líneas de producción de nuestros clientes. Para nosotros, innovar significa anticiparnos a las necesidades de la carpintería industrial y el mecanizado de tableros, reforzando nuestro compromiso con la eficiencia operativa, la fiabilidad técnica y la sostenibilidad. En HECOMA, evolucionamos cada día para consolidarnos como el partner estratégico, sólido y competitivo que su fábrica necesita para liderar el sector..</p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row gap-12 items-center">
          <div class="md:w-1/2">
            <h2 class="text-[#010cf7] text-3xl font-bold mb-6 uppercase">Trabajo en equipo</h2>
            <div class="space-y-6 text-gray-700 leading-relaxed text-lg text-justify">
              <p>El trabajo en equipo ha sido un pilar fundamental en la evolución de HECOMA desde sus inicios. Creemos firmemente que los mejores resultados nacen de la colaboración entre profesionales, del intercambio de conocimiento y de la implicación de cada persona que forma parte del proyecto.</p>
              <p>En HECOMA fomentamos un entorno basado en el respeto, la responsabilidad y la comunicación, donde cada miembro del equipo aporta su experiencia y visión para afrontar los retos con una perspectiva global. Esta forma de trabajar nos permite analizar cada proyecto de manera integral y ofrecer soluciones eficientes, coherentes y orientadas a resultados.</p>
            </div>
          </div>
          <div class="md:w-1/2">
            <div class="rounded-lg overflow-hidden shadow-lg border-4 border-gray-100">
              <img src="/images/valores/hecoma-equipo.jpg" alt="Equipo HECOMA" class="w-full h-auto" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  p {
    line-height: 1.8;
  }
  h2 {
    letter-spacing: 0.025em;
  }
</style>