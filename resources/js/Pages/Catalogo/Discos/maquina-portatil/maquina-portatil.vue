<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 6.1': [] }
  for (const item of props.products) {
    groups['Serie 6.1'].push(item)
  }

  // Ordenar cada grupo por diámetro, luego por espesor
  for (const key in groups) {
    groups[key].sort((a, b) => {
      const pa = parseRef(a.referencia)
      const pb = parseRef(b.referencia)
      if (pa.diametro !== pb.diametro) return pa.diametro - pb.diametro
      return pa.espesor - pb.espesor
    })
  }

  return groups
})

function parseRef(ref) {
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d{2})A$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }

  const tipo = 'Alterno'
  let eje 
  if(parseInt(match[3])===12)
    eje='12.75'
  else
    eje=parseInt(match[3])
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
  return precio ? parseFloat(precio).toLocaleString('es-ES', { minimumFractionDigits: 2 }) + ' €' : '---'
}
</script>

<template>
  <Head title="Serie 6.1 Discos Para Máquina Portatil - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 6.1 Discos Para Máquina Portatil.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>La Serie 6.1 se consolida como la solución definitiva en discos para máquina portátil, específicamente diseñados para el profesional que exige un corte preciso, seguro y de alto rendimiento en entornos de obra y taller.</p>
          <p>Gracias a su avanzada ingeniería, estos discos están optimizados para ofrecer una estabilidad dinámica superior, reduciendo drásticamente las vibraciones y garantizando un manejo ergonómico en herramientas electroportátiles e inalámbricas.</p>
          <p>El diseño destaca por su geometría de diente de bajo rozamiento, lo que reduce la carga mecánica sobre el motor de la herramienta.</p>
          <p>Esta característica es vital para optimizar la autonomía en máquinas de batería, permitiendo realizar un mayor número de cortes por carga sin sacrificar la velocidad de avance.</p>
        </div>
    </div>
    <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>Además, el cuerpo de la sierra ha sido rectificado con tolerancias industriales para evitar el «serpenteo» durante el corte manual, asegurando una trayectoria rectilínea y un acabado limpio incluso en maderas de construcción, tableros de encofrado o materiales compuestos.</p>
        <p>Con HECOMA, usted asegura una inversión en herramientas de corte industrial que combinan robustez técnica con la agilidad necesaria para los trabajos de montaje más exigentes.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para máquina portátil, adaptado a sierras circulares manuales y equipos similares.</span></li>
            <li><span class="text-gray-700 font-normal">Diseño orientado a un corte estable y controlado, facilitando el trabajo del operario</span></li>
            <li><span class="text-gray-700 font-normal">Alta resistencia del cuerpo del disco para soportar condiciones de trabajo exigentes y uso continuo</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para trabajos de carpintería, montaje y cortes en obra, con resultados fiables y limpios</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para profesionales que buscan un buen equilibrio entre rendimiento, seguridad y facilidad de uso</span></li>
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