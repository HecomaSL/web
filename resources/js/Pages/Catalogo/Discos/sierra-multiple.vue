<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '10.1 DISCOS PARA SIERRA MÚLTIPLE CON DENTONES SIN LIMITADOR', referencias: 105, enlace: '/sierra_multiple_con_dentones_sin_limitador' },
    { nombre: '10.2 DISCOS PARA SIERRA MÚLTIPLE CON DENTONES CON LIMITADOR', referencias: 53, enlace: '/sierra_multiple_con_dentones_con_limitador' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 10. DISCOS PARA SIERRA MULTIPLE" :productos="listaDiscos" />
</template>