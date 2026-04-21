<script setup>
import { ref } from 'vue'; // Añadir ref
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
  <Head title="La Agencia IDEA se interesa por el proyecto industrial | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">La Agencia de Innovación y desarrollo de Andalucía<br>se interesa por el proyecto industrial de HECOMA</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/agencia_idea.jpg" alt="Agencia IDEA" class="rounded-lg shadow-md w-full md:w-auto" >
        </div>
        <h2 class="text-[#010cf7] text-3xl font-bold text-center">Nuestro proyecto empresarial sigue desarrollándose, y para ello ahora contamos con la Agencia IDEA</h2>
        <p>Se ha recibido un incentivo de la Agencia de Innovación y Desarrollo de Andalucía IDEA, de la Junta de Andalucía, por un importe de  65.646,00€, cofinanciado en un 80% por la Unión Europea través del Fondo Europeo de Desarrollo Regional, FEDER para la realización del proyecto «Adquisición de maquinaria herramienta robotizada para el acabado y reparación de herramientas de corte para madera» con el objetivo de «Conseguir un tejido empresarial mas competitivo».</p>
        <p>En Hecoma, continuamos compliendo objetivos de crecimiento, innovación y modernización contínuos, con recursos propios y con la colaboración de las instituciones que confían en nuestro trabajo y creen en en el proyecto.</p>
        <p>Somos conocedores, de primera mano, de la crucial labor de la agencia IDEA  en el desarrollo industrial de nuestra provincia, y en especial de la localidad de Lucena. Por este motivo, hemos trasladado a la oficina de la agencia en nuestra comarca nuestros próximos proyectos de inversión. De forma inmediata su personal, y directiva en Córdoba, se han interesado personalmente en conocernos y ayudarnos.</p>
        <p>Este interés se ha materializado, en el asesoramiento para la solicitud de una ayuda para la próximas inversiones en maquinaria-herramienta previstas, así como, en la visita a nuestras instalaciones del gerente de la agencia para la provincia de Córdoba.</p>
        <p>El Sr. Gerente nos honró con su visita, a nuestra factoría de Lucena, hace un tiempo. Visita en la cual pudo observar e interesarse  con detenimiento por nuestro proceso de fabricación a medida de herramientas de corte para madera</p>
        <p>Se trata, como nos ha demostrado en las reuniones celebradas, de una persona conocedora directa,  del sector industrial de nuestra provincia. A su vez es consciente del camino a seguir de muchos de los sectores cordobeses para adaptarse al nuevo mercado que nos viene. Su posición e interés, hacen que su  consejo, visión y orientación  sean valiosos para cualquier empresa de nuestro entorno</p>
        <p>Con sinceridad, os invitamos a contactar con la agencia en vuestra delegación mas cercana, y comprobar que, hay en ellas personal dispuesto a asesorar y a aconsejar, en todo lo que las administraciones pueden ofrecer al empresario Andaluz</p>
        <p>Desde el personal y directiva de HECOMA®, trasladamos nuestra sincera enhorabuena por la labor que la agencia realiza, por y para, los empresarios cordobeses</p>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Estilos de Texto --- */
  p { text-align: justify; line-height: 1.6; }
  h2, h3 { line-height: 1.2; text-align: justify; }
  .imgytext p { text-align: center; }
  .imgytext img { height: 250px; width: 300px; padding: 1%; object-fit: cover; }
  .imgytext { padding: 1%; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
</style>