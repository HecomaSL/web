import { ref, computed, watch } from 'vue';

const misNoticias = [
    // --- 2026 ---
    { url: "/incorporamos-vollmer-qxd250-a-produccion", title: "Incorporamos Vollmer QXD250 a produccion", img: "/images/noticias/Vollmer_QXD250.jpeg", desc: "Hemos incorporado un nuevo robot Vollmer QXD250, una solución de última generación destinada al acabado y mantenimiento de herramientas con superficies de corte fabricadas en diamante policristalino", cat: "b2" },
    { url: "/nuestras-brocas-helicoidales/", title: "Nuestras Brocas helicoidales", img: "/images/brocas/brocas_mdi.png", desc: "Nuestras brocas MDI helicoidales son el estándar de oro para centros de trabajo CNC que exigen velocidad, evacuación eficiente de viruta y una vida útil prolongada en materiales abrasivos", cat: "b4" },
    { url: "/que-material-elegir-para-tus-fresas/", title: "¿Fresas de Metal Duro o de Acero Rápido?", img: "/images/fresas/f15.jpg", desc: "La duda entre elegir fresas de Metal Duro o Acero Rápido es una constante en el taller. Comprender la metalurgia de cada una es vital para optimizar tiempos de producción para garantizar la rentabilidad de cada proyecto.", cat: "b3" },
    { url: "/reafilar-o-comprar-nuevo/", title: "¿Reafilar o comprar nuevo?", img: "/images/servicios/afilado-calidad-2.jpg", desc: "Cómo saber cuándo tu herramienta ha llegado al límite.", cat: "b3" },
    { url: "/mejor-fresa-para-galces/", title: "¿Cómo elegir las mejores fresas para galces?", img: "/images/fresas/f14.jpg", desc: "Comparativa entre cortes rectos y axiales. Aprende a evitar el astillado en melaminas usando sistemas con precortadores V4.", cat: "b4" },
    { url: "/como-elegir-fresas-para-ranurar/", title: "¿Cómo elegir las mejores fresas para ranurar?", img: "/images/fresas/f10.jpg", desc: "Guía técnica para evitar el astillado y elegir la fresa ideal según el número de dientes y el material.", cat: "b4" },
    // --- 2024 ---
    { url: "/nueva-abm-premium-para-mejorar-produccion/", title: "Nueva ABM Premium", img: "/images/noticias/robot-abm.jpg", desc: "Seguimos avanzando: Nueva ABM Premium para mejorar nuestra producción.", cat: "b2" },
    // --- 2023 ---
    { url: "/incorporamos-robot-vollmer-qxd250/", title: "Robot VOLLMER QXD250", img: "/images/noticias/robot-vollmer-qxd250.png", desc: "Incorporamos a nuestra cadena de producción el robot VOLLMER QXD250 en Sonseca.", cat: "b2" },
    // --- 2022 ---
    { url: "/colaboracion-de-hormacesa-hecoma-y-crn/", title: "Hormacesa, Hecoma y el CRN", img: "/images/noticias/AlcazabaMalaga_3.jpg", desc: "Colaboración para dar presencia a un poema de Vicente Aleixandre en Málaga.", cat: "b1" },
    // --- 2021 ---
    { url: "/reparacion-herramientas-de-corte-maxima-calidad/", title: "Reparación de Herramientas", img: "/images/noticias/fresaz4_4usada.jpg", desc: "Reparación de herramientas de corte con la máxima calidad Hecoma.", cat: "b3" },
    { url: "/nuevos-embalajes-para-herramientas-hecoma/", title: "Nuevos Embalajes Hecoma", img: "/images/historia/hecoma-paquete.jpg", desc: "Mejoramos la protección y presentación de nuestras herramientas.", cat: "b1" },
    { url: "/herramienta-corte-a-medida-facil/", title: "Herramientas a medida", img: "/images/historia/conjunto.jpg", desc: "Descubre lo fácil y rápido que es obtener tu herramienta personalizada.", cat: "b3" },
    { url: "/obtener-la-maxima-rentabilidad-de-su-herramienta-con-hecoma/", title: "Máxima Rentabilidad", img: "/images/historia/hecoma-fabricacion.jpg", desc: "Cómo obtener el mejor rendimiento de sus herramientas de corte.", cat: "b3" },
    { url: "/produccion-wolframio/", title: "El Wolframio o Tungsteno", img: "/images/noticias/wolframio.jpg", desc: "La importancia de este material en la fabricación de metal duro.", cat: "b1" },
    { url: "/herramientas-de-diamante-pcd/", title: "Herramientas de Diamante PCD", img: "/images/noticias/fresa_mango_a_medida.jpg", desc: "Rendimiento superior: entre 60 y 150 veces más que el metal duro.", cat: "b1" },
    { url: "/fresas-de-unero/", title: "Fresa Uñero", img: "/images/noticias/fresa-unero.jpg", desc: "El 65% de clientes nos demandan herramienta para este trabajo.", cat: "b3" },
    { url: "/la-agencia-idea-se-interesa-por-nuestro-proyecto", title: "Agencia IDEA", img: "/images/noticias/agencia_idea.jpg", desc: "Nuestro proyecto empresarial sigue desarrollándose, y para ello ahora contamos con la Agencia IDEA.", cat: "b4" },
    // --- 2020 ---
    { url: "/incorporamos-walter-heliotronic-power-diamond-400/", title: "Walter Heliotronic Power Diamond", img: "/images/noticias/walter-heliotronic.jpg", desc: "Nueva tecnología 400 en nuestra fábrica de Sonseca.", cat: "b2" },
    { url: "/nuevo-robot-de-afilado-abm", title: "Robot Afilado ABM", img: "/images/noticias/robot-abm.jpg", desc: "el pasado mes de Enero, se incorporó a nuestra planta de Lucena un nuevo robot de afilado ABM Premium-Load 3600.", cat: "b2" }
];

export function useNoticias() {
    const filtrosSeleccionados = ref([]);
    const indicePagina = ref(6);
    const cargando = ref(false);

    // Filtrado basado en la propiedad 'cat' de tus objetos
    const noticiasFiltradas = computed(() => {
        if (filtrosSeleccionados.value.length === 0)
            return misNoticias;
        
        return misNoticias.filter(n => filtrosSeleccionados.value.includes(n.cat));
    });

    // Subconjunto de noticias a mostrar (Paginación)
    const noticiasAMostrar = computed(() => { return noticiasFiltradas.value.slice(0, indicePagina.value); });

    const cargarMas = () => {
        if (cargando.value) return;
        if (indicePagina.value >= noticiasFiltradas.value.length) return;
        cargando.value = true;
        // Simulación de carga para UI
        setTimeout(() => { indicePagina.value += 4; cargando.value = false; }, 500);
    };

    const resetIndex = () => { indicePagina.value = 6; };

    // Si cambian los filtros, volvemos a mostrar las primeras 6
    watch(filtrosSeleccionados, () => { resetIndex(); });
    return { filtrosSeleccionados, noticiasAMostrar, noticiasFiltradas, cargando, cargarMas, resetIndex };
}