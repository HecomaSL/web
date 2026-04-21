import { ref, computed } from 'vue';

export function useNoticias() {
    const misNoticias = [
        { 
            url: "/incorporamos-vollmer-qxd250-a-produccion", 
            title: "Incorporamos Vollmer QXD250 a produccion", 
            img: "https://hecoma.com/wp-content/uploads/2026/04/Vollmer-QXD250-_-3.jpeg", 
            desc: "Hemos incorporado un nuevo robot Vollmer QXD250, una solución de última generación destinada al acabado y mantenimiento de herramientas con superficies de corte fabricadas en diamante policristalino", 
            cat: "b2" 
        },
        { 
            url: "/nuestras-brocas-helicoidales", 
            title: "Nuestras Brocas helicoidales", 
            img: "https://hecoma.com/wp-content/uploads/2026/03/img_brocas.png", 
            desc: "Nuestras brocas MDI helicoidales son el estándar de oro para centros de trabajo CNC que exigen velocidad, evacuación eficiente de viruta y una vida útil prolongada en materiales abrasivos", 
            cat: "b4" 
        },
        { 
            url: "/que-material-elegir-para-tus-fresas", 
            title: "¿Fresas de Metal Duro o de Acero Rápido?", 
            img: "https://hecoma.com/wp-content/uploads/2021/03/P6-F15-F-scaled.jpg", 
            desc: "La duda entre elegir fresas de Metal Duro o Acero Rápido es una constante en el taller. Comprender la metalurgia de cada una es vital para optimizar tiempos de producción.", 
            cat: "b3" 
        },
        { 
            url: "/reafilar-o-comprar-nuevo", 
            title: "¿Reafilar o comprar nuevo?", 
            img: "https://hecoma.com/wp-content/uploads/2020/11/afilado-calidad-3-scaled.jpg", 
            desc: "Cómo saber cuándo tu herramienta ha llegado al límite y cuándo el mantenimiento preventivo es la mejor opción.", 
            cat: "b3" 
        },
        { 
            url: "/mejor-fresa-para-galces", 
            title: "¿Cómo elegir las mejores fresas para galces?", 
            img: "https://hecoma.com/wp-content/uploads/2021/11/P5-F14-F-980x735.jpg", 
            desc: "Comparativa entre cortes rectos y axiales. Aprende a evitar el astillado en melaminas usando sistemas con precortadores V4.", 
            cat: "b4" 
        },
        { 
            url: "como-elegir-fresas-para-ranurar", 
            title: "¿Cómo elegir las mejores fresas para ranurar?", 
            img: "https://hecoma.com/wp-content/uploads/2021/03/f10fresa-para-ranurar-z4.jpg", 
            desc: "Guía técnica para evitar el astillado y elegir la fresa ideal según el número de dientes y el material.", 
            cat: "b4" 
        },
        { 
            url: "/nueva-abm-premium-para-mejorar-produccion", 
            title: "Nueva ABM Premium", 
            img: "https://hecoma.com/wp-content/uploads/2020/11/robot-abm.jpg", 
            desc: "Seguimos avanzando: Nueva ABM Premium para mejorar nuestra producción de herramientas de corte.", 
            cat: "b2" 
        },
        { 
            url: "/incorporamos-robot-vollmer-qxd250", 
            title: "Robot VOLLMER QXD250", 
            img: "https://hecoma.com/wp-content/uploads/2023/11/Captura-de-pantalla-2023-11-15-131336-1080x675.png", 
            desc: "Incorporamos a nuestra cadena de producción el robot VOLLMER QXD250 en Sonseca para herramientas PCD.", 
            cat: "b2" 
        },
        { 
            url: "/colaboracion-de-hormacesa-hecoma-y-crn", 
            title: "Hormacesa, Hecoma y el CRN", 
            img: "https://hecoma.com/wp-content/uploads/2022/02/AlcazabaMalaga_3.jpg", 
            desc: "Colaboración para dar presencia a un poema de Vicente Aleixandre en Málaga.", 
            cat: "b1" 
        },
        { 
            url: "/reparacion-herramientas-de-corte-maxima-calidad", 
            title: "Reparación de Herramientas", 
            img: "https://hecoma.com/wp-content/uploads/2021/09/reparada1-300x251.jpg", 
            desc: "Reparación de herramientas de corte con la máxima calidad Hecoma.", 
            cat: "b3" 
        },
        { 
            url: "/nuevos-embalajes-para-herramientas-hecoma", 
            title: "Nuevos Embalajes Hecoma", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/Video-pantalla-interna.mp4_snapshot_01.27-1024x576-1.jpg", 
            desc: "Mejoramos la protección y presentación de nuestras herramientas durante el transporte.", 
            cat: "b1" 
        },
        { 
            url: "/herramienta-corte-a-medida-facil", 
            title: "Herramientas a medida", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/Conjunto-1080x675.jpg", 
            desc: "Descubre lo fácil y rápido que es obtener tu herramienta personalizada con nuestros técnicos.", 
            cat: "b3" 
        },
        { 
            url: "/obtener-la-maxima-rentabilidad-de-su-herramienta-con-hecoma", 
            title: "Máxima Rentabilidad", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/Video-pantalla-interna.mp4_snapshot_01.57-980x551.jpg", 
            desc: "Cómo obtener el mejor rendimiento de sus herramientas de corte mediante el afilado profesional.", 
            cat: "b3" 
        },
        { 
            url: "/produccion-wolframio", 
            title: "El Wolframio o Tungsteno", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/Wolframite_from_Portugal.jpg", 
            desc: "La importancia de este material en la fabricación de metal duro para la industria maderera.", 
            cat: "b1" 
        },
        { 
            url: "/herramientas-de-diamante-pcd", 
            title: "Herramientas de Diamante PCD", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/fresa_diamante-800x675.jpg", 
            desc: "Rendimiento superior: entre 60 y 150 veces más que el metal duro convencional.", 
            cat: "b1" 
        },
        { 
            url: "/fresas-de-unero", 
            title: "Fresa Uñero", 
            img: "https://hecoma.com/wp-content/uploads/2021/06/DetalleUneros.jpg", 
            desc: "El 65% de clientes nos demandan herramienta para este trabajo específico en puertas y muebles.", 
            cat: "b3" 
        },
        { 
            url: "/la-agencia-idea-se-interesa-por-nuestro-proyecto", 
            title: "Agencia IDEA", 
            img: "https://hecoma.com/wp-content/uploads/2021/03/hecoma-idea-1080x675.jpg", 
            desc: "Nuestro proyecto empresarial sigue desarrollándose con el apoyo de la Agencia IDEA.", 
            cat: "b4" 
        },
        { 
            url: "/incorporamos-walter-heliotronic-power-diamond-400", 
            title: "Walter Heliotronic Power Diamond", 
            img: "https://hecoma.com/wp-content/uploads/2020/11/WALTER1-1080x675.jpg", 
            desc: "Nueva tecnología Walter 400 en nuestra fábrica de Sonseca para un afilado impecable.", 
            cat: "b2" 
        },
        { 
            url: "/nuevo-robot-de-afilado-abm", 
            title: "Robot Afilado ABM", 
            img: "https://hecoma.com/wp-content/uploads/2020/11/robot-abm.jpg", 
            desc: "Incorporación en nuestra planta de Lucena de un nuevo robot de afilado ABM Premium-Load 3600.", 
            cat: "b2" 
        }
    ];

    const filtrosSeleccionados = ref([]);
    const indexVisibles = ref(5);
    const cargando = ref(false);

    const noticiasFiltradas = computed(() => {
        if (filtrosSeleccionados.value.length === 0) 
            return misNoticias;
        return misNoticias.filter(n => filtrosSeleccionados.value.includes(n.cat));
    });

    const noticiasAMostrar = computed(() => { return noticiasFiltradas.value.slice(0, indexVisibles.value); });

    const cargarMas = () => {
        if (cargando.value || noticiasAMostrar.value.length >= noticiasFiltradas.value.length)
            return;
        
        cargando.value = true;
        setTimeout(() => { indexVisibles.value += 5; cargando.value = false; }, 600);
    };

    const resetIndex = () => {
        indexVisibles.value = 5;
    };

    return { filtrosSeleccionados, noticiasAMostrar, noticiasFiltradas, cargando, cargarMas, resetIndex };
}