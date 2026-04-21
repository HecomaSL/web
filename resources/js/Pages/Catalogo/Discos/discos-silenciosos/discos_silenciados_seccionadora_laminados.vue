<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 11.3 Discos silenciosos para seccionadora, laminados y bilaminados - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 11.3 Discos silenciosos para seccionadora, laminados y bilaminados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Especializada en el tratamiento de superficies delicadas, la Serie 11.3 ofrece una solución avanzada en discos silenciosos para máquinas seccionadoras, optimizados específicamente para el corte de tableros laminados y bilaminados.</p>
          <p>Esta serie incorpora la tecnología de amortiguación de HECOMA®, diseñada para neutralizar las vibraciones de alta frecuencia que suelen causar el astillado en los recubrimientos melamínicos y sintéticos. Al estabilizar el cuerpo del disco durante el avance industrial, se garantiza un acabado impecable y aristas vivas en ambas caras del tablero, minimizando el desperdicio de material.</p>
          <p>Gracias a su diseño silenciado, no solo se incrementa el confort acústico en las líneas de producción intensiva, sino que se logra una máxima durabilidad del filo al reducir la fricción térmica. Es la herramienta técnica indispensable para el seccionado de precisión donde se requiere la combinación perfecta entre un entorno de trabajo saludable y una calidad de acabado de alto nivel.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Disco silenciado para disminuir el ruido y mejorar la estabilidad en seccionadora.</span></li>
          <li><span class="text-gray-700 font-normal">Recomendado para el corte de laminados y bilaminados, optimizando la calidad del canto y reduciendo el riesgo de astillado</span></li>
          <li><span class="text-gray-700 font-normal">Geometría de diente orientada a un acabado superior en superficies decorativas y piezas vistas</span></li>
          <li><span class="text-gray-700 font-normal">Alta precisión y repetitividad en cortes rectos, ideal para trabajos en serie y fabricación de mobiliario</span></li>
          <li><span class="text-gray-700 font-normal">Configuración disponible en PTS (no PT), para adaptarse a distintas necesidades de corte y acabado</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Medidas disponibles</h2>        
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  .img { display: flex; justify-content: center; }
</style>