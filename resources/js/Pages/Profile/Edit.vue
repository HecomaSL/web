<script setup>
import { ref, computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore';

// Componentes originales del perfil de Breeze
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

defineProps({
    mustVerifyEmail: { type: Boolean },
    status: { type: String },
});

const page = usePage();
const cartStore = useCartStore();

// --- LÓGICA DE TU HEADER ---
const openMenu = ref(null);
const openSubMenu = ref(null); 
const isMobileMenuOpen = ref(false);
const isUserMenuOpen = ref(false); 

const user = computed(() => page.props.auth?.user);
const totalItems = computed(() => cartStore.totalProductos || 0);

const menus = {
  sobreNosotros: [
    { label: 'Nuestra Historia', url: '/nuestra-historia' },
    { label: 'Nuestros Valores', url: '/nuestros-valores' },
    { label: 'Distribución', url: '/distribucion' },
    { label: 'Noticias', url: '/noticias' }
  ],
  servicios: [
    { 
      label: 'Servicio de Afilado', 
      url: '/afilado',
      subitems: [
        { label: 'Afilado para madera', url: '/afilado-para-madera' },
        { label: 'Afilado para diamante', url: '/afilado-para-diamante' }
      ]
    },
    { label: 'Fabricación a medida', url: '/fabricacion-a-medida' }
  ],
  catalogo: [
    { label: 'Discos de corte para madera', url: '/discos' },
    { label: 'Fresas para madera', url: '/fresas' },
    { label: 'Brocas', url: '/brocas' }
  ]
};

const toggleMenu = (menu) => { openMenu.value = openMenu.value === menu ? null : menu; };
const getTitleUrl = (key) => {
  const urls = { sobreNosotros: '/nuestra-historia', servicios: '/servicios', catalogo: '/catalogo' };
  return urls[key] || '#';
};
</script>

<template>
    <Head title="Mi Perfil - HECOMA" />

    <header class="bg-white text-[#0009ad] shadow-lg relative z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold uppercase tracking-wider">
                <Link href="/"><img src="https://hecoma.com/wp-content/uploads/2025/04/logohecomaincoyprecom-1.png" alt="Logo" class="w-48 lg:w-64"></Link>
            </div>

            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="lg:hidden p-2 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <ul class="hidden lg:flex items-center space-x-8 font-medium">
                <li v-for="(items, key) in menus" :key="key" class="relative group" @mouseenter="openMenu = key" @mouseleave="openMenu = null">
                    <Link :href="getTitleUrl(key)" class="hover:text-blue-500 transition-colors capitalize flex items-center py-2">
                        {{ key.replace(/([A-Z])/g, ' $1') }}
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </Link>
                </li>
                <li><Link href="/contacto" class="hover:text-blue-500">Contacto</Link></li>

                <li class="relative">
                    <Link href="/carrito" class="p-2 flex items-center hover:text-blue-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.112 11.213a.45.45 0 0 1-.445.494H3.734a.45.45 0 0 1-.445-.494l1.112-11.213m15.356 0a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25m15.356 0h-15.356" /></svg>
                        <span v-if="totalItems > 0" class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ totalItems }}</span>
                    </Link>
                </li>

                <li class="relative group" @mouseenter="isUserMenuOpen = true" @mouseleave="isUserMenuOpen = false">
                    <button class="bg-[#010cf7] text-white px-4 py-1.5 rounded-full flex items-center gap-2 font-bold hover:bg-blue-800 transition-all shadow-md">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>
                        {{ user?.name?.split(' ')[0] || 'Cuenta' }}
                    </button>
                    <transition name="fade">
                        <ul v-if="isUserMenuOpen" class="absolute right-0 bg-white text-blue-900 rounded-md shadow-xl py-2 w-48 border">
                            <li><Link href="/dashboard" class="block px-4 py-2 hover:bg-blue-100 text-sm font-semibold">Panel de Control</Link></li>
                            <li><Link href="/logout" method="post" as="button" class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 text-sm font-bold">Cerrar Sesión</Link></li>
                        </ul>
                    </transition>
                </li>
            </ul>
        </nav>
    </header>

    <main class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="font-bold text-3xl text-[#010cf7]">Mi Perfil Profesional</h2>
                <p class="text-gray-500">Gestiona tus datos de acceso y contacto en HECOMA.</p>
            </div>

            <div class="space-y-8">
                <div class="p-6 bg-white shadow-md rounded-2xl border border-gray-100">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-bold mb-4 text-gray-800">Datos de Usuario</h3>
                        <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" />
                    </div>
                </div>

                <div class="p-6 bg-white shadow-md rounded-2xl border border-gray-100">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-bold mb-4 text-gray-800">Seguridad de la Cuenta</h3>
                        <UpdatePasswordForm />
                    </div>
                </div>

                <div class="p-6 bg-red-50 shadow-sm rounded-2xl border border-red-100">
                    <div class="max-w-xl">
                        <DeleteUserForm />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: opacity 0.2s, transform 0.2s; }
    .fade-enter-from, .fade-leave-to { opacity: 0; transform: translateY(5px); }
</style>