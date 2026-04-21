<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '1.1 DISCOS PARA CORTE LONGITUDINAL Y TRANSVERSAL', referencias: 61, enlace: '/discos_corte_longitudinal_transversal' },
    { nombre: '1.2 DISCOS DE CORTE UNIVERSAL', referencias: 53, enlace: '/discos_corte_universal' },
    { nombre: '1.3 DISCOS DE ACABADO Y AGLOMERADO', referencias: 52, enlace: '/discos_de_acabado_y_aglomerado' },
    { nombre: '1.4 DISCOS CONTRACHAPADO, MULTILAMINADOS Y LAMINADOS PLÁSTICOS', referencias: 50, enlace: '/discos_corte_contrachapado' },
    { nombre: '1.5 DISCOS DE PASO FINO PARA ACABADOS', referencias: 62, enlace: '/discos_de_paso_fino_para_acabados' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 1. CORTE DE TABLERO" :productos="listaDiscos" />
</template>