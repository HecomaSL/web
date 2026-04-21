<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 5.1 Discos para canales - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 5.1 Discos para canales.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos para ranurar, ponemos a su disposición la Serie 5.1, formada por discos para canales diseñados para realizar ranuras y canales precisos con un alto nivel de estabilidad y limpieza de corte. Estos discos son ideales para trabajos de carpintería y mecanizado donde se requiere un canal uniforme y bien definido, tanto en madera maciza como en tableros derivados.</p>
          <p>La superioridad técnica de los discos para canales reside en su diseño de diente de base plana, específicamente concebido para dejar un fondo de ranura perfectamente liso y escuadrado, facilitando el alojamiento de traseras, paneles o herrajes.</p>
          <p>A diferencia de los discos estándar, estos discos cuentan con un cuerpo reforzado que anula las oscilaciones laterales, lo que garantiza que el ancho del canal sea constante a lo largo de toda la pieza, evitando holguras o atascos en el ensamblaje.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Su configuración está optimizada para evacuar la viruta de forma eficiente en cortes ciegos, reduciendo el calentamiento y la carbonización de la madera incluso en los materiales más densos o resinosos.</p>
        <p>Gracias a la ingeniería de HECOMA®, esta serie garantiza una geometría de corte que evita el astillado en los bordes de la ranura, asegurando un encaje perfecto de las piezas y un rendimiento constante en procesos de producción industrial.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para ranurar y realizar canales con precisión.</span></li>
            <li><span class="text-gray-700 font-normal">Permite obtener ranuras limpias y de anchura constante</span></li>
            <li><span class="text-gray-700 font-normal">Diseñados para ofrecer un corte estable, reduciendo vibraciones durante el mecanizado</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para trabajos de carpintería, fabricación de muebles y mecanizados técnicos.</span></li>
            <li><span class="text-gray-700 font-normal">Aptos para el trabajo en madera maciza, MDF y otros tableros derivados</span></li>
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