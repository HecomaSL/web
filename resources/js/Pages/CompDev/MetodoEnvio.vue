<script setup>
import { ref } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

// Datos de los métodos
const metodos = ref([
  {
    titulo: 'Envío a Domicilio', precio: '12,00 €',
    descripcion: 'Entrega rápida en su taller o domicilio a través de nuestra agencia de transporte nacional.',
    plazo: '24/48 horas laborables', icono: '🚚'
  },
  {
    titulo: 'Recogida en Oficinas', precio: 'Gratis',
    descripcion: 'Puede recoger su pedido directamente en nuestras sedes de Sonseca (Toledo) o Lucena (Córdoba).',
    plazo: 'Inmediato (según disponibilidad)', icono: '🏢'
  }
]);
</script>

<template>
  <Head title="Métodos de Envío | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 text-center">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Métodos de Envío y Entrega</h1>
        <p class="text-white font-bold ">Información detallada sobre nuestras tarifas de transporte y opciones de recogida local.</p>
      </div>
    </section>

    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-6 max-w-5xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
          <div v-for="(metodo, index) in metodos" :key="index" class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow flex flex-col items-center text-center" >
            <div class="text-5xl mb-4">{{ metodo.icono }}</div>
            <h2 class="text-[#0000BB] text-2xl font-bold uppercase mb-2">{{ metodo.titulo }}</h2>
            <div class="text-3xl font-black text-gray-800 mb-4">
              {{ metodo.precio }}
            </div>
            <p class="text-gray-600 mb-6 leading-relaxed">{{ metodo.descripcion }}</p>
            <div class="mt-auto w-full pt-4 border-t border-gray-50 flex items-center justify-center gap-2 text-sm font-bold text-gray-400 uppercase">
              <span class="inline-block w-2 h-2 bg-green-500 rounded-full"></span>
              {{ metodo.plazo }}
            </div>
          </div>
        </div>

        <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
          <h3 class="text-[#0000BB] text-xl font-bold mb-6 uppercase flex items-center gap-2">Condiciones Generales</h3>
          
          <ul class="space-y-4 text-gray-700">
            <li class="flex gap-3">
              <span class="font-bold text-[#0000BB]">•</span>
              <p><strong>Zonas de envío:</strong> Realizamos envíos a toda España peninsular. Para Baleares, Canarias, Ceuta y Melilla, consulte tarifas específicas.</p>
            </li>
            <li class="flex gap-3">
              <span class="font-bold text-[#0000BB]">•</span>
              <p><strong>Gestión de pedidos:</strong> Los pedidos realizados después de las 14:00h serán gestionados el siguiente día hábil.</p>
            </li>
            <li class="flex gap-3">
              <span class="font-bold text-[#0000BB]">•</span>
              <p><strong>Recogida local:</strong> Si selecciona recogida en nuestras oficinas, recibirá un aviso (email o teléfono) cuando su herramienta esté lista para ser retirada.</p>
            </li>
            <li class="flex gap-3">
              <span class="font-bold text-[#0000BB]">•</span>
              <p><strong>Seguimiento:</strong> Todos nuestros envíos a domicilio incluyen número de seguimiento proporcionado por la agencia de transporte.</p>
            </li>
          </ul>
        </div>

        <div class="mt-12 text-center">
          <p class="text-gray-500 mb-4">¿Tiene dudas sobre el transporte de herramientas especiales?</p>
          <a href="/contacto" class="inline-block bg-[#0000BB] text-white px-8 py-3 rounded-lg font-bold uppercase hover:bg-blue-800 transition-colors shadow-lg">Contactar con Soporte Técnico</a>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
h1, h2, h3 { letter-spacing: 0.05em; }
p {line-height: 1.6; }
.transition-shadow { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
</style>