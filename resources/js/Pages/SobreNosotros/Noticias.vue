<script setup>
    import { onMounted, onUnmounted } from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { useNoticias } from '@/Composables/useNoticias';
    import '@/Styles/noticias.css';

    const { 
        filtrosSeleccionados, noticiasAMostrar, noticiasFiltradas, cargando, cargarMas, resetIndex 
    } = useNoticias();

    const handleScroll = () => {
        const posicionActual = window.innerHeight + window.scrollY;
        const finalPagina = document.body.offsetHeight - 400;
        if (posicionActual >= finalPagina) 
            cargarMas();
    };

    onMounted(() => window.addEventListener('scroll', handleScroll));
    onUnmounted(() => window.removeEventListener('scroll', handleScroll));
</script>

<template>
    <Head title="Noticias - HECOMA" />
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-12">
            <div id="divh1" class="container mx-auto px-6">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Noticias</h1>
            </div>
        </section>

        <div class="botones">
            <label :class="{ 'checked': filtrosSeleccionados.includes('b1') }">
                <input type="checkbox" v-model="filtrosSeleccionados" value="b1" @change="resetIndex"> Innovación y Tecnología
            </label>
            <label :class="{ 'checked': filtrosSeleccionados.includes('b2') }">
                <input type="checkbox" v-model="filtrosSeleccionados" value="b2" @change="resetIndex"> Maquinaria de Precisión
            </label>
            <label :class="{ 'checked': filtrosSeleccionados.includes('b3') }">
                <input type="checkbox" v-model="filtrosSeleccionados" value="b3" @change="resetIndex"> Servicios Especializados
            </label>
            <label :class="{ 'checked': filtrosSeleccionados.includes('b4') }">
                <input type="checkbox" v-model="filtrosSeleccionados" value="b4" @change="resetIndex"> Artículos informativos
            </label>
        </div>

        <div id="news-feed">
            <div id="container">
                <transition-group name="fade">
                    <div v-for="noticia in noticiasAMostrar" :key="noticia.url" class="news-card">
                        <div class="news-image-wrapper">
                            <img :src="noticia.img" @error="$event.target.src='https://via.placeholder.com/400x300?text=HECOMA'">
                        </div>
                        <div class="news-content-wrapper">
                            <h2><b><a :href="noticia.url" target="_blank">{{ noticia.title }}</a></b></h2>
                            <p>{{ noticia.desc }}</p>
                        </div>
                    </div>
                </transition-group>
            </div>

            <div id="feed-controls">
                <div v-if="cargando" class="loader"><div class="spin"></div></div>
                <p v-if="noticiasAMostrar.length >= noticiasFiltradas.length" id="final-text">No hay más contenido</p>
            </div>
        </div>
    </MainLayout>
</template>