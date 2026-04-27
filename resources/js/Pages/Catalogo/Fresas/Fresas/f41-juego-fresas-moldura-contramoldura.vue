<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { useCartStore } from '@/stores/cartStore';
    
    const props = defineProps({ productos: Array });
    const cart = useCartStore();

    
    const parseReferencia = (ref) => {
      let match = ref.match(/^F41-M(I|S)([A-Z])-([MH])$/);
      if (match)
        return { grupo: 'MOLDURAS', posicion: match[1] === 'I' ? 'SUPERIOR' : 'INFERIOR', perfil: match[2],  material: match[3], D: '150', B: '16', d: '50', Z: '4' };

      // CONTRAMOLDURAS
      match = ref.match(/^F41-C(I|S)([A-Z])-([MH])$/);
      if (match)
        return { grupo: 'CONTRAMOLDURAS', posicion: match[1] === 'I' ? 'SUPERIOR' : 'INFERIOR', perfil: match[2], material: match[3], D: '180', B: '19', d: '50', Z: '4' };

      // E-fresa extensible
      match = ref.match(/^F41-E-([MH])$/);
      if (match)
        return { grupo: 'E-fresa extensible', posicion: 'extensible', perfil: 'E', material: match[1], D: '151', B: '5-9.5', d: '50', Z: '4+V4' };

      // R-fresa recta
      match = ref.match(/^F41-R-([MH])$/);
      if (match) 
        return { grupo: 'R-fresa recta', posicion: 'recta', perfil: 'R', material: match[1], D: '180', B: '20', d: '50', Z: '4' };

      return null;
    };

    const tablaAgrupada = computed(() => {
      // grupos: { [grupo]: { [baseRef]: { medidas, perfil, posicion, md, hss } } }
      const grupos = { 'MOLDURAS': {}, 'CONTRAMOLDURAS': {}, 'E-fresa extensible': {}, 'R-fresa recta': {} };

      props.productos.forEach(prod => {
        const parsed = parseReferencia(prod.referencia);
        if (!parsed)
          return;
        const { grupo, posicion, perfil, material, D, B, d, Z } = parsed;
        const baseRef = prod.referencia.slice(0, prod.referencia.lastIndexOf('-'));

        if (!grupos[grupo][baseRef])
          grupos[grupo][baseRef] = { medidas: { D, B, d, Z }, perfil, posicion, md: null, hss: null };
        
        if (material === 'M')
          grupos[grupo][baseRef].md = prod;
        else if (material === 'H')
          grupos[grupo][baseRef].hss = prod;
      });

      // Convertimos a array de secciones ordenadas
      return Object.entries(grupos).map(([nombre, filas]) => ({ nombre, filas: Object.values(filas).sort((a, b) => a.perfil.localeCompare(b.perfil) || a.posicion.localeCompare(b.posicion)) }));
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
  <Head title="F41 Juego Fresas Moldura y Contramoldura - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F41 Juego Fresas Moldura y Contramoldura</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="" alt="" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de juegos de fresas para perfilado y ensamblaje, ponemos a su disposición la F41, un conjunto de fresas moldura-contramoldura especialmente diseñado para obtener uniones perfectas y un acabado profesional en trabajos de carpintería. Este sistema permite realizar el moldurado y espigado de puertas mediante perfiles complementarios (Canalador Z4+V4) que encajan entre sí con gran precisión.</p>
          <p>Fabricadas con tecnología CNC de HECOMA®, están disponibles en Metal Duro (MD) para uso universal y materiales abrasivos, o en HSS para maderas blandas. Diseñadas específicamente para avance mecánico, estas herramientas garantizan una estabilidad de corte superior y una alta repetitividad en procesos industriales.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-24">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h3 v-if="!$page.props.auth.user" class="text-[#010cf7] text-3xl font-bold mb-6">Nota para profesionales:</h3>
        <p v-if="!$page.props.auth.user">Para consultar nuestras tarifas industriales, verificar disponibilidad a tiempo real y tramitar tu pedido, es necesario <a href="/login">iniciar sesión</a> o <a href="/register">registrarte</a> como cliente.</p>

        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
          <table class="w-full text-sm text-left border-collapse bg-white">
            <template v-for="(seccion, sIdx) in tablaAgrupada" :key="sIdx">
              <thead>
                <tr>
                  <td colspan="12" class="px-4 py-3 bg-gray-100 font-bold text-gray-800 uppercase text-sm tracking-wide">{{ seccion.nombre }}</td>
                </tr>
                <tr class="bg-[#e7f5ff] text-gray-700 border-b border-blue-200 uppercase">
                  <th class="px-3 py-4 text-center font-extrabold">Perfil</th>
                  <th class="px-3 py-4 text-center font-extrabold">Posicion</th>
                  <th class="px-3 py-4 text-center font-extrabold">Ø</th>
                  <th class="px-3 py-4 text-center font-extrabold">B</th>
                  <th class="px-3 py-4 text-center font-extrabold">d</th>
                  <th class="px-3 py-4 text-center font-extrabold">Z</th>
                  <th class="px-4 py-4 border-l-2 border-blue-100 font-bold">Ref MD</th>
                  <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio MD</th>
                  <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
                  <th class="px-4 py-4 border-l-2 border-gray-100 font-bold">Ref HSS</th>
                  <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio HSS</th>
                  <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                <tr v-for="(fila, idx) in seccion.filas" :key="idx" class="hover:bg-blue-50/50 transition-colors">
                  <td class="px-3 py-4 text-center font-medium">{{ fila.perfil }}</td>
                  <td class="px-3 py-4 text-center text-gray-600">{{ fila.posicion }}</td>
                  <td class="px-3 py-4 text-center">{{ fila.medidas.D }}</td>
                  <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.B }}</td>
                  <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.d }}</td>
                  <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.Z }}</td>
                  <td class="px-4 py-4 text-xs border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }}</td>
                  <td v-if="$page.props.auth.user" class="px-4 py-4">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}</td>
                  <td v-if="$page.props.auth.user" class="px-4 py-4 text-center"><button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button></td>
                  <td class="px-4 py-4 text-xs bg-[#fafcfe]/40 border-l-2 border-gray-100">{{ fila.hss ? fila.hss.referencia : '---' }}</td>
                  <td v-if="$page.props.auth.user" class="px-4 py-4 text-gray-900 bg-[#fafcfe]/40">{{ fila.hss ? formatearPrecio(fila.hss.precio) : '---' }}</td>
                  <td v-if="$page.props.auth.user" class="px-4 py-4 text-center bg-[#fafcfe]/40"><button v-if="fila.hss" @click="agregarAlCarrito(fila.hss)" class="hover:scale-125 transition-transform">🛒</button></td>
                </tr>
              </tbody>
            </template>

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
  h3 { line-height: 1.2; }
  .link { text-align: center; }
  a { color: blue; text-decoration: underline;}
</style>