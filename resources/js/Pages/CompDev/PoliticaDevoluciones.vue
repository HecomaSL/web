<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Política de devoluciones - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Política de devoluciones</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. Identificación del vendedor</h2>
        <p>Vendedor: HERRAMIENTAS DE CORTE PARA LA MADERA S.L.</p>
        <p>Email: <a href="mailto:dptocomercial@hecoma.com">dptocomercial@hecoma.com</a></p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. Derecho de desistimiento (14 días)</h2>
        <p>Si compras como consumidor/a, puedes desistir de la compra en un plazo de 14 días naturales desde la recepción del pedido, sin necesidad de justificación.</p>
        <p>Para ejercer el desistimiento, envía un email a <a href="mailto:dptocomercial@hecoma.com">dptocomercial@hecoma.com</a> indicando:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">Número de pedido</span></li>
            <li><span class="text-gray-700 font-normal">Nombre y apellidos</span></li>
            <li><span class="text-gray-700 font-normal">Productos a devolver</span></li>
            <li><span class="text-gray-700 font-normal">Fecha de recepción</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Condiciones de la devolución</h2>
        <p>El producto debe devolverse en perfecto estado, sin usar más allá de la manipulación necesaria para comprobar su naturaleza y funcionamiento, y con su embalaje, accesorios y documentación.</p>
        <p>Si el producto presenta signos de uso, daños o falta de elementos, podremos aplicar una deducción por depreciación.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">4. Costes de devolución</h2>
        <p>Devoluciones por desistimiento: los gastos de devolución corren a cargo del cliente.</p>
        <p>Producto defectuoso o envío incorrecto: asumiremos los gastos de recogida/devolución y gestionaremos el reemplazo o reembolso</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">5. Procedimiento</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">1) Solicita la devolución por email a dptocomercial@hecoma.com</span></li>
            <li><span class="text-gray-700 font-normal">2) Te indicaremos la dirección de devolución e instrucciones de embalaje (especialmente importante en herramientas de corte)</span></li>
            <li><span class="text-gray-700 font-normal">3) Envía el producto debidamente protegido y embalado</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">6. Reembolso</h2>
        <p>Una vez recibidos los productos y revisado su estado, realizaremos el reembolso en un plazo máximo de 14 días naturales desde la comunicación del desistimiento. Podremos retener el reembolso hasta recibir los bienes o hasta que se acredite su devolución. El reembolso se realizará por el mismo medio de pago, salvo acuerdo expreso.</p>
        <p>Gastos de envío iniciales: si devuelves el pedido completo, reembolsaremos el coste del envío estándar (si lo hubiera) y no se reembolsarán servicios adicionales (urgente, entrega concertada, etc.).</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">7. Excepciones</h2>
        <p>El desistimiento no aplica en los supuestos legalmente previstos, entre ellos productos personalizados o hechos a medida y otros supuestos contemplados por la normativa vigente. Si algún producto quedase fuera del desistimiento, se indicará expresamente en su ficha.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">8. Productos defectuosos, dañados o incorrectos</h2>
        <p>Si el producto llega dañado, defectuoso o no corresponde con tu pedido, contacta con nosotros en dptocomercial@hecoma.com lo antes posible, adjuntando: no de pedido, descripción del problema y fotos del producto y del embalaje.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">9. Contacto</h2>
        <p>Email: <a href="mailto:dptocomercial@hecoma.com">dptocomercial@hecoma.com</a></p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  a { color: blue; }
</style>