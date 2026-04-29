<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 10.1.A': [], 'Serie 10.1.B': [], 'Serie 10.1.C': [] }
  for (const item of props.products) {
    const { espesor } = parseRef(item.referencia)
    let key
    if (parseFloat(espesor) === 4.2)
      key = 'Serie 10.1.C'
    else if (parseFloat(espesor) <= 3.0)
      key = 'Serie 10.1.B'
    else
      key = 'Serie 10.1.A'
    groups[key].push(item)
  }
  return groups
})

function formatearZ(z, diametro) {
  switch (z) {
    case 20: return '18+2'
    case 22: return diametro > 300 ? '18+4' : '20+2'
    case 24: return '20+4'
    case 26: return '24+2'
    case 28: return '24+4'
    case 30: return '24+6'
    case 32: return diametro === 250 ? '30+2' : '28+4'
    case 34: return '28+6'
    case 40: return '34+6'
    case 42: return '36+6'
    default: return String(z)
  }
}

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2,4}(?:\+\d)?)Z(\d{2}(?:\+\d)?)([A-Z])$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }

  const diametro = parseInt(match[1])
  const z = parseInt(match[4])

  let eje
  if (parseInt(match[3]) >= 50)
    eje = parseInt(match[3]) + '+2CH'
  else
    eje = parseInt(match[3])

  return { diametro, espesor: (parseInt(match[2]) / 10).toFixed(1), eje, z: formatearZ(z, diametro), tipo: match[5] === 'A' ? 'Alternos' : match[5] }
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
    <title>Discos para Sierra Múltiple Con Dentones Sin Limitador</title>
    <meta name="description" content="Discos para Sierra Múltiple Con Dentones Sin Limitador. Máximo rendimiento de corte y evacuación de viruta en procesos industriales. Garantía de calidad HECOMA®." />
    <meta name="keywords" content="discos, discos para cortes, discos corte para madera, discos para sierra multiple, discos sierra multiple con dentones, discos sierra multiple con dentones sin limitador de viruta" />
  </Head>

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-5">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 10.1 Discos para Sierra Múltiple Con Dentones Sin Limitador.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La Serie 10.1 representa la máxima potencia en discos para sierra múltiple, equipada con dentones de alto impacto sin limitador para maximizar la capacidad de arranque de material en condiciones extremas.</p>
          <p>Esta serie ha sido diseñada para integrarse en líneas de producción automatizadas y procesos industriales de aserrado primario, donde la prioridad absoluta es un rendimiento de corte masivo y veloz.</p>
          <p>El factor diferencial de esta gama es la incorporación de rascadores laterales de alta eficiencia diseñados por HECOMA®, los cuales cumplen una doble función crítica: garantizan una evacuación de viruta superior, evitando el embotamiento, y actúan como refrigeradores activos que reducen drásticamente la fricción lateral.</p>
        </div>
    </div>
    <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
      <p>Gracias a esta ingeniería, los discos de la Serie 10.1 mantienen una estabilidad térmica excepcional, evitando desviaciones en el corte y permitiendo un avance fluido y continuo en el seccionado de madera maciza, incluso en maderas verdes o con altos niveles de humedad donde otros discos fallan por sobrecalentamiento.</p>
    </div>
    </section>
    <section class="container mx-auto px-6 mb-10">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para sierra múltiple, optimizado para trabajos de producción continua.</span></li>
            <li><span class="text-gray-700 font-normal">Dentones sin limitador para maximizar la capacidad de corte y aumentar el rendimiento</span></li>
            <li><span class="text-gray-700 font-normal">Diseñados para un corte agresivo y constante, ideal para despiece y mecanizados intensivos</span></li>
            <li><span class="text-gray-700 font-normal">Alta resistencia y estabilidad del cuerpo del disco para soportar altas cargas de trabajo</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones industriales donde se prioriza la velocidad y la productividad</span></li>
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