<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { useCartStore } from '@/stores/cartStore';
    
    const props = defineProps({
      productos: Array // Datos de MariaDB
    });
    
    const cart = useCartStore();
    
    /**
     * LÓGICA DINÁMICA: Agrupamos productos por sus medidas base.
     * Se diferencia MD de HSS por la letra final (M o H).
     */
    const tablaAgrupada = computed(() => {
        const grupos = {};
    
        props.productos.forEach(prod => {
          const match = prod.referencia.match(/F22-(\d{3})R(\d{2,3})(A|B)(M|H)/);
          if (match) {
            const diametro = match[1];
            const valorR = parseInt(match[2]);
            const tipoLetra = match[3];
            const material = match[4];
            const baseRef = prod.referencia.slice(0, -1); 

            if (!grupos[baseRef]) {
              const rMap = { 5:  10, 7:  12, 10: 15, 12: 17, 15: 20, 20: 25 };
              grupos[baseRef] = { medidas: { D: diametro, B: rMap[valorR] || '---', d: '50', Z: '4', tipo: tipoLetra, r: valorR }, md: null, hss: null };
            }
            if (material === 'M')
              grupos[baseRef].md = prod;
            else if (material === 'H')
              grupos[baseRef].hss = prod;
          }
        });
    
        return Object.values(grupos).sort((a, b) => { return parseInt(a.medidas.D) - parseInt(b.medidas.D) ||  a.medidas.r - b.medidas.r ||  a.medidas.tipo.localeCompare(b.medidas.tipo); });
    });
    
    const agregarAlCarrito = (producto) => {
        if (!producto) 
          return;
        cart.addToCart({
          id: producto.id, referencia: producto.referencia,
          tipo: producto.tipo, familia: producto.familia,
          precio: producto.precio, stock: producto.stock
        });
    };
    const formatearPrecio = (precio) => { return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€' : '---'; };
</script>

<template>
  <Head title="F22 Fresa radio 1/4 convexo - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F22 Fresa radio 1/4 convexo</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f22.jpg" alt="Fresa radio 1/4 convexo" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Nuestra fresa de radio 1/4 convexo es la herramienta profesional indispensable para el redondeado de cantos y la creación de perfiles suaves en todo tipo de proyectos de carpintería. A diferencia de las fresas comunes, su configuración de 4 cortes (Z4) permite un avance más rápido y un acabado mucho más fino, eliminando prácticamente el astillado en las aristas.</p>
          <p>Fabricamos esta fresa en Metal Duro (Carburo de Tungsteno) para garantizar un rendimiento extremo en maderas duras, y en HSS para obtener una nitidez superior en maderas blandas. Diseñada para avance mecánico, la F22 ofrece una estabilidad total, asegurando que el perfil convexo sea uniforme a lo largo de toda la pieza.</p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características de nuestra fresa para radio convexo 1/4:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Fresa con 4 cortes (Z)</span></li>
          <li><span class="text-gray-700 font-normal">Fabricada en MD (carburo de tungsteno) para trabajar materiales duros y en HSS para trabajar maderas blandas.</span></li>
          <li><span class="text-gray-700 font-normal">Avance mecánico</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicación:</h2>
        <p>Fresa para realizar radios interiores. Fabricada con ángulo axial, permitiendo buen acabado y suavidad en el corte. El cuerpo de la herramienta está fabricado en aleación de acero de alta resistencia. Las placas de metal duro (carburo de tungsteno) son soldadas mediante aleación trimetálica. Con estos materiales y una fabricación mediante CNC de alta precisión, obtenemos gran rendimiento, estabilidad en la calidad del corte y una gran duración de la herramienta.</p>
        <p class="link"><a href="https://hecoma.com/wp-content/uploads/2021/03/F20a-esquema-radiosR.pdf" class="text-[#010cf7] font-bold hover:underline">–> Descarga documento pdf esquema de radios a escala 1:1 <–</a></p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-24">
      <div class="max-w-6xl mx-auto">
        <h3 v-if="!$page.props.auth.user" class="text-[#010cf7] text-3xl font-bold mb-6">Nota para profesionales:</h3>
        <p v-if="!$page.props.auth.user">Para consultar nuestras tarifas industriales, verificar disponibilidad a tiempo real y tramitar tu pedido, es necesario <a href="/login">iniciar sesión</a> o <a href="/register">registrarte</a> como cliente.</p>
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
          <table class="w-full text-sm text-left border-collapse bg-white">
            <thead class="font-bold">
              <tr class="bg-[#e7f5ff] text-gray-700 border-b border-blue-200 uppercase">
                <th class="px-3 py-4 text-center font-extrabold ">Ø</th>
                <th class="px-3 py-4 text-center font-extrabold ">B</th>
                <th class="px-3 py-4 text-center font-extrabold ">d</th>
                <th class="px-3 py-4 text-center font-extrabold ">Z</th>
                <th class="px-3 py-4 text-center font-extrabold ">Tipo</th>
                <th class="px-3 py-4 text-center font-extrabold ">R</th>
                <th class="px-4 py-4 border-l-2 border-blue-100 font-bold">Ref MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
                <th class="px-4 py-4 border-l-2 border-gray-100 font-bold">Ref HSS</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio HSS</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="(fila, idx) in tablaAgrupada" :key="idx" class="hover:bg-blue-50/50 transition-colors">
                <td class="px-3 py-4 text-center ">{{ fila.medidas.D }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.B }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.d }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.Z }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.tipo }}</td>
                <td class="px-3 py-4 text-center text-gray-600 font-bold">{{ fila.medidas.r }}</td>
                <td class="px-4 py-4 text-xs border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }}</td>
                <td class="px-4 py-4 font-semibold text-gray-900">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}</td>
                <td class="px-4 py-4 text-center">
                  <button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button>
                  <span v-else>---</span>
                </td>
                <td class="px-4 py-4 text-xs bg-[#fafcfe]/40 border-l-2 border-gray-100">{{ fila.hss ? fila.hss.referencia : '---' }}</td>
                <td class="px-4 py-4 font-semibold text-gray-900 bg-[#fafcfe]/40">{{ fila.hss ? formatearPrecio(fila.hss.precio) : '---' }}</td>
                <td class="px-4 py-4 text-center bg-[#fafcfe]/40">
                  <button v-if="fila.hss" @click="agregarAlCarrito(fila.hss)" class="hover:scale-125 transition-transform">🛒</button>
                  <span v-else>---</span>
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
  h2 { line-height: 1.2; }
  .link { text-align: center; }
  a { color: blue; text-decoration: underline;}
</style>