<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '5.1 DISCOS PARA CANALES', referencias: 525, enlace: '/discos_para_canales' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 5. DISCOS PARA RANURAR" :productos="listaDiscos" />
</template>