<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '7.1 DISCOS PARA ALUMINIO Y OTROS METALES NO FERROSOS', referencias: 51, enlace: '/discos_para_materiales_no_ferrosos' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 7. DISCOS PARA MATERIALES NO FERROSOS" :productos="listaDiscos" />
</template>