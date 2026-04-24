<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: { type: Boolean, },
    status: { type: String, },
});

const user = usePage().props.auth.user;

// Sincronizamos el formulario con la propiedad 'nombre' de tu tabla usuarios
const form = useForm({
    nombre: user.nombre || '', 
    email: user.email || '',
    tlfn: user.tlfn || '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-bold text-[#010cf7]">Información del Perfil </h2>

            <p class="mt-1 text-sm text-gray-600"> Actualiza tu nombre de cliente y tu dirección de correo electrónico.</p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6" >
            <div>
                <InputLabel for="nombre" value="Nombre Completo" />
                <TextInput id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.nombre" />
            </div>

            <div>
                <InputLabel for="email" value="Correo Electrónico" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div>
                <InputLabel for="tlfn" value="Telefono contacto" />
                <TextInput id="tlfn" type="text" class="mt-1 block w-full" v-model="form.tlfn" required maxlength="9" @input="form.tlfn = form.tlfn.replace(/\D/g, '').slice(0, 9)"  />
                <InputError class="mt-2" :message="form.errors.tlfn" />
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="mt-2 text-sm text-gray-800">Tu dirección de correo no está verificada. <Link :href="route('verification.send')" method="post" as="button" class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Haz clic aquí para volver a enviar el email de verificación.</Link></p>

                <div v-show="status === 'verification-link-sent'" class="mt-2 text-sm font-medium text-green-600">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing" class="bg-[#010cf7] hover:bg-blue-800 active:bg-blue-900 transition-all">
                    Guardar Cambios
                </PrimaryButton>

                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0" leave-active-class="transition ease-in-out" leave-to-class="opacity-0" >
                    <p v-if="form.recentlySuccessful" class="text-sm font-semibold text-green-600">¡Guardado correctamente!</p>
                </Transition>
            </div>
        </form>
    </section>
</template>