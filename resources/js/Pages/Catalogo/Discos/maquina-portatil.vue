<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '6.1 DISCOS PARA MÁQUINA PORTATIL', referencias: 525, enlace: '/discos_para_maquina_portatil' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 6. DISCOS PARA MÁQUINA PORTÁTIL" :productos="listaDiscos" />
</template>