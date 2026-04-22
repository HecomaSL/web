<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'
const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 1.2.A': [], 'Serie 1.2.B': [], 'Serie 1.2.C': [] }
  for (const item of props.products) {
    const { espesor } = parseRef(item.referencia)
    let key
    if (parseFloat(espesor) === 4.0)
      key='Serie 1.2.C'
    else if(parseFloat(espesor) <= 3.0)
      key='Serie 1.2.B'
    else 
      key='Serie 1.2.A'
    groups[key].push(item)
  }
  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d+)([A-Z])$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }
  return {
    diametro: parseInt(match[1]),
    espesor: (parseInt(match[2]) / 10).toFixed(1),
    eje: parseInt(match[3]),
    z: parseInt(match[4]),
    tipo: match[5] === 'A' ? 'Alternos' : match[5]
  }
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
  <Head title="Serie 1.2 Discos para corte universal - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 1.2 Discos para corte universal.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>En HECOMA, entendemos que la eficiencia en el taller depende de la calidad de la herramienta. Nuestra serie de discos de corte universal ha sido desarrollada para ofrecer una solución integral a profesionales que requieren realizar cortes limpios en una amplia variedad de materiales sin necesidad de cambiar de herramienta constantemente.</p>
          <p>Estos discos han sido diseñados con una geometría de diente optimizada y aleaciones de alta resistencia, lo que garantiza una estabilidad térmica superior incluso en jornadas de trabajo intensivas. Gracias a su versatilidad, podrá alternar entre maderas naturales, derivados y materiales sintéticos manteniendo una precisión constante y reduciendo drásticamente los tiempos de parada por cambio de sierra. Es la inversión ideal para talleres que buscan simplificar su inventario de herramientas sin renunciar a la excelencia técnica que exigen sus clientes.</p>
          <p>Si busca maximizar su productividad con una herramienta polivalente que no comprometa la calidad del acabado, la gama de discos universales de HECOMA es su mejor aliado estratégico.</p>
        </div>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones:</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">El ángulo de ataque de estos discos es de 12º</span></li>
            <li><span class="text-gray-700 font-normal">Dentado alterno con 10º de inclinación</span></li>
            <li><span class="text-gray-700 font-normal">Ancho de diente entre 2,5 mm y 5,5 mm</span></li>
            <li><span class="text-gray-700 font-normal">Diámetros entre 100 mm y 550 mm</span></li>
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
                <th>Precio</th>
                <th>Añadir al carrito</th>
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
                <td class="precio">{{ formatearPrecio(item.precio) }}</td>
                
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