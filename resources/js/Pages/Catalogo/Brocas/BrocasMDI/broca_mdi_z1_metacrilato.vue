<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Broca MDI Helicoidal acabado positiva Z1 - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.20 Broca MDI Helicoidadal acabado Z1 para metacrilato</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="/images/brocas/brocasMDI/b10.png" alt="" style="width: 20%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características</h2>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Broca enrutadora para un acabado perfecto del filo del metacrilato.</span></li>
            <li><span class="text-gray-700 font-normal">Estriado pulido para evitar que el material se adiera</span></li>
            <li><span class="text-gray-700 font-normal">Desahogo de la viruta hacia arriba.</span></li>
          </ul>
          <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicacion</h2>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Para corte y fresado de metacrilato</span></li>
            <li><span class="text-gray-700 font-normal">Diseñado para equipos de control numérico</span></li>
          </ul>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
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
</style>