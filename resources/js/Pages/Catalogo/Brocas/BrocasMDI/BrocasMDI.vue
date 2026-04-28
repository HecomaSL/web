<script setup>
import SeccionHerramientas from '@/Components/SeccionHerramientas.vue';

const listaBrocas = [
    { nombre: '1.1 BROCA MDI HELICOIDAL ACABADO POSITIVA Z1', referencias: 9, enlace: '/broca_mdi_acabado_positiva_z1' },
    { nombre: '1.2 BROCA MDI HELICOIDAL ACABADO POSITIVA Z2', referencias: 54, enlace: '/broca_mdi_acabado_positiva_z2' },
    { nombre: '1.3 BROCA MDI HELICOIDAL ACABADO NEGATIVA Z2', referencias: 16, enlace: '/broca_md1_helicoidal_z2_negativa' },
    { nombre: '1.4 BROCA MDI HELICOIDAL ACABADO POSITIVA Z3', referencias: 26, enlace: '/broca-mdi-helicoidal-z3-positiva' },
    { nombre: '1.5 BROCA MDI HELICOIDAL ACABADO NEGATIVA Z3', referencias: 14, enlace: '/broca-mdi-helicoidal-z3-negativa' },
    { nombre: '1.6 BROCA MDI HELICOIDAL ACABADO POSITIVA Z3 (BA06)', referencias: 7, enlace: '/broca-mdi-helicoidal-z3-positiva-b06' },
    { nombre: '1.7 BROCA MDI HELICOIDAL ACABADO-DESBASTE POSITIVA', referencias: 20, enlace: '/broca_mdi_desbaste_y_acabado' },
    { nombre: '1.8 BROCA MDI HELICOIDAL ACABADO POSITIVO-NEGATIVA', referencias: 14, enlace: '/broca_mdi_positiva_negativa' },
    { nombre: '1.9 BROCA MDI HELICOIDAL ACABADO POSITIVO-NEGATIVA CON RECUBRIMIENTO DE PLATINO', referencias: 13, enlace: '/broca-mdi-acabado-pos-neg-rec-platino' },
    { nombre: '1.10 BROCA MDI HELICOIDAL ACABADO POSITIVA CON ROMPEVIRUTA Z3 (BA10)', referencias: 15, enlace: '/broca_mdi_z3_ba10' },
    { nombre: '1.11 BROCA MDI HELICOIDAL ACABADO POSITIVA CON ROMPEVIRUTA Z3 (BA11)', referencias: 5, enlace: '/broca_mdi_ba11' },
    { nombre: '1.12 BROCA MDI HELICOIDAL DESBASTE POSITIVA Z3 (BD12)', referencias: 32, enlace: '/broca_mdi_desbe_pos_bd12' },
    { nombre: '1.13 BROCA MDI HELICOIDAL DESBASTE POSITIVA Z3 (BD13 y BP13)', referencias: 31, enlace: '/broca_mdi_desbaste_bd13' },
    { nombre: '1.14 BROCA MDI HELICOIDAL ACABADO POSITIVA CON ROMPEVIRUTA Z3 (BA14)', referencias: 11, enlace: '/broca_mdi_z3_ba14' },
    { nombre: '1.15 BROCA MDI HELICOIDAL DESBASTE EN CNC PARA CAJEADOS Z3', referencias: 8, enlace: '/broca_mdi_desbaste_cnc_cajeados' },
    { nombre: '1.16 BROCA MDI HELICOIDAL DESBASTE EN CNC CON BISEL 60º PARA CAJEADOS Z3', referencias: 2, enlace: '/broca_mdi_desbaste_z3_con_bisel' },
    { nombre: '1.17 BROCA MDI HELICOIDAL PUNTA DE BOLA Z2', referencias: 5, enlace: '/broca_mdi_punta_de_bola' },
    { nombre: '1.18 BROCA MDI HELICOIDAL ACABADO POSITIVO Z1 PARA PLASTICOS', referencias: 20, enlace: '/broca_mdi_z1_pos_especial_plasticos' },
    { nombre: '1.19 BROCA MDI HELICOIDAL ACABADO NEGATIVO Z1 PARA PLASTICOS', referencias: 12, enlace: '/broca_mdi_z1_neg_plasticos' },
    { nombre: '1.20 BROCA MDI HELICOIDAL ACABADO Z1 PARA METACRILATO', referencias: 9, enlace: '/broca_mdi_z1_metacrilato' },
    { nombre: '1.21 BROCA MDI HELICOIDAL ACABADO Z1 PARA ALUMINIO', referencias: 19, enlace: '/broca_mdi_z1_especial_aluminio' },
    { nombre: '1.22 BROCA MDI HELICOIDAL ACABADO Z2 PARA ALUMINIO Y PLASTICOS', referencias: 18, enlace: '/broca_mdi_aluminio_y_plasticos' },
    { nombre: '1.23 BROCA MDI HELICOIDAL ACABADO Z3 PARA PVC (BA23)', referencias: 13, enlace: '/broca-mdi-acabado-z3-para-pvc-ba23' },
    { nombre: '1.24 BROCA MDI HELICOIDAL ACABADO Z3 PARA PVC (BD24)', referencias: 9, enlace: '/broca-mdi-acabado-z3-para-pvc-bd24' },
    { nombre: '1.25 BROCA MDI HELICOIDAL ACABADO Z2 RADIO CONVEXO', referencias: 13, enlace: '/broca_mdi_radio_convexo' },
    { nombre: '1.26 BROCA MDI HELICOIDAL DESBASTE Z3', referencias: 5, enlace: '/broca_mdi_desbaste_z3' },
    { nombre: '1.27 BROCA MDI HELICOIDAL ACABADO Z3 (BA27)', referencias: 3, enlace: '/broca_mdi_helicoidal_ba27' },
    { nombre: '1.28 BROCA MDI HELICOIDAL PARA DOBLADO DE ALUCOBOND Z1', referencias: 4, enlace: '/broca-mdi-helicoidal-doblado-alucobond' },
];
</script>

<template>
    
    <SeccionHerramientas tituloSeccion="SERIE 1. BROCAS HELICOIDALES MDI" :productos="listaBrocas" />
</template>