<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 1.5 Discos De Paso Fino Para Acabados - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.5 Discos De Paso Fino Para Acabados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra línea de Discos de corte de tablero, ponemos a su disposición la Serie 1.5, una referencia de paso fino diseñada específicamente para obtener un acabado limpio y preciso. Estos discos son la herramienta indispensable en cortes donde se requiere la máxima calidad de terminación, logrando reducir significativamente los astillados y las marcas mecánicas en el material.</p>
          <p>La clave de esta serie reside en una configuración de dientes estrechamente espaciados y un afilado de alta precisión, diseñado para minimizar la fricción y el impacto sobre la superficie del tablero. Son especialmente eficaces en el seccionado de melaminas, chapados naturales y tableros con recubrimientos delicados que tienden a astillarse con discos convencionales. Al utilizar esta serie, el profesional asegura una arista perfecta y una línea de corte libre de imperfecciones, optimizando los tiempos de producción al eliminar procesos posteriores de lijado o rectificado.</p>
          <p>Gracias a la ingeniería de HECOMA®, esta serie ofrece una estabilidad de corte superior, permitiendo un seccionado suave y delicado incluso en los revestimientos más exigentes. Es la elección perfecta para carpinteros y fabricantes de mobiliario que priorizan una estética impecable y un montaje final sin necesidad de repasos.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Diseño de paso fino para un corte suave y de alta calidad</span></li>
            <li><span class="text-gray-700 font-normal">Mayor número de dientes para mejorar el acabado y minimizar vibraciones</span></li>
            <li><span class="text-gray-700 font-normal">Recomendado para trabajos de acabado en materiales delicados o visibles</span></li>
            <li><span class="text-gray-700 font-normal">Corte optimizado para obtener bordes limpios y uniformes</span></li>
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