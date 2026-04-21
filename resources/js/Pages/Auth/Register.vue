<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue'; 
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    nombre: '',           // Coincide con BBDD
    email: '',            // Coincide con BBDD
    contrasena: '',       // Coincide con BBDD
    contrasena_confirmation: '',
    tlfn: '',             // Coincide con BBDD
    direccion: '',        // Coincide con BBDD
    nombreEmpresa: '',    // Coincide con BBDD
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('contrasena', 'contrasena_confirmation'),
    });
};
</script>

<template>
    <Head title="Crear Cuenta | HECOMA" />

    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-12">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">Registro de Nuevo Cliente</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-20">
            <div class="max-w-2xl mx-auto bg-white p-8 border border-gray-100 shadow-xl rounded-xl">
                
                <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <InputLabel for="nombre" value="Nombre Completo" class="text-[#003399] font-bold" />
                        <TextInput id="nombre" type="text" class="mt-1 block w-full border-gray-300" v-model="form.nombre" required autofocus />
                        <InputError class="mt-2" :message="form.errors.nombre" />
                    </div>

                    <div class="md:col-span-1">
                        <InputLabel for="email" value="Correo Electrónico" class="text-[#003399] font-bold" />
                        <TextInput id="email" type="email" class="mt-1 block w-full border-gray-300" v-model="form.email" required />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="md:col-span-1">
                        <InputLabel for="tlfn" value="Teléfono" class="text-[#003399] font-bold" />
                        <TextInput id="tlfn" type="text" class="mt-1 block w-full border-gray-300" v-model="form.tlfn" required />
                        <InputError class="mt-2" :message="form.errors.tlfn" />
                    </div>

                    <div class="md:col-span-2">
                        <InputLabel for="nombreEmpresa" value="Nombre de la Empresa" class="text-[#003399] font-bold" />
                        <TextInput id="nombreEmpresa" type="text" class="mt-1 block w-full border-gray-300" v-model="form.nombreEmpresa" required />
                        <InputError class="mt-2" :message="form.errors.nombreEmpresa" />
                    </div>

                    <div class="md:col-span-2">
                        <InputLabel for="direccion" value="Dirección Completa" class="text-[#003399] font-bold" />
                        <TextInput id="direccion" type="text" class="mt-1 block w-full border-gray-300" v-model="form.direccion" required />
                        <InputError class="mt-2" :message="form.errors.direccion" />
                    </div>

                    <div class="md:col-span-1">
                        <InputLabel for="contrasena" value="Contraseña" class="text-[#003399] font-bold" />
                        <TextInput id="contrasena" type="password" class="mt-1 block w-full border-gray-300" v-model="form.contrasena" required />
                        <InputError class="mt-2" :message="form.errors.contrasena" />
                    </div>

                    <div class="md:col-span-1">
                        <InputLabel for="contrasena_confirmation" value="Confirmar Contraseña" class="text-[#003399] font-bold" />
                        <TextInput id="contrasena_confirmation" type="password" class="mt-1 block w-full border-gray-300" v-model="form.contrasena_confirmation" required />
                    </div>

                    <div class="md:col-span-2 mt-6 flex flex-col space-y-4">
                        <button type="submit" class="btn-register-hecoma" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Registrarse
                        </button>
                        <div class="text-center">
                            <Link :href="route('login')" class="text-sm text-gray-600 underline hover:text-[#010cf7]">¿Ya tienes una cuenta? Inicia sesión</Link>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
    .btn-register-hecoma { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 4px; transition: all 0.3s ease; padding: 0.8rem 2rem; font-size: 16px; width: 100%; letter-spacing: 0.05em; }
    .btn-register-hecoma:hover { background-color: #010cf7; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(1, 12, 247, 0.2); }
    .btn-register-hecoma:disabled { opacity: 0.5; cursor: not-allowed; }
    @media (max-width: 768px) {
        h1 { font-size: 1.25rem; }
    }
</style>