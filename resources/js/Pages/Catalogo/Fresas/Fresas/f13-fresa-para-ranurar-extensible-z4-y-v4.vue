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
          const match = prod.referencia.match(/F13-(\d{3})(\d{2,3})/);
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
  <Head title="F13 Fresa Extensible para ranurar Z4 + V4 - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F13 Fresa Extensible para ranurar Z4 + V4</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f13.jpg" alt="Fresa Extensible para ranurar Z4 + V4" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La fresa para ranurar extensible F13 se consolida como la solución más versátil y rentable para mecanizados que exigen anchos de ranura variables con una precisión milimétrica.</p>
          <p>Gracias a su diseño modular desarrollado por HECOMA®, permite configurar la medida exacta de corte en cualquier sentido de la veta, optimizando el stock de utillaje en el taller. Su arquitectura técnica de 4 cortes principales (Z4) combinados con 4 precortadores (V4) garantiza paredes laterales perfectamente escuadradas y libres de astillamiento, incluso en maderas transversales.</p>
          <p>Disponible con placas de Metal Duro (HM) para una resistencia extrema en materiales abrasivos o en HSS para acabados ultra-limpios en maderas blandas, está específicamente diseñada para maquinaria con avance mecánico.</p>
          <p>Es la opción predilecta para industrias que buscan la máxima flexibilidad operativa, estabilidad dinámica y una larga vida útil en procesos de producción donde la precisión y la polivalencia son factores críticos.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características de nuestras fresas extensibles para ranurar:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Fresa con 4 cortes (Z) y 4 pre cortadores (V).</span></li>
          <li><span class="text-gray-700 font-normal">Fabricada en MD (carburo de tungsteno) para trabajar materiales duros y en HSS para trabajar maderas blandas</span></li>
          <li><span class="text-gray-700 font-normal">Avance mecánico.</span></li>
          <li><span class="text-gray-700 font-normal">Incluye juego de anillos decimales.</span></li>
        </ul>
        <p>Fresa para ranurar en cualquier sentido de la fibra, con anchos variables mediante anillos decimales. El cuerpo de la herramienta está fabricado en aleación de acero de alta resistencia. Las placas de metal duro (carburo de tungsteno) son soldadas mediante aleación trimetálica. Con estos materiales y una fabricación mediante CNC de alta precisión, obtenemos gran rendimiento, estabilidad en la calidad del corte y una gran duración de la herramienta.  La fresa se sirve con las indicaciones de uso necesarias para el correcto desempeño de esta.</p>
        <p>La herramienta forma parte de nuestra serie de herramientas profesionales exprés (ProEx). La puede encontrar en las medidas indicadas en la tabla en nuestros distribuidores de material de ferretería y carpintería.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicación:</h2>
        <p>Herramienta para ranurar en cualquier sentido de la fibra. Buen acabado gracias a los pre cortadores. La fresa se entrega con las indicaciones de uso necesarias para el correcto trabajo de esta.</p>
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
                
                <td class="px-4 py-4  text-xs /40 border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 /40">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center /40"><button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button></td>

                <td class="px-4 py-4  text-xs bg-[#fafcfe]/40 border-l-2 border-gray-100">{{ fila.hss ? fila.hss.referencia : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-gray-900 bg-[#fafcfe]/40">{{ fila.hss ? formatearPrecio(fila.hss.precio) : '---' }} </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center bg-[#fafcfe]/40"> <button v-if="fila.hss" @click="agregarAlCarrito(fila.hss)" class="hover:scale-125 transition-transform">🛒</button></td>
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
  a { color: blue; text-decoration: underline;}
  h3 { line-height: 1.2; }
</style>