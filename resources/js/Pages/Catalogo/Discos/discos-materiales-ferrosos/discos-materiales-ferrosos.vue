<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { useCartStore } from '@/stores/cartStore'

const cart = useCartStore()
const props = defineProps({ products: { type: Array, default: () => [] } })

const groupedProducts = computed(() => {
  const groups = { 'Serie 7.1': [] }
  for (const item of props.products) {
    groups['Serie 7.1'].push(item)
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
  const match = ref.match(/^D(\d{3})(\d{2})(\d{2})Z(\d{2,3})$/)
  if (!match) return { diametro: '-', espesor: '-', eje: '-', z: '-', tipo: '-' }

  const tipo = 'PS'

  return { diametro: parseInt(match[1]), espesor: parseInt(match[2]), eje:  parseInt(match[3]), z: parseInt(match[4]), tipo }
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
  <Head title="Serie 8.1 Discos para materiales ferrosos - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Serie 8.1 Discos para materiales ferrosos.</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
        <div class="img overflow-hidden shadow-md">
          <img src="/images/discos/discos.jpg" alt="" style="width: 75%;" />
        </div>
        <div class="space-y-4 text-gray-700">
          <p>Dentro de nuestra gama de Discos para materiales ferrosos, ponemos a su disposición la Serie 8.1, compuesta por herramientas de alta resistencia diseñadas para ofrecer un corte preciso, seguro y eficiente en aplicaciones profesionales e industriales.</p>
          <p>Estos discos están específicamente desarrollados para trabajar sobre aceros y otros metales ferrosos, garantizando un rendimiento constante incluso en las condiciones más exigentes.</p>
          <p>La tecnología de los discos para materiales ferrosos se basa en el uso de dientes de carburo metálico de alta tenacidad, capaces de seccionar el acero con una generación mínima de calor.</p>
          <p>Al realizar un «corte en frío», se evita la alteración térmica de la estructura del metal y se eliminan prácticamente las chispas y el polvo abrasivo, creando un entorno de trabajo mucho más limpio y seguro que los discos de resina convencionales</p>
        </div>
      </div>
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed">
        <p>El cuerpo de la sierra está diseñado con ranuras de expansión láser que absorben las vibraciones, permitiendo que el disco mantenga su rigidez estructural frente a la resistencia del material ferroso.</p>
        <p>Gracias a la calidad de fabricación de HECOMA®, esta serie asegura una larga vida útil del filo y una estabilidad superior durante el proceso de corte, convirtiéndose en la opción ideal para talleres metálicos y entornos de producción que requieren fiabilidad y una excelente terminación en cada pieza.</p>
      </div>

    </section>
    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Estas son las especificaciones</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Disco específico para el corte de materiales ferrosos, como acero y derivados</span></li>
            <li><span class="text-gray-700 font-normal">Geometría de diente adaptada para un corte estable y controlado en metal</span></li>
            <li><span class="text-gray-700 font-normal">Alta resistencia del cuerpo del disco para soportar altas cargas y trabajos intensivos</span></li>
            <li><span class="text-gray-700 font-normal">Recomendados para aplicaciones industriales donde se requiere precisión y fiabilidad en el corte de metal</span></li>
            <li><span class="text-gray-700 font-normal">Ideales para uso en sierras circulares y equipos específicos para el mecanizado de materiales ferrosos</span></li>
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