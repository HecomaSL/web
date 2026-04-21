<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 4.1 Discos para seccionadora - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 4.1 Discos para seccionadora.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos para seccionadora, ponemos a su disposición la Serie 4.1, formada por herramientas diseñadas específicamente para optimizar el rendimiento en máquinas seccionadoras. Estos discos están orientados a ofrecer un corte preciso, estable y con una alta calidad de acabado en el mecanizado de paneles de diversos tipos.</p>
          <p>El valor diferencial de los discos para seccionadora reside en su capacidad para mantener una trayectoria de corte rigurosamente recta incluso durante el seccionado de paquetes de tableros a altas velocidades de avance.</p>
          <p>Fabricados con un cuerpo de acero de alta densidad y ranuras de expansión compensadas térmicamente, estos discos minimizan el riesgo de deformación por calor, un factor crítico en ciclos de trabajo ininterrumpidos.</p>
          <p>Su diseño de diente específico para seccionado industrial garantiza una evacuación de viruta eficiente, evitando el recalentamiento de las caras del tablero y proporcionando un acabado listo para el canteado.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Gracias a la ingeniería de HECOMA®, esta serie está pensada para trabajar en condiciones de producción intensiva, garantizando resultados uniformes y una excelente fiabilidad en cortes rectos y repetitivos. Su estructura reforzada asegura una mínima desviación, permitiendo un aprovechamiento máximo del material y una larga vida útil en entornos industriales exigentes.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para seccionadora, optimizado para el corte de paneles y tableros.</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente diseñada para obtener cortes limpios y reducir el astillado</span></li>
            <li><span class="text-gray-700 font-normal">Alta estabilidad de corte, ideal para trabajos en serie y producción continua</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para el mecanizado de melamina, MDF, tableros rechapados y otros materiales derivados de la madera.</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para aplicaciones profesionales donde se requiere precisión, repetitividad y un buen acabado del canto</span></li>
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