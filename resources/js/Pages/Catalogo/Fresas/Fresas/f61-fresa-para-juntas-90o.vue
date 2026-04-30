<script setup>
  import MainLayout from '@/Layouts/MainLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { computed } from 'vue';
  import { useCartStore } from '@/stores/cartStore';
  
  const props = defineProps({ productos: Array });
  const cart = useCartStore();
  const tablaAgrupada = computed(() => {
    if (!props.productos || props.productos.length === 0)
      return [];
    const grupos = {};

    props.productos.forEach(prod => {
      if (!prod.referencia) 
        return;
      const match = prod.referencia.match(/F61-(\d{3})(\d{2})(M|H)/);
      if (match) {
        const diametro = match[1]; 
        const vB = match[2];
        const material = match[3];              
        const baseRef = prod.referencia.slice(0, -1); 

        if (!grupos[baseRef])
          grupos[baseRef] = { medidas: { D: diametro, B: vB, d: '50', Z: '4', }, md: null, hss: null };

        if (material === 'M')
          grupos[baseRef].md = prod;
        else if (material === 'H')
          grupos[baseRef].hss = prod;
      }
    });

    return Object.values(grupos).sort((a, b) => { return parseInt(a.medidas.D) - parseInt(b.medidas.D) || parseInt(a.medidas.B) - parseInt(b.medidas.B); });
  });
  
  const agregarAlCarrito = (producto) => {
      if (!producto)
        return;
      cart.addToCart({
        id: producto.id, referencia: producto.referencia, precio: producto.precio,
        familia: producto.familia || 'F61', stock: producto.stock
      });
  };
  const formatearPrecio = (precio) => { return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + '€' : '---'; };
</script>

<template>
  <Head>
    <title>F61 Fresas para ingletes | Fresas Para Junta a 90º</title>
    <meta name="description" content="Logra uniones invisibles y ultra resistentes con nuestras fresas para ingletes. Perfecta para juntas a 90º en inglete. Fabricación CNC en acero de alta resistencia y carburo para un ajuste milimétrico sin huecos" />
    <meta name="keywords" content="fresa, fresas para ingletes, fresas para juntas, fresas para juntas a 90o" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">F61 Fresa Para Ingletes (Juntas a 90º)</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="overflow-hidden shadow-md">
          <img src="https://hecoma.com/wp-content/uploads/2026/01/f61.png" alt="" style="width: 100%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de fresas para uniones especiales, ponemos a su disposición la Serie F61, una fresa para juntas a 90º (inglete) diseñada para realizar uniones precisas, firmes y con un acabado profesional.</p>
          <p>Esta herramienta cuenta con Z4 que facilitan la creación de esquinas limpias, mejorando drásticamente la alineación y estabilidad en la fabricación de muebles, cajas y marcos.</p>
          <p>Fabricada por HECOMA® con placas de Metal Duro (MD), es ideal para uso universal en materiales duros y abrasivos.</p>
          <p>Optimizada para avance mecánico, la F61 asegura un ensamblaje en ángulo recto perfecto, elevando la calidad técnica de sus estructuras de carpintería.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones de nuestras fresas para juntas a 90º:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Fresa específica para realizar juntas a 90º tipo inglete, logrando un encaje exacto entre las piezas</span></li>
          <li><span class="text-gray-700 font-normal">Facilita uniones estables y resistentes, optimizando el ensamblaje y mejorando el encolado.</span></li>
          <li><span class="text-gray-700 font-normal">Recomendada para trabajos donde se necesita una esquina perfecta con alta calidad de acabado y excelente repetitividad</span></li>
          <li><span class="text-gray-700 font-normal">Diseñada para un mecanizado limpio y estable, reduciendo vibraciones y repasos posteriores</span></li>
          <li><span class="text-gray-700 font-normal">Ideal para aplicaciones de carpintería profesional y fabricación en serie de componentes con uniones angulares</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Referencias disponibles:</h2>
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-24">
      <div class="max-w-6xl mx-auto font-medium text-gray-700">
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
                <td class="px-4 py-4 border-l-2 border-blue-100">{{ fila.md ? fila.md.referencia : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 font-semibold">{{ fila.md ? formatearPrecio(fila.md.precio) : '---' }}</td>
                <td v-if="$page.props.auth.user" class="px-4 py-4 text-center"><button v-if="fila.md" @click="agregarAlCarrito(fila.md)" class="hover:scale-125 transition-transform">🛒</button><span v-else class="text-gray-600">---</span></td>
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