<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { useCartStore } from '@/stores/cartStore';
    
    const props = defineProps({ productos: Array });
    const cart = useCartStore();
    
    /**
     * LÓGICA DINÁMICA: Agrupamos los productos por sus medidas.
     * Extraemos las medidas de la cadena de texto de la 'referencia'.
     */
    const tablaAgrupada = computed(() => {
        const grupos = {};
        props.productos.forEach(prod => {
          const match = prod.referencia.match(/F14-(\d{3})(\d{2,3})/);
          if (match) {
            const diametro = match[1];
            const ancho = parseInt(match[2]);
            const baseRef = prod.referencia.slice(0, -1); 

            if (!grupos[baseRef]) 
              grupos[baseRef] = { medidas: { D: diametro, B: ancho, d: diametro > 145 ? '50' : '50', Z: '4' }, md: null, hss: null };

            if (prod.referencia.endsWith('M'))
              grupos[baseRef].md = prod;
            else if (prod.referencia.endsWith('H'))
              grupos[baseRef].hss = prod;
          }
      });
      return Object.values(grupos).sort((a, b) => { return a.medidas.D - b.medidas.D || a.medidas.B - b.medidas.B; });
    });
    
    const agregarAlCarrito = (producto) => {
        if (!producto) return;
        cart.addToCart({
            id: producto.id, referencia: producto.referencia,
            tipo: producto.tipo, familia: producto.familia,
            precio: producto.precio, stock: producto.stock
        });
    };
    const formatearPrecio = (precio) => { return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€' : '---'; };
</script>

<template>
  <Head>
    <title>F14 Fresa para Galces Z4 | Cortes Rectos de Alta Estabilidad</title>
    <meta name="description" content="F14 Fresa de 4 cortes rectos para galces y canteado profesional. Cuerpo de acero especial antivibración. Disponible en Metal Duro (MD) y HSS para avance mecánico o manual. ¡Precisión y seguridad!." />
    <meta name="keywords" content="fresa, fresa para galces, fresa z4, fresa cortes rectos" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F14 Fresa para Galces Z4 (Cortes Rectos)</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f14.jpg" alt="Fresa para Galces Z4 (Cortes Rectos)" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La fresa para galces con 4 cortes rectos (Z4) es la herramienta de referencia para el canteado y mecanizado longitudinal de madera con acabados de alta calidad. Su cuerpo, fabricado en una aleación de acero especial, ha sido diseñado específicamente para absorber vibraciones y minimizar retrocesos, garantizando un corte fluido y seguro.</p>
          <p>Según la densidad del material, ofrecemos placas en Metal Duro (MD) para maderas medias y duras, o en HSS para un afilado superior en maderas blandas. Aunque disponemos de stock permanente para avance mecánico, fabricamos versiones para avance manual bajo pedido, adaptándonos a las necesidades específicas de su maquinaria y proceso productivo.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características de nuestra fresa para galces rectos:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">4 cortes rectos (Z).</span></li>
          <li><span class="text-gray-700 font-normal">Fabricada en en Metal duro para maderas medias o duras y en HSS para maderas blandas</span></li>
          <li><span class="text-gray-700 font-normal">Avance mecánico.</span></li>
          <li><span class="text-gray-700 font-normal">En stock  fabricado para avance mecánico.</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicación:</h2>
        <p>Perfecto para canteado y mecanizado de galces en el sentido longitudinal de la fibra.  La herramienta está fabricado en aleación de acero especial, pensada para absorber vibraciones y retrocesos.  Las placas de corte (en carburo de tungsteno o HSS) son soldadas mediante aleación trimetálica, proporcionando mayor absorción de impactos y durabilidad.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Referencias disponibles:</h2>
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-24">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
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
                <td class="px-4 py-4  text-xs /40 border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }} </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 /40">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }} </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center /40"><button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button></td>
                <td class="px-4 py-4  text-xs bg-[#fafcfe]/40 border-l-2 border-gray-100">{{ fila.hss ? fila.hss.referencia : '---' }} </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-gray-900 bg-[#fafcfe]/40">{{ fila.hss ? formatearPrecio(fila.hss.precio) : '---' }} </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center bg-[#fafcfe]/40"><button v-if="fila.hss" @click="agregarAlCarrito(fila.hss)" class="hover:scale-125 transition-transform">🛒</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  a { color: blue; text-decoration: underline;}
  h3 { line-height: 1.2; }
</style>