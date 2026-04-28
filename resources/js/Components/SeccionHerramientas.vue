<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    tituloSeccion: String,
    subtituloSeccion: String,
    productos: { type: Array, default: () => [] },
    colorCorporativo: { type: String, default: '#010cf7' }
});
</script>

<template>
    <Head :title="tituloSeccion" />

    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-white text-3xl md:text-4xl font-bold uppercase tracking-tight">{{ tituloSeccion }}</h1>
            </div>
        </section>

        <section class="pb-16 bg-white">
            <div class="container mx-auto px-6">
                <div class="max-w-6xl mx-auto">
                    <a v-for="(producto, index) in productos" :key="index" :href="producto.enlace" class="group block mb-4 cursor-pointer transition-all duration-200 hover:opacity-90 hover:translate-x-1" >
                        <div :style="{ backgroundColor: colorCorporativo }" class="p-5 shadow-lg flex flex-col justify-center min-h-[80px] rounded-sm" >
                            <h2 class="text-white text-lg font-bold uppercase leading-tight"> {{ producto.nombre }}</h2>
                            <p v-if="producto.referencias" class="text-sm mt-1 font-medium text-white/90">Hay {{ producto.referencias }} referencias disponibles </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
    h1 { border-bottom: 2px solid transparent; }
    .group { transition: transform 0.2s ease-in-out; }
    h1 { line-height: 1.2; }
</style>