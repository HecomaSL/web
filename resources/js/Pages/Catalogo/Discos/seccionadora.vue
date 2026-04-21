<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '4.1 DISCOS PARA SECCIONADORA', referencias: 191, enlace: '/discos_para_seccionadora' },
    { nombre: '4.2 DISCOS PARA PANELES REVESTIDOS', referencias: 34, enlace: '/discos_para_paneles_revestidos' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 4. DISCOS PARA SECCIONADORA" :productos="listaDiscos" />
</template>