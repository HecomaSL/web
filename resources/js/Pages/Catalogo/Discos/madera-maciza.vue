<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '9.1 DISCOS PARA SIERRA MÚLTIPLE SIN LIMITADOR DE VIRUTA', referencias: 105, enlace: '/discos_sierra_multiple_sin_limitador_viruta' },
    { nombre: '9.2 DISCOS PARA SIERRA MÚLTIPLE CON LIMITADOR DE VIRUTA', referencias: 74, enlace: '/discos_sierra_multiple_con_limitador_viruta' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 9. DISCOS PARA MADERA MACIZA" :productos="listaDiscos" />
</template>