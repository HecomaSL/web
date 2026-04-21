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
        // F30-1403015AM → D=140, B=30, Alpha=15, Tipo=A, Material=M
        const match = prod.referencia.match(/F30-(\d{3})(\d{2})(\d{2})(A|B)(M|H)/);
        
        if (match) {
            const diametro = match[1];           // "140"
            const valorB   = parseInt(match[2]); // 30
            const valorAlpha = parseInt(match[3]); // 15
            const tipo     = match[4];           // "A" o "B"
            const material = match[5];           // "M" o "H"
            
            // Agrupa MD y HSS en la misma fila quitando la última letra
            const baseRef = prod.referencia.slice(0, -1);

            if (!grupos[baseRef]) {
                grupos[baseRef] = {
                    medidas: {
                        D: diametro,
                        B: valorB,
                        d: '50',
                        Z: '4',
                        tipo: tipo,
                        Alpha: valorAlpha
                    },
                    md: null,
                    hss: null
                };
            }

            if (material === 'M')
                grupos[baseRef].md = prod;
            else if (material === 'H')
                grupos[baseRef].hss = prod;
        }
    });

    return Object.values(grupos).sort((a, b) => {
        return parseInt(a.medidas.D) - parseInt(b.medidas.D) ||
               a.medidas.B - b.medidas.B ||
               a.medidas.tipo.localeCompare(b.medidas.tipo);
    });
});
    
    const agregarAlCarrito = (producto) => {
        if (!producto) return;
        cart.addToCart({
            id: producto.id,
            referencia: producto.referencia,
            tipo: producto.tipo,
            familia: producto.familia,
            precio: producto.precio,
            stock: producto.stock
        });
    };
    
    const formatearPrecio = (precio) => {
      return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€' : '---';
    };
</script>

<template>
  <Head title="F30 Fresa de bisel - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F30 Fresa de bisel</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f30.jpg" alt="Fresa de bisel" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La fresa para biselado F30 destaca como la solución técnica líder para talleres que requieren chaflanes con acabados de alta calidad. Gracias a su configuración como fresa de bisel con ángulo axial, la herramienta logra una entrada progresiva en la pieza, lo que se traduce en una suavidad de corte excepcional y una superficie libre de astillas.</p>
          <p>Al trabajar con esta fresa de bisel de 4 cortes (Z4), se reduce significativamente la carga sobre el motor de la maquinaria en avances mecánicos. Dependiendo del proyecto, puede solicitar esta fresa para biselado en Metal Duro (MD) para una resistencia superior en tableros abrasivos, o en HSS para lograr una nitidez de corte inigualable en maderas naturales. Es la inversión perfecta para quienes exigen precisión industrial y máxima durabilidad en cada proceso de biselado.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Características de nuestra fresa para biselados:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Diseño de 4 cortes (Z4).</span></li>
          <li><span class="text-gray-700 font-normal">Fresa de bisel fabricada en MD (carburo de tungsteno) o HSS.</span></li>
          <li><span class="text-gray-700 font-normal">Apta para avance mecánico (bajo pedido para avance manual)</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Aplicación:</h2>
        <p>Esta fresa para mecanizar y biselar con ángulo axial cuenta con un cuerpo fabricado en aleación de acero de alta resistencia. Al ser una fresa de bisel con placas soldadas mediante aleación trimetálica y fabricada en CNC de alta precisión, garantizamos una gran estabilidad en la calidad del corte. La herramienta se entrega con todas las especificaciones necesarias para optimizar su proceso de biselado industrial.</p>
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
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.Alpha }}</td>
                <td class="px-4 py-4  text-xs /40 border-l-2 border-blue-100">
                    {{ fila.md ? fila.md.referencia : '---' }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 /40">
                    {{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center /40">
                    <button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button>
                </td>

                <td class="px-4 py-4  text-xs bg-[#fafcfe]/40 border-l-2 border-gray-100">
                    {{ fila.hss ? fila.hss.referencia : '---' }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-gray-900 bg-[#fafcfe]/40">
                    {{ fila.hss ? formatearPrecio(fila.hss.precio) : '---' }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center bg-[#fafcfe]/40">
                    <button v-if="fila.hss" @click="agregarAlCarrito(fila.hss)" class="hover:scale-125 transition-transform">🛒</button>
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
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  .link { text-align: center; }
  a { color: blue; text-decoration: underline;}
</style>