<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '11.1 DISCOS UNIVERSALES SILENCIADOS', referencias: 51, enlace: '/discos_universales_silenciados' },
    { nombre: '11.2 DISCOS SILENCIADOS PARA MARCOS', referencias: 8, enlace: '/discos_silenciados_marcos' },
    { nombre: '11.3 DISCOS SILENCIADOS PARA SECCIONADORA, LAMINADOS Y BILAMINADOS', referencias: 58, enlace: '/discos_silenciados_seccionadora_laminados' },
    { nombre: '11.4 DISCOS SILENCIADOS PARA ALUMINIO', referencias: 12, enlace: '/discos_silenciados_aluminio' },
    { nombre: '11.5 DISCOS SILENCIADOS CON RECUBRIMIENTO PARA SECCIONADORA Y PANELESREVESTIDOS', referencias: 32, enlace: '/discos_silenciados_recubrimiento' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 11. DISCOS SILENCIOSOS" :productos="listaDiscos" />
</template>