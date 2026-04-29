<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 11.3.A': [], 'Serie 11.3.B': [] }
  for (const item of props.products) {
    const parsed = parseRef(item.referencia)
    const key = parsed.serie
    groups[key].push(item)
  }
  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2,4})Z(\d+)(AS|PTS)$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-', serie: 'Serie 11.3.A' }

  const sufijo = match[5]
  const serie  = sufijo === 'AS' ? 'Serie 11.3.A' : 'Serie 11.3.B'
  const tipo   = sufijo === 'AS' ? 'Alterno Silenciado' : 'PT SIL'

  return { diametro: parseInt(match[1]), espesor: (parseInt(match[2]) / 10).toFixed(1), eje: parseInt(match[3]), z: parseInt(match[4]), tipo, serie }
}

function agregarAlCarrito(product) {
  if (!product)
    return
  cart.addToCart({ id: product.id, referencia: product.referencia, tipo: product.tipo, familia: product.familia, precio: product.precio, stock: product.stock })
}

function formatearPrecio(precio) {
  return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + ' €' : '---' }
</script>

<template>
  <Head>
    <title>Discos silenciosos para seccionadora, laminados y bilaminados | Discos Sileciosos</title>
    <meta name="description" content="Discos silenciados para seccionadora y materiales laminados. Corte limpio, preciso y con reducción de ruido para acabados de alta calidad. Garantía industrial HECOMA®." />
    <meta name="keywords" content="discos, discos para cortes, discos corte para madera, discos silenciosos, discos silenciados, discos silenciosos para seccionadora, discos silenciosos para laminados, discos silenciosos para laminados y bilaminados" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 11.3 Discos silenciosos para seccionadora, laminados y bilaminados.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Especializada en el tratamiento de superficies delicadas, la Serie 11.3 ofrece una solución avanzada en discos silenciosos para máquinas seccionadoras, optimizados específicamente para el corte de tableros laminados y bilaminados.</p>
          <p>Esta serie incorpora la tecnología de amortiguación de HECOMA®, diseñada para neutralizar las vibraciones de alta frecuencia que suelen causar el astillado en los recubrimientos melamínicos y sintéticos. Al estabilizar el cuerpo del disco durante el avance industrial, se garantiza un acabado impecable y aristas vivas en ambas caras del tablero, minimizando el desperdicio de material.</p>
          <p>Gracias a su diseño silenciado, no solo se incrementa el confort acústico en las líneas de producción intensiva, sino que se logra una máxima durabilidad del filo al reducir la fricción térmica. Es la herramienta técnica indispensable para el seccionado de precisión donde se requiere la combinación perfecta entre un entorno de trabajo saludable y una calidad de acabado de alto nivel.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Disco silenciado para disminuir el ruido y mejorar la estabilidad en seccionadora.</span></li>
          <li><span class="text-gray-700 font-normal">Recomendado para el corte de laminados y bilaminados, optimizando la calidad del canto y reduciendo el riesgo de astillado</span></li>
          <li><span class="text-gray-700 font-normal">Geometría de diente orientada a un acabado superior en superficies decorativas y piezas vistas</span></li>
          <li><span class="text-gray-700 font-normal">Alta precisión y repetitividad en cortes rectos, ideal para trabajos en serie y fabricación de mobiliario</span></li>
          <li><span class="text-gray-700 font-normal">Configuración disponible en PTS (no PT), para adaptarse a distintas necesidades de corte y acabado</span></li>
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