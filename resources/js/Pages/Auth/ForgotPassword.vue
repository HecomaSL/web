<script setup>
import { Head, useForm } from '@inertiajs/vue3';
// Usamos MainLayout para mantener Header y Footer de HECOMA
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Recuperar Contraseña | HECOMA" />

    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-12">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">Restablecer Contraseña</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-20">
            <div class="max-w-md mx-auto bg-white p-8 border border-gray-100 shadow-xl rounded-xl">
                <div class="mb-6 text-sm text-gray-600 leading-relaxed">
                    ¿Has olvidado tu contraseña? No hay problema. Indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla que te permitirá elegir una nueva.
                </div>

                <div v-if="status" class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-sm font-medium text-green-700" >
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Correo Electrónico" class="text-[#003399] font-bold" />
                        <TextInput id="email" type="email" class="mt-1 block w-full border-gray-300 focus:border-[#010cf7] focus:ring-[#010cf7]" v-model="form.email" required autofocus autocomplete="username" placeholder="tu@email.com" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="btn-reset-hecoma" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Enviar enlace de restauración</button>
                    </div>
                    <div class="mt-6 text-sm text-gray-600 leading-relaxed">
                        <p class="text-center"><a href="/login">Volver al login</a></p>
                    </div>
                </form>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
    .btn-reset-hecoma { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 4px; transition: all 0.3s ease; padding: 0.8rem 2rem; font-size: 14px; width: 100%; letter-spacing: 0.05em; }
    .btn-reset-hecoma:hover { background-color: #010cf7; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(1, 12, 247, 0.2); }
    .btn-reset-hecoma:disabled { opacity: 0.5; cursor: not-allowed; }

    @media (max-width: 768px) {
        h1 { font-size: 1.25rem; }
    }
</style>