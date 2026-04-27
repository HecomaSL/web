<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="POLITICA DE PROTECCION DE DATOS | HECOMA" />
  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div id="divh1" class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">POLITICA DE PROTECCION DE DATOS</h1>
      </div>
    </section>

    <section class="max-w-6xl container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Cómo usa HECOMA® tus datos?</h2>
        <p>Nuestro Interés Legítimo es nuestra relación comercial, ofrecerte nuestros servicios y productos.</p>
        <p>Únicamente recogemos los datos que tú mismo nos proporcionas al darte de alta como cliente. No hay ningún uso mas allá de emitir y hacerte llegar documentos contables (albaranes, notas de entrega, facturas, pedidos …). No hacemos tratamiento personalizado de ningún tipo en nuestra web.</p>
        <p>Tú siempre conservas el control sobre los usos que podemos hacer de tus datos (derechos ARCO. Más información en la sección: <a href="#derechos">¿Qué derechos incluye el RGPD y la LOPD?)</a></p>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Qué medidas toma HECOMA® para proteger tus datos?</h2>
      <div class="space-y-4 text-gray-700">
        <p>Se aplican todas las medidas exigidas por la ley Española (LOPD), por el nuevo reglamento y algunas adicionales. Entre ellas podemos destacar:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Aplicaciones con datos centralizadas en servidor en nube, por lo que los datos personales en equipos locales se minimiza al máximo</span></li>
          <li><span class="text-gray-700 font-normal">Copias de seguridad cifradas de los equipos con acceso a datos. El almacenamiento de estas copias es local y en la nube.</span></li>
          <li><span class="text-gray-700 font-normal">El alojamiento en Nube contratado está localizado en servidores y proveedores Europeos que siguen estrictamente lo indicado en el RGPD</span></li>
          <li><span class="text-gray-700 font-normal">El acceso a terminales con datos está protegido por contraseñas robustas y conforme a ley.</span></li>
          <li><span class="text-gray-700 font-normal">Solo pueden acceder a los datos el personal autorizado para ello, identificándose y con su contraseña personal.</span></li>
          <li><span class="text-gray-700 font-normal">Todos los equipos están convenientemente actualizados con los parches indicados por el fabricante. Su mantenimiento es periódico y gestionado por personal especializado de forma centralizada.</span></li>
          <li><span class="text-gray-700 font-normal">Todos los equipos están protegidos por software de seguridad gestionado de forma centralizada y sus configuraciones protegidas para evitar negligencias.</span></li>
          <li><span class="text-gray-700 font-normal">De forma periódica en los equipos con acceso a datos, se analizan con herramientas de “Risk Intelligence”  para evaluar la exposición de los datos que contienen, formar a los usuarios en el uso correcto y establecer las medidas de seguridad adicionales pertinentes.</span></li>
        </ul>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 id="derechos" class="text-[#010cf7] text-3xl font-bold mb-6">¿Qué derechos incluye el RGPD y la LOPD?</h2>
      <div class="space-y-4 text-gray-700">
        <p>Los principales derechos que regula el RGPD ya estaban recogidos en la LOPD. Aprovechamos para recordarlos e introducir los novedosos. Estos son:</p>
        <ul class="list-disc list-inside space-y-2 ml-4 text-[#010cf7] font-medium">
          <li><span class="text-gray-700 font-normal">Derecho de acceso: derecho a saber qué datos se han recogido y qué se hace con ellos</span></li>
          <li><span class="text-gray-700 font-normal">Derecho de rectificación: puedes completar o corregir cualquiera de los datos personales que tengamos sobre tí.</span></li>
          <li><span class="text-gray-700 font-normal">Derecho de supresión: si así lo solicitas, podrás eliminar tus datos personales en nuestros sistemas (¡ojo!, necesitamos tus datos para poder mantener la relación comercial que nos une.)</span></li>
          <li><span class="text-gray-700 font-normal">Derecho a la limitación en el tratamiento: si consideras que tus datos son inexactos o que no se está usando para un fin legítimo, puede pedir que se dejen de utilizar mientras se aclara.</span></li>
          <li><span class="text-gray-700 font-normal">Derecho a la portabilidad: Puedes solicitar tus datos personales en un formato que te permita transferirlos a otra entidad.</span></li>
          <li><span class="text-gray-700 font-normal">Derecho de oposición: Puedes oponerte al tratamiento de tus datos, excepto si hay un interés legítimo en continuar haciéndolo. Ten en cuenta que esto puede hacer imposible seguir prestándote servicios.</span></li>
          <li><span class="text-gray-700 font-normal">Derecho al no tratamiento personalizado: Puedes elegir que tus datos no sean utilizados de manera automática para tomar decisiones sobre el servicio que se te presta; ten en cuenta que hay limitaciones a este derecho si se acredita que tus derechos están a salvo</span></li>
        </ul>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Qué es el RGPD y la LOPD?</h2>
      <div class="space-y-4 text-gray-700">
        <p>El RGPD, es la nueva regulación que, a nivel de la Unión Europea, regula la recogida y tratamiento de datos personales. Es de obligado cumplimiento a partir del 25 de Mayo de 2018, aunque lleva vigente desde hace 2 años. Este reglamento desarrolla lo expuesto en nuestra LOPD (Ley Orgánica de Protección de Datos) y se ajusta a la nueva normativa Europea al respecto.</p>
        <p>Para un conocimiento profundo sobre el objetivo y lo que conlleva el nuevo reglamento, puedes visitar la <a href="https://www.agpd.es/portalwebAGPD/index-ides-idphp.php">web de la Agencia Española de Protección de Datos</a>.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 class="text-[#010cf7] text-3xl font-bold mb-6">¿Cómo puedo ejercer mis derechos sobre mis datos?</h2>
      <div class="space-y-4 text-gray-700">
        <p>Para asegurar, como es lógico y pide la ley, de que sólo tú puedes ejercer los derechos sobre tus datos, debes enviar una solicitud con tus datos e identificación (DNI, pasaporte u otro documento válido que te identifique) a cualquiera de los métodos de contacto que te ofrecemos.</p>
        <p>Los derechos de Acceso, Rectificación, Cancelación y Oposición (derechos ARCO), son derechos independientes, por lo que no es necesario ejercitar en primer lugar el derecho de acceso para poder rectificar o cancelar.</p>
      </div>
    </section>
    <section class="container mx-auto px-6 mb-16 max-w-6xl">
      <h2 class="text-[#010cf7] text-3xl font-bold mb-6">Contacto para Ejercer tus derechos</h2>
      <div class="space-y-4 text-gray-700">
        <p>Contacta con nosotros para ejercer tus derechos o cualquier otra consulta en: <a href="mailto:lopd@hecoma.com">lopd@hecoma.com</a> o en el <a href="tel:+34685532082">+34 685 53 20 82</a> (Teléfono del delegado de tratamiento)  o por carta a: <a href="https://maps.app.goo.gl/e6HeoQM8Pjg8hDya9">Hecoma – Incoypre Pol. Ind. Pilar de la Dehesa, C/Galicia nº 1 Lucena (Córdoba) España</a>, indicando: a la atención del delegado de tratamiento de datos.</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  a { color:blue; }
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  #divh1 p { text-align: center; }
</style>