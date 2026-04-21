<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 3.1 Incisores para escuadradora - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 3.1 Incisores para escuadradora.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Incisores, ponemos a su disposición la Serie 3.1, diseñada específicamente para su uso en máquinas escuadradoras. Estos incisores son la solución técnica ideal para mejorar drásticamente la calidad del corte en paneles y tableros. Su función principal es realizar un pre-corte preciso que evita el astillado en la cara inferior del material, asegurando un acabado limpio y profesional.</p>
          <p>La excelencia técnica radica en su capacidad para trabajar en perfecta sincronía con la sierra principal, permitiendo un ajuste micrométrico que garantiza la coincidencia exacta de las líneas de corte. Fabricados con carburo de tungsteno de grano ultrafino, estos incisores mantienen un afilado agresivo y duradero, fundamental para seccionar las fibras del recubrimiento antes de que el disco de corte principal atraviese el tablero.</p>
          <p>Al implementar esta serie en su flujo de trabajo, reducirá drásticamente el desperdicio de material y los costes operativos, logrando una arista viva y libre de imperfecciones incluso en los laminados más quebradizos o de alto brillo.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
          <p>Gracias a la ingeniería de HECOMA®, esta serie es especialmente efectiva en materiales revestidos y superficies decorativas (como melaminas o laminados), donde la integridad estética de ambas caras es fundamental para un ensamblaje de alta calidad.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Incisor específico para escuadradora, optimizado para el pre-corte del material</span></li>
            <li><span class="text-gray-700 font-normal">Mejora notable de la calidad del canto, reduciendo desconchados y defectos en el corte</span></li>
            <li><span class="text-gray-700 font-normal">Diseñados para ofrecer un corte preciso y estable en trabajos continuos</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para el mecanizado de tableros revestidos, melaminas y otros paneles decorativos.</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para aplicaciones profesionales donde se requiere un acabado limpio y de alta calidad.</span></li>
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