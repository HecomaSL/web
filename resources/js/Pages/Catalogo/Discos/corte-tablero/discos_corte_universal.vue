<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Serie 1.2 Discos para corte universal - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.2 Discos para corte universal.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>En HECOMA, entendemos que la eficiencia en el taller depende de la calidad de la herramienta. Nuestra serie de discos de corte universal ha sido desarrollada para ofrecer una solución integral a profesionales que requieren realizar cortes limpios en una amplia variedad de materiales sin necesidad de cambiar de herramienta constantemente.</p>
          <p>Estos discos han sido diseñados con una geometría de diente optimizada y aleaciones de alta resistencia, lo que garantiza una estabilidad térmica superior incluso en jornadas de trabajo intensivas. Gracias a su versatilidad, podrá alternar entre maderas naturales, derivados y materiales sintéticos manteniendo una precisión constante y reduciendo drásticamente los tiempos de parada por cambio de sierra. Es la inversión ideal para talleres que buscan simplificar su inventario de herramientas sin renunciar a la excelencia técnica que exigen sus clientes.</p>
          <p>Si busca maximizar su productividad con una herramienta polivalente que no comprometa la calidad del acabado, la gama de discos universales de HECOMA es su mejor aliado estratégico.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">El ángulo de ataque de estos discos es de 12º</span></li>
            <li><span class="text-gray-700 font-normal">Dentado alterno con 10º de inclinación</span></li>
            <li><span class="text-gray-700 font-normal">Ancho de diente entre 2,5 mm y 5,5 mm</span></li>
            <li><span class="text-gray-700 font-normal">Diámetros entre 100 mm y 550 mm</span></li>
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