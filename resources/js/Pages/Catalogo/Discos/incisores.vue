<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaDiscos = [
    { nombre: '3.1 INCISORES PARA ESCUADRADORA', referencias: 361, enlace: '/incisores_para_escuadradora' },
    { nombre: '3.2 INCISORES CÓNICOS PARA MARCOS', referencias: 98, enlace: '/incisores_conicos_para_marcos' },
    { nombre: '3.3 INCISORES PARA REFRENTADO', referencias: 2, enlace: '/incisores_para_refrentado' },
    { nombre: '3.4 INCISORES AJUSTABLES', referencias: 20, enlace: '/incisores_ajustables' },
    { nombre: '3.5 INCISORES PARA CANTEADORAS', referencias: 14, enlace: '/incisores_para_canteadoras' },
];
</script>

<template>
    <SeccionHerramientas tituloSeccion="SERIE 3. INCISORES" :productos="listaDiscos" />
</template>