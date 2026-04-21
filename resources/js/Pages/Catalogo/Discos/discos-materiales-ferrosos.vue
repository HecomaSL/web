<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '8.1 DISCOS PARA MATERIALES FERROSOS', referencias: 29, enlace: '/discos_para_materiales_ferrosos' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 8. DISCOS PARA MATERIALES FERROSOS" :productos="listaDiscos" />
</template>