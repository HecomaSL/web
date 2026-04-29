<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 1.5.A': [], 'Serie 1.5.B': [], 'Serie 1.5.C': [] }
  for (const item of props.products) {
    const { espesor } = parseRef(item.referencia)
    let key
    if (parseFloat(espesor) === 4.0)      key = 'Serie 1.5.C'
    else if (parseFloat(espesor) <= 3.0)  key = 'Serie 1.5.B'
    else                                   key = 'Serie 1.5.A'
    groups[key].push(item)
  }
  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d+)([A-Z])$/)
  if (!match)
    return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }
  return { diametro: parseInt(match[1]), espesor: (parseInt(match[2]) / 10).toFixed(1), eje: parseInt(match[3]), z: parseInt(match[4]), tipo: match[5] === 'A' ? 'Alternos' : match[5] }
}

function agregarAlCarrito(product) {
  if (!product) 
    return
  cart.addToCart({ id: product.id, referencia: product.referencia, tipo: product.tipo, familia: product.familia, precio: product.precio, stock: product.stock })
}

function formatearPrecio(precio) {
  return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + ' €' : '---'
}
</script>

<template>
  <Head>
    <title>Discos de Paso Fino para Acabados | Discos de Corte de Tablero</title>
    <meta name="description" content="Discos Serie 1.5 de paso fino para acabados de máxima calidad. Reducen marcas y astillados en materiales delicados. La solución de HECOMA® para cortes de terminación profesional en tableros." />
    <meta name="keywords" content="discos, discos para cortes, discos corte para madera, discos corte de tablero, discos paso fino, discos paso fino para acabados" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.5 Discos De Paso Fino Para Acabados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
          <p>Dentro de nuestra línea de Discos de corte de tablero, ponemos a su disposición la Serie 1.5, una referencia de paso fino diseñada específicamente para obtener un acabado limpio y preciso.</p>
          <p> Estos discos son la herramienta indispensable en cortes donde se requiere la máxima calidad de terminación, logrando reducir significativamente los astillados y las marcas mecánicas en el material.</p>
          <p>La clave de esta serie reside en una configuración de dientes estrechamente espaciados y un afilado de alta precisión, diseñado para minimizar la fricción y el impacto sobre la superficie del tablero.</p>
          <p>Son especialmente eficaces en el seccionado de melaminas, chapados naturales y tableros con recubrimientos delicados que tienden a astillarse con discos convencionales.</p>
        </div>
      </div>
      <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed ">
          <p>Al utilizar esta serie, el profesional asegura una arista perfecta y una línea de corte libre de imperfecciones, optimizando los tiempos de producción al eliminar procesos posteriores de lijado o rectificado.</p>
          <p>Gracias a la ingeniería de HECOMA®, esta serie ofrece una estabilidad de corte superior, permitiendo un seccionado suave y delicado incluso en los revestimientos más exigentes. Es la elección perfecta para carpinteros y fabricantes de mobiliario que priorizan una estética impecable y un montaje final sin necesidad de repasos.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed ">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Diseño de paso fino para un corte suave y de alta calidad</span></li>
            <li><span class="text-gray-700 font-normal">Mayor número de dientes para mejorar el acabado y minimizar vibraciones</span></li>
            <li><span class="text-gray-700 font-normal">Recomendado para trabajos de acabado en materiales delicados o visibles</span></li>
            <li><span class="text-gray-700 font-normal">Corte optimizado para obtener bordes limpios y uniformes</span></li>
          </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Medidas disponibles</h2>        
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto">

        <template v-for="(items, familia) in groupedProducts" :key="familia">
          <div class="group-header">{{ familia }}</div>
          <table class="product-table">
            <thead>
              <tr>
                <th>Ref</th>
                <th>Ø</th>
                <th>Espesor</th>
                <th>Eje</th>
                <th>Z</th>
                <th>Tipo de diente</th>
                <th v-if="$page.props.auth.user">Precio</th>
                <th v-if="$page.props.auth.user">Añadir al carrito</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.referencia">
                <td class="ref">{{ item.referencia }}</td>
                <td>{{ parseRef(item.referencia).diametro }}</td>
                <td>{{ parseRef(item.referencia).espesor }}</td>
                <td>{{ parseRef(item.referencia).eje }}</td>
                <td>{{ parseRef(item.referencia).z }}</td>
                <td>{{ parseRef(item.referencia).tipo }}</td>
                <td v-if="$page.props.auth.user" class="precio">{{ formatearPrecio(item.precio) }}</td>
                
                <td v-if="$page.props.auth.user"><button :disabled="item.stock !== 'si'" @click="agregarAlCarrito(item)">🛒</button></td>
              </tr>
            </tbody>
          </table>
        </template>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
p { text-align: justify; line-height: 1.6; }
h2 { line-height: 1.2; }
h3 { line-height: 1.2; }
.img { display: flex; justify-content: center; }
.group-header {  background-color: #cce0f0; padding: 6px 12px; font-weight: 600; font-size: 0.85rem; color: #1a3a5c; border-top: 1px solid #a8c8e8; border-bottom: 1px solid #a8c8e8; margin-top: 16px; }
.product-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
.product-table thead tr { background: #f5f5f5; border-bottom: 2px solid #ddd; }
.product-table th { padding: 8px 12px; text-align: left; font-weight: 600; color: #444; white-space: nowrap; }
.product-table tbody tr { border-bottom: 1px solid #eee; transition: background 0.15s; }
.product-table tbody tr:hover { background: #f9f9f9; }
.product-table td { padding: 7px 12px; color: #333; }
.ref { font-family: monospace; font-size: 0.8rem; color: #555; }
.precio { font-weight: 600; color: #1a3a5c; }
.stock-badge { font-weight: 700; font-size: 1rem; }
.stock-badge.in-stock { color: #2e7d32; }
.stock-badge.no-stock { color: #c62828; }
.cart-btn { background: #010cf7; color: white; border: none; padding: 5px 12px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; transition: background 0.15s; }
.cart-btn:hover:not(:disabled) { background: #0009c0; }
.cart-btn:disabled { background: #ccc; cursor: not-allowed; }
</style>