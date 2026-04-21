<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '2.1 DISCOS PARA CORTE DE MARCOS', referencias: 18, enlace: '/discos_para_corte_de_marcos' },
    { nombre: '2.2 DISCOS PARA PLÁSTICOS Y DERIVADOS', referencias: 14, enlace: '/discos_plasticos_derivados' },
    { nombre: '2.3 DISCOS PARA CORTES DE ALTA PRECISIÓN', referencias: 14, enlace: '/discos_para_cortes_alta_precision' },
    { nombre: '2.4 DISCOS FINOS PARA MADERAS DE CALIDAD Y ALTO RENDIMIENTO', referencias: 36, enlace: '/discos_finos_para_maderas_de_calidad' },
    { nombre: '2.5 DISCOS MUY FINOS CON CUERPO DE ALTA TENACIDAD', referencias: 39, enlace: '/discos_muy_finos_cuerpo_de_alta_tenacidad' },
    { nombre: '2.6 DISCOS EXTREMADAMENTE FINOS CON CUERPO REFORZADO', referencias: 26, enlace: '/discos_extremadamente_finos_cuerpo_reforzado' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 2. DISCOS DE APLICACIONES ESPECIALES" :productos="listaDiscos" />
</template>