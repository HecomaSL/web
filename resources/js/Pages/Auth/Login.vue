<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue'; 
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

defineProps({
    canResetPassword: { type: Boolean, },
    status: { type: String, },
});

const form = useForm({ email: '', password: '', remember: false, });
const submit = () => { form.post(route('login'), { onFinish: () => form.reset('password'), }); };
</script>

<template>
    <Head title="Iniciar Sesión | HECOMA" />
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-12">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">Acceso Clientes</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-20">
            <div class="max-w-md mx-auto bg-white p-8 border border-gray-100 shadow-xl rounded-xl">
                
                <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" class="text-[#003399] font-bold" />
                        <TextInput id="email" type="email" class="mt-1 block w-full border-gray-300 focus:border-[#010cf7] focus:ring-[#010cf7]" v-model="form.email" required autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Contraseña" class="text-[#003399] font-bold" />
                        <TextInput id="password" type="password" class="mt-1 block w-full border-gray-300 focus:border-[#010cf7] focus:ring-[#010cf7]" v-model="form.password" required autocomplete="current-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4 block">
                        <label class="flex items-center cursor-pointer">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ms-2 text-sm text-gray-600">Recordar mi sesión</span>
                        </label>
                    </div>

                    <div class="mt-8 flex flex-col space-y-4">
                        <button type="submit" class="btn-login-hecoma" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" >Entrar</button>

                        <div class="flex items-center justify-between mt-4">
                            <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-500 underline hover:text-[#010cf7]" >¿Olvidaste tu contraseña?</Link>
                            <Link :href="route('register')" class="text-sm font-bold text-[#003399] hover:underline" > Crear cuenta</Link>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
/* Estilo para que el botón de Login sea idéntico a los de tu web */
.btn-login-hecoma { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 4px; transition: all 0.3s ease; padding: 0.8rem 2rem; font-size: 16px; width: 100%; letter-spacing: 0.05em; }
.btn-login-hecoma:hover { background-color: #010cf7; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(1, 12, 247, 0.2); }
.btn-login-hecoma:disabled { opacity: 0.5; cursor: not-allowed; }

/* Ajuste responsivo para el título */
@media (max-width: 768px) {
    h1 { font-size: 1.25rem; }
}
</style>