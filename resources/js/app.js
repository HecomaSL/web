import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import { createPinia } from 'pinia';
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title}`,
    // OPTIMIZACIÓN 1: Verificamos que el glob sea perezoso (por defecto lo es, pero se puede forzar)
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();
        pinia.use(piniaPluginPersistedstate);

        const app = createApp({ render: () => h(App, props) });
        
        // OPTIMIZACIÓN 2: Configuración de Performance para Vue
        app.config.performance = true; 

        app.use(plugin)
           .use(ZiggyVue)
           .use(pinia)
           .mount(el);
    },
    // OPTIMIZACIÓN 3: Progress Bar más ligero
    progress: { 
        color: '#0000BB',
        includeCSS: true,
        showSpinner: false, // Quitar el spinner ahorra micro-tareas de JS
    },
});