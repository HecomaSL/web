<script setup>
  import MainLayout from '@/Layouts/MainLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { computed } from 'vue';
  import { useCartStore } from '@/stores/cartStore';
  
  const props = defineProps({ productos: Array });
  const cart = useCartStore();
  
  const tablaAgrupada = computed(() => {
      if (!props.productos)
        return [];
      const grupos = {};
  
      props.productos.forEach(prod => {
        if (!prod.referencia)
          return;
        const match = prod.referencia.match(/F60-(\d{3})P(\d+)(M|H)/);
        
        if (match) {
          const diametro = match[1]; 
          const pasoValor = match[2];
          const material = match[3];
          const baseRef = prod.referencia.slice(0, -1); 

          if (!grupos[baseRef])
            grupos[baseRef] = { medidas: { D: diametro, B: (parseInt(pasoValor) * 10), d: '50', Z: '4', paso: pasoValor }, md: null, hss: null };

          if (material === 'M')
            grupos[baseRef].md = prod;
          else if (material === 'H')
            grupos[baseRef].hss = prod;
        }
      });
  
      return Object.values(grupos).sort((a, b) => { return a.medidas.D - b.medidas.D || a.medidas.paso - b.medidas.paso; });
  });
  
  const agregarAlCarrito = (producto) => {
      if (!producto)
        return;
      cart.addToCart({
        id: producto.id, referencia: producto.referencia, precio: producto.precio,
        familia: producto.familia || 'F60', stock: producto.stock
      });
  };
  
  const formatearPrecio = (precio) => { return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€' : '---'; };
</script>

<template>
  <Head title="F60 Fresa para juntas longitudinales - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F60 Fresa para juntas longitudinales</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f60.png" alt="Fresa F60" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de fresas industriales, ponemos a su disposición la F60, una fresa para juntas longitudinales diseñada para conseguir uniones precisas, resistentes y con un acabado limpio en maderas y tableros.</p>
          <p>Esta herramienta cuenta con 4 cortes (Z4) y un perfil dentado de alta precisión que facilita un montaje estable, mejorando drásticamente la calidad final del ensamblaje.</p>
          <p>Fabricada bajo los estándares de HECOMA®, incorpora placas de Metal Duro (MD) de uso universal, ideales para trabajar materiales duros y abrasivos con la máxima durabilidad. Diseñada para avance mecánico, la F60 es la solución perfecta para el empalme de listones y el mecanizado de cantos en procesos de producción continua.</p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-24">
      <div class="font-medium text-gray-700 max-w-6xl mx-auto">
        <h3 v-if="!$page.props.auth.user" class="text-[#010cf7] text-3xl font-bold mb-6">Nota para profesionales:</h3>
        <p v-if="!$page.props.auth.user">Para consultar nuestras tarifas industriales, verificar disponibilidad a tiempo real y tramitar tu pedido, es necesario <a href="/login">iniciar sesión</a> o <a href="/register">registrarte</a> como cliente.</p>
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
          <table class="w-full text-sm text-left border-collapse bg-white">
            <thead class="font-bold">
              <tr class="bg-[#e7f5ff] text-gray-700 border-b border-blue-200 uppercase">
                <th class="px-3 py-4 text-center font-extrabold">Ø</th>
                <th class="px-3 py-4 text-center font-extrabold">B</th>
                <th class="px-3 py-4 text-center font-extrabold">d</th>
                <th class="px-3 py-4 text-center font-extrabold">Z</th>
                <th class="px-3 py-4 text-center font-extrabold">Paso</th>
                <th class="px-4 py-4 border-l-2 border-blue-100 font-bold">Ref MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="(fila, idx) in tablaAgrupada" :key="idx" class="hover:bg-blue-50/50 transition-colors">
                <td class="px-3 py-4 text-center font-bold">{{ fila.medidas.D }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.B }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.d }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.Z }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.paso }}</td>
                <td class="px-4 py-4 border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 font-semibold">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center">
                  <button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button>
                  <span v-else class="text-gray-600">---</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  p { text-align: justify; line-height: 1.6; }
  a { color: blue; text-decoration: underline; }
</style>