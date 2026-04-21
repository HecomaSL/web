<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

  <Head title="Broca MDI Helicoidal acabado positiva Z1 - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.16 Broca MDI
          helicoidal desbaste en CNC con bisel 60º para canjeados Z3</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="/images/brocas/brocasMDI/b16.png" alt="" style="width: 20%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características</h2>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">3 filos de corte helicoidal</span></li>
            <li><span class="text-gray-700 font-normal">Desahogo de la viruta hacia arriba</span></li>
            <li><span class="text-gray-700 font-normal">Rotacion a derechas.</span></li>
            <li><span class="text-gray-700 font-normal">Metal duro de alta calidad</span></li>
          </ul>
          <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicacion</h2>
          <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Para corte y fresado maderas duras y materiales con base
                madera</span></li>
            <li><span class="text-gray-700 font-normal">Diseñado para uso en equipos de control numerico</span></li>
          </ul>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Medidas disponibles</h2>
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de
          48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo
          máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
        <table class="w-full text-sm text-left border-collapse bg-white">
          <thead class="font-bold">
            <tr class="bg-[#e7f5ff] text-gray-700 border-b border-blue-200 uppercase">
              <th class="px-3 py-4 text-center font-extrabold">ØD</th>
              <th class="px-3 py-4 text-center font-extrabold">Lc</th>
              <th class="px-3 py-4 text-center font-extrabold">Lt</th>
              <th class="px-3 py-4 text-center font-extrabold">Øm</th>
              <th class="px-3 py-4 text-center font-extrabold">Articulo</th>
              <th class="px-3 py-4 text-center font-extrabold">¿Stock?</th>
              <th class="px-3 py-4 text-center font-extrabold">Comprar</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr class="hover:bg-blue-50/50 transition-colors">
              <td class="px-3 py-4 text-center text-gray-600">14</td>
              <td class="px-3 py-4 text-center text-gray-600">58</td>
              <td class="px-3 py-4 text-center text-gray-600">110</td>
              <td class="px-3 py-4 text-center text-gray-600">14</td>
              <td class="px-3 py-4 text-center text-gray-600">BPD14.58.110DP3B-14</td>
              <td class="px-3 py-4 text-center text-gray-600">No</td>
              <td class="px-3 py-4 text-center text-gray-600">[hecoma_logged_in]Pedir presupuesto <a href="mailto:dptocomercial@hecoma.com?subject=Prespuesto%broca%BPD14.58.110DP3B-14&amp;body=Buenas,%necesito%prespuesto%de%la%broca%BPD14.58.110DP3B-14">aqui</a></td>
            </tr>
            <tr class="hover:bg-blue-50/50 transition-colors">
              <td class="px-3 py-4 text-center text-gray-600">16</td>
              <td class="px-3 py-4 text-center text-gray-600">55</td>
              <td class="px-3 py-4 text-center text-gray-600">110</td>
              <td class="px-3 py-4 text-center text-gray-600">16</td>
              <td class="px-3 py-4 text-center text-gray-600">BPD16.55.110DP3B-16</td>
              <td class="px-3 py-4 text-center text-gray-600">No</td>
              <td class="px-3 py-4 text-center text-gray-600">[hecoma_logged_in]Pedir presupuesto <a href="mailto:dptocomercial@hecoma.com?subject=Prespuesto%broca%BPD16.55.110DP3B-16&amp;body=Buenas,%necesito%prespuesto%de%la%broca%BPD16.55.110DP3B-16">aqui</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
/* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
p {
  text-align: justify;
  line-height: 1.6;
}

h2 {
  line-height: 1.2;
}

h3 {
  line-height: 1.2;
}
</style>