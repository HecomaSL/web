<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 3.2': [] }
  for (const item of props.products) {
    const parsed = parseRef(item.referencia)
    const key = parsed.B === 32 ? 'Serie 3.2' : 'Serie 3.2'
    groups[key].push(item)
  }
  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d{2})([A-Z])$/)
  if (!match) return { diametro: '-', B: '-', d: '-', z: '-', tipo: '-' }

  const tipo = match[5] === 'A' ? 'Alterno' : match[5] === 'R' ? 'Dx' : 'Sx'

  return { diametro: parseInt(match[1]), B: parseInt(match[2]), d: parseInt(match[3]), z: parseInt(match[4]), tipo }
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
  <Head title="Serie 3.2 Incisores cónicos para marcos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 3.2 Incisores cónicos para marcos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Incisores, ponemos a su disposición la Serie 3.2, formada por incisores cónicos para marcos diseñados para garantizar un pre-corte preciso y un acabado limpio. Esta herramienta es fundamental en trabajos de carpintería donde el ajuste y la calidad visual de la unión son críticos para el resultado final.</p>
          <p>La ventaja operativa reside en su perfil cónico rectificado, que ofrece una versatilidad superior al permitir la regulación del ancho de incisión mediante el ajuste vertical del eje. Esta característica facilita una alineación milimétrica con la sierra principal, asegurando que el ataque sobre la moldura sea siempre exacto y libre de rebabas, incluso en maderas con fibras cruzadas o recubrimientos sintéticos.</p>
          <p>Al optimizar la salida del diente, estos incisores protegen la integridad de las aristas más delicadas del marco, garantizando que el ensamblaje posterior sea estanco y no requiera masillas ni repasos manuales. Es la herramienta de precisión necesaria para elevar el estándar de calidad en líneas de producción de marcos y molduras de gama alta.</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
          <p>Gracias a la ingeniería de HECOMA®, su diseño cónico permite adaptarse perfectamente al mecanizado de piezas destinadas a marcos, mejorando la limpieza del corte y la estabilidad del proceso. Es la solución ideal para evitar desgarros en las fibras y asegurar que cada ángulo presente una terminación profesional e impecable, libre de astillados en las zonas de mayor visibilidad.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Incisor cónico específico para el trabajo en marcos</span></li>
            <li><span class="text-gray-700 font-normal">Diseñado para realizar un pre-corte preciso, reduciendo el riesgo de astillado</span></li>
            <li><span class="text-gray-700 font-normal">Mejora la calidad del acabado en piezas vistas y zonas de ensamblaje</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para su uso en seccionadoras y equipos de corte destinados a la fabricación de marcos.</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para aplicaciones profesionales donde se requiere precisión y estabilidad en el mecanizado.</span></li>
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
                <th>B</th>
                <th>d</th>
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
                <td>{{ parseRef(item.referencia).B }}</td>
                <td>{{ parseRef(item.referencia).d }}</td>
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