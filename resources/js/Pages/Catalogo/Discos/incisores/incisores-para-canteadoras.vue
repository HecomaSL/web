<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 3.5': [] }
  for (const item of props.products) {
    const parsed = parseRef(item.referencia)
    const key = parsed.B === 32 ? 'Serie 3.5' : 'Serie 3.5'
    groups[key].push(item)
  }
  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d{2})([A-Z])$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }

  const tipo = match[5] === 'A' ? 'Alterno' : match[5] === 'R' ? 'Dx 10' : 'Sx 10'
  let eje 
  if (parseInt(match[2]) === 36)
    eje = parseInt(match[3])+'+4f' 
  else 
    eje = parseInt(match[3])
  return { diametro: parseInt(match[1]), espesor: parseInt(match[2]), eje, z: parseInt(match[4]), tipo }
}

function agregarAlCarrito(product) {
  if (!product) return
  cart.addToCart({
    id: product.id,
    referencia: product.referencia,
    tipo: product.tipo,
    familia: product.familia,
    precio: product.precio,
    stock: product.stock
  })
}

function formatearPrecio(precio) {
  return precio
    ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + ' €'
    : '---'
}
</script>

<template>
  <Head title="Serie 3.5 Incisores para canteadoras - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 3.5 Incisores para canteadoras.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Incisores, ponemos a su disposición la Serie 3.5, formada por incisores para canteadoras diseñados para optimizar la calidad del mecanizado en los bordes del panel. Estos componentes son esenciales para realizar un pre-corte preciso antes de la aplicación del canto, eliminando astillados y garantizando un acabado limpio y uniforme.</p>
          <p>La ingeniería avanzada de los incisores para canteadoras se centra en la perfecta evacuación de la viruta y la reducción del impacto térmico sobre el adhesivo del panel. Al generar una superficie de contacto totalmente plana y libre de micro-fisuras, estos incisores facilitan una aplicación del canto mucho más hermética, lo que se traduce en una unión prácticamente invisible y altamente resistente a la humedad y al paso del tiempo.</p>
          <p> Su diseño permite trabajar a las altas revoluciones características de los grupos de entrada de las canteadoras automáticas, manteniendo la estabilidad necesaria para procesar desde melaminas estándar hasta laminados de alta presión o polímeros técnicos.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Gracias a la tecnología de HECOMA®, esta serie asegura una base perfecta incluso en materiales revestidos y superficies decorativas, permitiendo que el proceso de canteado posterior sea impecable y de alta resistencia visual.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Incisor específico para canteadoras, optimizado para el trabajo previo al canteado</span></li>
            <li><span class="text-gray-700 font-normal">Mejora la calidad del canto, evitando desconchados y defectos en materiales delicados</span></li>
            <li><span class="text-gray-700 font-normal">Diseñados para ofrecer un corte preciso y estable en procesos continuos</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para el mecanizado de tableros revestidos, melaminas y otros paneles decorativos.</span></li>
            <li><span class="text-gray-700 font-normal">deales para aplicaciones profesionales donde se requiere un acabado perfecto antes del encolado del canto.</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Medidas disponibles</h2>        
        <p>Las referencias marcadas están en stock permanente y seran entregadas en un plazo estimado de entrega de 48–72 horas laborables desde la confirmación del pago. El resto de las referencias se entregan en un plazo máximo entre 3 y 9 semanas. Si necesitas un tamaño o perfil especial, por favor, contáctanos.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
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
                
                <td v-if="$page.props.auth.user">
                  <button :disabled="item.stock !== 'si'" @click="agregarAlCarrito(item)">
                    🛒
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </template>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  .img { display: flex; justify-content: center; }
/* Tabla */
.group-header {
  background-color: #cce0f0;
  padding: 6px 12px;
  font-weight: 600;
  font-size: 0.85rem;
  color: #1a3a5c;
  border-top: 1px solid #a8c8e8;
  border-bottom: 1px solid #a8c8e8;
  margin-top: 16px;
}

.product-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.875rem;
}

.product-table thead tr {
  background: #f5f5f5;
  border-bottom: 2px solid #ddd;
}

.product-table th {
  padding: 8px 12px;
  text-align: left;
  font-weight: 600;
  color: #444;
  white-space: nowrap;
}

.product-table tbody tr {
  border-bottom: 1px solid #eee;
  transition: background 0.15s;
}

.product-table tbody tr:hover {
  background: #f9f9f9;
}

.product-table td {
  padding: 7px 12px;
  color: #333;
}

.ref {
  font-family: monospace;
  font-size: 0.8rem;
  color: #555;
}

.precio {
  font-weight: 600;
  color: #1a3a5c;
}

.stock-badge {
  font-weight: 700;
  font-size: 1rem;
}

.stock-badge.in-stock {
  color: #2e7d32;
}

.stock-badge.no-stock {
  color: #c62828;
}

.cart-btn {
  background: #010cf7;
  color: white;
  border: none;
  padding: 5px 12px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 0.8rem;
  transition: background 0.15s;
}

.cart-btn:hover:not(:disabled) {
  background: #0009c0;
}

.cart-btn:disabled {
  background: #ccc;
  cursor: not-allowed;
}
</style>