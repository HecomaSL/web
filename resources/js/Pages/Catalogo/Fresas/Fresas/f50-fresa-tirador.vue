<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { useCartStore } from '@/stores/cartStore';
    
    const props = defineProps({
      productos: Array
    });
    
    const cart = useCartStore();

    /**
     * Formato: F50-160A → D=160, Perfil=A
     * No hay material (solo MD), no hay HSS.
     * B varía según perfil: A,B=19 / C,D,E,F=20 / G=21 / H=22
     */
    const bPorPerfil = {
        A: 19, B: 19,
        C: 20, D: 20, E: 20, F: 20,
        G: 21,
        H: 22
    };

    const tablaAgrupada = computed(() => {
        const filas = [];

        props.productos.forEach(prod => {
            // F50-160A → D=160, Perfil=A
            const match = prod.referencia.match(/^F50-(\d{3})([A-Z])$/);
            if (!match) return;

            const diametro = match[1];
            const perfil   = match[2];

            filas.push({
                medidas: {
                    D: diametro,
                    B: bPorPerfil[perfil] ?? '---',
                    d: '50',
                    Z: '4'
                },
                perfil,
                producto: prod
            });
        });

        // Ordenamos por diámetro y luego por perfil alfabético
        return filas.sort((a, b) =>
            parseInt(a.medidas.D) - parseInt(b.medidas.D) ||
            a.perfil.localeCompare(b.perfil)
        );
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
  <Head title="F50 Fresas para tiradores - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F50 Fresas para tiradores</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="images/fresas/f50.png" alt="Fresa para tiradores" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de fresas industriales, ponemos a su disposición la Serie F50, una fresa diseñada para realizar uñeros y tiradores integrados de forma rápida y precisa. Esta herramienta cuenta con Z4 que aseguran un mecanizado limpio en puertas, frentes de cajón y mobiliario moderno de diseño minimalista.</p>
          <p>Fabricada con tecnología de HECOMA®, destaca por sus placas en Metal Duro (MD), ideales para uso universal en materiales duros y abrasivos. Diseñada para trabajar con avance mecánico, la F50 ofrece una estabilidad superior y un acabado profesional, permitiendo prescindir de herrajes externos en proyectos de alta gama.</p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Especificaciones fresa para tiradores:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Fresa tirador especializada en crear perfiles tipo uñero con un mecanizado uniforme</span></li>
          <li><span class="text-gray-700 font-normal">Proporciona un agarre ergonómico y un perfil limpio en cantos vistos.</span></li>
          <li><span class="text-gray-700 font-normal">Diseño de corte estable que reduce vibraciones, ideal para fresa para tiradores en CNC o procesos de avance mecánico</span></li>
          <li><span class="text-gray-700 font-normal">Compatible con madera maciza, MDF, tableros rechapados y melamina</span></li>
        </ul>
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
                <th class="px-3 py-4 text-center font-extrabold">Ø</th>
                <th class="px-3 py-4 text-center font-extrabold">B</th>
                <th class="px-3 py-4 text-center font-extrabold">d</th>
                <th class="px-3 py-4 text-center font-extrabold">Z</th>
                <th class="px-3 py-4 text-center font-extrabold">Perfil</th>
                <th class="px-4 py-4 border-l-2 border-blue-100 font-bold">Ref MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 font-bold">Precio MD</th>
                <th v-if="$page.props.auth.user" class="px-4 py-4 text-center font-bold">Añadir carrito</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="(fila, idx) in tablaAgrupada" :key="idx" class="hover:bg-blue-50/50 transition-colors">
                <td class="px-3 py-4 text-center">{{ fila.medidas.D }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.B }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.d }}</td>
                <td class="px-3 py-4 text-center text-gray-600">{{ fila.medidas.Z }}</td>
                <td class="px-3 py-4 text-center text-gray-600 font-medium">{{ fila.perfil }}</td>
                <td class="px-4 py-4 text-xs border-l-2 border-blue-100">
                  {{ fila.producto.referencia }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4">
                  {{ formatearPrecio(fila.producto.precio) }}
                </td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center">
                  <button @click="agregarAlCarrito(fila.producto)" class="hover:scale-125 transition-transform">🛒</button>
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
  h3 { line-height: 1.2; }
  .link { text-align: center; }
  a { color: blue; text-decoration: underline;}
</style>