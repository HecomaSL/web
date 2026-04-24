<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

const form = useForm({
    nombre: '',
    email: '',
    asunto: '',
    mensaje: '',
    imagen: null,
});

const enviarFormulario = () => {
    form.post(route('contacto.enviar'), {
        forceFormData: true, // Necesario para enviar archivos
        onSuccess: () => {
            alert('Mensaje enviado con éxito');
            form.reset();
        },
    });
};
</script>

<template>
  <Head title="Contacto - HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">CONTACTO</h1>
      </div>
    </section>

    <section class="container mx-auto px-6">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <p>Sabemos que en el mundo del mecanizado de la madera, cada detalle cuenta. Por eso, en HECOMA, queremos estar siempre cerca de tí para asesorarte de la manera que te resulte más cómoda.</p>
        <p>Puedes contactarnos de la manera que te resulte más cómoda: vía email, teléfono, whatsapp, en nuestras oficinas o a través de nuestro formulario de contacto. También nos puedes encontrar en nuestras redes sociales para estar al día de nuestras novedades. Nuestro equipo estará encantado de ayudarte y resolver cualquier duda que tengas.</p>
      </div>
    </section>

    <section class=" py-16 px-6">
      <div class="container mx-auto max-w-6xl">
          <div class="text-center mb-12">
              <h2 class="text-3xl md:text-4xl font-bold leading-tight uppercase tracking-wide mb-4">SEDES</h2>
          </div>

          <div class="flex flex-col md:flex-row gap-8 justify-center items-stretch">
              <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-md p-4 flex flex-col items-center">
                  <h3 class="text-[#003399] text-xl md:text-2xl font-bold uppercase mb-4">Sonseca</h3>
                  <div class="w-full h-[350px] overflow-hidden rounded-lg">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.42047632631!2d-3.982636!3d39.685249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6a115e701d7ea7%3A0x778ccf570a392130!2sHerramientas%20de%20corte%20para%20madera%20S.L.%20HECOMA!5e0!3m2!1ses!2ses!4v1776407987341!5m2!1ses!2ses" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
              </div>

              <div class="flex-1 bg-white border border-gray-100 rounded-xl shadow-md p-4 flex flex-col items-center">
                  <h3 class="text-[#003399] text-xl md:text-2xl font-bold uppercase mb-4">Lucena</h3>
                  <div class="w-full h-[350px] overflow-hidden rounded-lg">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.7251254704947!2d-4.5082153!3d37.3963323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d70d203160d91%3A0x858d2135793072e7!2sHECOMA%20%26%20Incoypre!5e0!3m2!1ses!2ses!4v1776408039362!5m2!1ses!2ses" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <section class="py-16 px-6 bg-[#f5f9fb]">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold leading-tight uppercase tracking-wide mb-4">FORMULARIO DE CONTACTO</h2>
      </div>
      <div class="container mx-auto max-w-4xl bg-white p-8 rounded-xl shadow-sm">
        <form @submit.prevent="enviarFormulario" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="flex flex-col">
                  <label class="text-sm text-gray-600 mb-1">Inserte Nombre</label>
                  <input v-model="form.nombre" type="text" required class="border-gray-300 rounded-md focus:ring-[#0000BB] focus:border-[#0000BB]">
              </div>
              <div class="flex flex-col">
                  <label class="text-sm text-gray-600 mb-1">Inserte Correo electrónico</label>
                  <input v-model="form.email" type="email" required class="border-gray-300 rounded-md focus:ring-[#0000BB] focus:border-[#0000BB]">
              </div>
          </div>

          <div class="flex flex-col">
              <label class="text-sm text-gray-600 mb-1">Inserte Asunto</label>
              <input v-model="form.asunto" type="text" required class="border-gray-300 rounded-md focus:ring-[#0000BB] focus:border-[#0000BB]">
          </div>

          <div class="flex flex-col">
              <label class="text-sm text-gray-600 mb-1">Inserte Mensaje, puedes subir imagen más abajo</label>
              <textarea v-model="form.mensaje" rows="6" required class="border-gray-300 rounded-md focus:ring-[#0000BB] focus:border-[#0000BB]"></textarea>
          </div>

          <div class="flex flex-col">
              <label class="text-sm text-gray-600 mb-1">Subir imagen</label>
              <input type="file" @input="form.imagen = $event.target.files[0]" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
          </div>

          <div>
              <button type="submit" :disabled="form.processing" class="px-8 py-2 border-2 border-black font-bold hover:bg-black hover:text-white transition-colors">
                  {{ form.processing ? 'Enviando...' : 'Enviar' }}
              </button>
          </div>
        </form>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* Ajustes para imitar el interlineado y estilo de la imagen corporativa */
  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; }
  h3 { line-height: 1.2; }
</style>