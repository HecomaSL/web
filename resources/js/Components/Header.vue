<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cartStore';

const page = usePage();
const cartStore = useCartStore();

const openMenu = ref(null);
const openSubMenu = ref(null); 
const isMobileMenuOpen = ref(false);
const isUserMenuOpen = ref(false); 

// Badge reactivo
const totalItems = computed(() => cartStore.totalProductos || 0);

// Comprobación segura de usuario
const user = computed(() => page.props.auth?.user);

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
const toggleSubMenu = (itemLabel) => { openSubMenu.value = openSubMenu.value === itemLabel ? null : itemLabel; };

const getTitleUrl = (key) => {
  if (key === 'sobreNosotros') return '/nuestra-historia';
  if (key === 'servicios') return '/servicios';
  if (key === 'catalogo') return '/catalogo';
  return '#'; 
};
</script>

<template>
  <header class="bg-white text-[#0009ad] shadow-lg relative z-50">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
      <div class="text-2xl font-bold uppercase tracking-wider">
        <Link href="/">
          <img src="https://hecoma.com/wp-content/uploads/2025/04/logohecomaincoyprecom-1.png" alt="Logo" class="w-48 lg:w-64">
        </Link>
      </div>

      <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="lg:hidden p-2 focus:outline-none" >
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <ul class="hidden lg:flex items-center space-x-8 font-medium">
        <li v-for="(items, key) in menus" :key="key" class="relative group" @mouseenter="openMenu = key" @mouseleave="openMenu = null" >
          <Link :href="getTitleUrl(key)" class="hover:text-blue-500 transition-colors capitalize flex items-center py-2">
            {{ key.replace(/([A-Z])/g, ' $1') }}
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </Link>
          
          <transition name="fade">
            <ul v-if="openMenu === key" class="absolute left-0 bg-white text-blue-900 rounded-md shadow-xl py-2 w-64 border">
              <li v-for="item in items" :key="item.label" class="relative" @mouseenter="openSubMenu = item.label" @mouseleave="openSubMenu = null">
                <Link :href="item.url" class="flex justify-between items-center px-4 py-2 hover:bg-blue-100 text-sm">
                  {{ item.label }}
                  <svg v-if="item.subitems" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </Link>
                <ul v-if="item.subitems && openSubMenu === item.label" class="absolute left-full top-0 ml-1 w-64 bg-white shadow-2xl py-2 border-l">
                  <li v-for="sub in item.subitems" :key="sub.label">
                    <Link :href="sub.url" class="block px-4 py-2 hover:bg-blue-100 text-sm">{{ sub.label }}</Link>
                  </li>
                </ul>
              </li>
            </ul>
          </transition>
        </li>
        
        <li><Link href="/contacto" class="hover:text-blue-500">Contacto</Link></li>

        <template v-if="user">
          <li class="relative">
            <Link href="/carrito" class="p-2 flex items-center hover:text-blue-500 transition-all">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.112 11.213a.45.45 0 0 1-.445.494H3.734a.45.45 0 0 1-.445-.494l1.112-11.213m15.356 0a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25m15.356 0h-15.356" />
              </svg>
              <span v-if="totalItems > 0" class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                {{ totalItems }}
              </span>
            </Link>
          </li>

          <li class="relative group" @mouseenter="isUserMenuOpen = true" @mouseleave="isUserMenuOpen = false">
            <button class="bg-[#010cf7] text-white px-4 py-1.5 rounded-full flex items-center gap-2 font-bold hover:bg-blue-800 transition-all shadow-md">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>
              {{ user.name?.split(' ')[0] || 'Mi Cuenta' }}
            </button>
            
            <transition name="fade">
              <ul v-if="isUserMenuOpen" class="absolute right-0 bg-white text-blue-900 rounded-md shadow-xl py-2 w-48 border">
                <li><Link href="/dashboard" class="block px-4 py-2 hover:bg-blue-100 text-sm font-semibold">Panel de Control</Link></li>
                <li><Link href="/profile" class="block px-4 py-2 hover:bg-blue-100 text-sm">Mi Perfil</Link></li>
                <li class="border-t mt-2 pt-2">
                  <Link href="/logout" method="post" as="button" class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 text-sm font-bold">Cerrar Sesión</Link>
                </li>
              </ul>
            </transition>
          </li>
        </template>

        <li v-else>
          <Link href="/login" class="border-2 border-[#010cf7] text-[#010cf7] px-5 py-1.5 rounded-full hover:bg-[#010cf7] hover:text-white transition-all font-bold">
            Inicio Sesión
          </Link>
        </li>
      </ul>
    </nav>

    <transition name="slide">
      <div v-if="isMobileMenuOpen" class="lg:hidden bg-[#010cf7] text-white border-t border-blue-800 absolute w-full left-0 shadow-2xl overflow-y-auto max-h-[85vh]">
        <ul class="px-6 py-4 space-y-4">
          <li v-if="user" class="bg-blue-900 p-4 rounded-lg">
            <div class="flex justify-between items-center mb-4">
              <div>
                <p class="text-xs uppercase text-blue-300">Bienvenido</p>
                <p class="font-bold text-lg">{{ user.name }}</p>
              </div>
              <Link href="/carrito" class="relative p-2 bg-blue-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.112 11.213a.45.45 0 0 1-.445.494H3.734a.45.45 0 0 1-.445-.494l1.112-11.213m15.356 0a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25m15.356 0h-15.356" />
                </svg>
                <span v-if="totalItems > 0" class="absolute -top-1 -right-1 bg-red-600 text-[10px] px-1.5 py-0.5 rounded-full font-bold border border-blue-900">
                  {{ totalItems }}
                </span>
              </Link>
            </div>
            <div class="flex flex-col gap-2">
              <Link href="/dashboard" class="text-sm bg-white text-[#010cf7] text-center py-2 rounded-md font-bold">Panel de Control</Link>
              <Link href="/logout" method="post" as="button" class="text-xs text-center text-blue-200 py-1 font-bold">Cerrar Sesión</Link>
            </div>
          </li>

          <li v-for="(items, key) in menus" :key="key">
            <div @click="toggleMenu(key)" class="flex justify-between items-center py-2 text-lg font-bold capitalize border-b border-blue-800">
              {{ key.replace(/([A-Z])/g, ' $1') }}
              <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': openMenu === key}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <ul v-if="openMenu === key" class="pl-4 mt-2 space-y-2">
              <li v-for="item in items" :key="item.label">
                <div class="flex justify-between items-center py-1">
                  <Link :href="item.url" class="text-blue-100 text-sm">{{ item.label }}</Link>
                  <button v-if="item.subitems" @click="toggleSubMenu(item.label)" class="p-1">
                    <svg class="w-4 h-4" :class="{'rotate-180': openSubMenu === item.label}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                </div>
              </li>
            </ul>
          </li>
          <li><Link href="/contacto" class="block py-2 text-lg font-bold border-b border-blue-800">Contacto</Link></li>
          <li v-if="!user" class="pt-4">
            <Link href="/login" class="block text-center border-2 border-white py-2 rounded-full font-bold">Inicio de Sesión</Link>
          </li>
        </ul>
      </div>
    </transition>
  </header>
</template>

<style scoped>
  .fade-enter-active, .fade-leave-active { transition: opacity 0.2s, transform 0.2s; }
  .fade-enter-from, .fade-leave-to { opacity: 0; transform: translateY(5px); }
  .slide-enter-active, .slide-leave-active { transition: all 0.3s ease-out; max-height: 800px; }
  .slide-enter-from, .slide-leave-to { opacity: 0; max-height: 0; overflow: hidden; }
</style>