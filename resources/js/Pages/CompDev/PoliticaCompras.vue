<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Política de compras - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Política de compras</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">1. Identificación</h2>
        <p>Vendedor: HERRAMIENTAS DE CORTE PARA LA MADERA S.L.</p>
        <p>Email: <a href="mailto:">dptocomercial@hecoma.com</a></p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">2. Productos</h2>
        <p>Ofrecemos herramientas de corte para madera. Las imágenes y descripciones son orientativas; intentamos que la información sea lo más precisa posible.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">3. Precios e impuestos</h2>
        <p>Los precios se muestran en EUR e incluyen los impuestos aplicables (IVA). Los gastos de envío se mostrarán antes de confirmar el pedido.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">4. Cómo comprar</h2>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
            <li><span class="text-gray-700 font-normal">1) Selecciona productos y añádelos al carrito</span></li>
            <li><span class="text-gray-700 font-normal">2) Introduce datos de envío y facturación</span></li>
            <li><span class="text-gray-700 font-normal">3) Confirma el pedido</span></li>
            <li><span class="text-gray-700 font-normal">4) Recibirás un email con el resumen y las instrucciones de pago</span></li>
        </ul>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">5. Método de pago: transferencia bancaria</h2>
        <p>El pago se realiza mediante transferencia bancaria a la cuenta que se indicará al finalizar la compra.</p>
        <p>El pedido se considerará confirmado cuando el importe haya sido recibido/confirmado. Si no recibimos el pago en 7 días naturales, podremos cancelar el pedido.</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">6. Envíos</h2>
        <p>Zonas de envío: España (Península y Baleares).</p>
        <p>Plazo estimado de entrega: 48–72 horas laborables desde la confirmación del pago, en el caso de productos marcados en stock, salvo incidencias logísticas o festivos.</p>
        <p>Plazo estimado para productos sin stock: 3-9 semanas</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">7. Seguimiento y entrega</h2>
        <p>Si el envío incluye seguimiento, lo recibirás por email. El cliente es responsable de facilitar una dirección correcta y accesible</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">8. Cancelaciones</h2>
        <p>Puedes solicitar la cancelación por email a <a href="mailto:dptocomercial@hecoma.com">dptocomercial@hecoma.com</a>. Antes de que el pedido sea enviado: lo cancelamos sin problema. Si ya ha sido enviado: se tramitará como devolución conforme a la Política de Devoluciones</p>
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">9. Atención al cliente</h2>
        <p>Para dudas sobre pedidos, facturación o envíos: <a href="mailto:dptocomercial@hecoma.com">dptocomercial@hecoma.com</a> (incluye tu número de pedido).</p>        
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
  a { color:blue; }
</style>