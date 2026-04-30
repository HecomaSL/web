<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 2.3': [] }
  for (const item of props.products) {
    const key  = 'Serie 2.3'
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
    <title>Discos para Cortes de Alta Precisión | Discos de Aplicaciones Especiales</title>
    <meta name="description" content="Discos para cortes de alta exactitud y máxima estabilidad. Garantice acabados limpios en aplicaciones exigentes con tecnología industrial de HECOMA®. Herramientas de precisión para profesionales." />
    <meta name="keywords" content="discos, discos para cortes, discos corte para madera, discos para cortes de alta precision, discos aplicaciones especiales" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 2.3 Discos para cortes de alta precisión.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos de aplicaciones especiales, ponemos a su disposición la Serie 2.3, una referencia técnica diseñada específicamente para realizar cortes de alta precisión.</p>
          <p>Esta herramienta es la solución definitiva para aplicaciones exigentes donde se requiere un resultado limpio, estable y con una excelente calidad de acabado.</p>
          <p>La superioridad de los discos para cortes de alta precisión radica en un proceso de equilibrado dinámico y tensión de hoja individualizado, lo que permite trabajar en rangos de tolerancia extremadamente reducidos sin pérdida de linealidad.</p>
          <p>La disposición de sus ranuras de dilatación cortadas por láser con relleno de resina absorbe las micro-vibraciones y el ruido, manteniendo el disco perfectamente plano incluso bajo condiciones de fricción elevada.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed ">
        <p>Esto se traduce en una superficie de corte con calidad de espejo, ideal para materiales compuestos, plásticos técnicos o maderas preciosas donde cualquier desviación milimétrica arruinaría la pieza. Al elegir esta serie, el profesional se asegura una repetibilidad exacta en cada pasada, minimizando el desperdicio de material crítico.</p>
        <p>Gracias a los estándares de fabricación de HECOMA®, estos discos minimizan las desviaciones y vibraciones durante el proceso de corte, asegurando una geometría perfecta en cada pieza. Es la elección predilecta para trabajos de carpintería técnica y seccionado de precisión, donde la tolerancia al error es mínima y la terminación profesional es el objetivo principal.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Diseñados para obtener un corte extremadamente preciso y controlado</span></li>
          <li><span class="text-gray-700 font-normal">Geometría de diente optimizada para reducir vibraciones y mejorar la estabilidad</span></li>
          <li><span class="text-gray-700 font-normal">Recomendados para materiales donde se requiere un acabado perfecto y alta repetitividad</span></li>
          <li><span class="text-gray-700 font-normal">Ideal para trabajos de carpintería técnica, corte fino y aplicaciones profesionales.</span></li>
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
.group-header { background-color: #cce0f0; padding: 6px 12px;font-weight: 600; font-size: 0.85rem; color: #1a3a5c; border-top: 1px solid #a8c8e8; border-bottom: 1px solid #a8c8e8; margin-top: 16px; }
.product-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
.product-table thead tr { background: #f5f5f5; border-bottom: 2px solid #ddd; }
.product-table th { padding: 8px 12px; text-align: left; font-weight: 600; color: #444; white-space: nowrap; }
.product-table tbody tr { border-bottom: 1px solid #eee; transition: background 0.15s; }
.product-table tbody tr:hover { background: #f9f9f9; }
.product-table td {padding: 7px 12px; color: #333; }
.ref { font-family: monospace; font-size: 0.8rem; color: #555; }
.precio { font-weight: 600; color: #1a3a5c; }
.stock-badge { font-weight: 700; font-size: 1rem; }
.stock-badge.in-stock { color: #2e7d32; }
.stock-badge.no-stock { color: #c62828; }
.cart-btn { background: #010cf7; color: white; border: none; padding: 5px 12px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; transition: background 0.15s; }
.cart-btn:hover:not(:disabled) { background: #0009c0; }
.cart-btn:disabled {background: #ccc; cursor: not-allowed; }
</style>