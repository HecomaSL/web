import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        // Aumentamos el límite de aviso para que no se queje tanto con librerías grandes
        chunkSizeWarningLimit: 1000, 
        rollupOptions: {
            output: {
                // ESTRATEGIA DE CACHÉ: Separar librerías pesadas en archivos propios
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        // Creamos un archivo solo para Vue y Pinia (que cambian poco)
                        if (id.includes('vue') || id.includes('pinia')) {
                            return 'vendor-core';
                        }
                        // Las demás librerías en un paquete genérico de terceros
                        return 'vendor-libs';
                    }
                },
                // Aseguramos que los nombres usen hashes para romper la caché solo cuando cambien
                entryFileNames: `assets/[name]-[hash].js`,
                chunkFileNames: `assets/[name]-[hash].js`,
                assetFileNames: `assets/[name]-[hash].[ext]`,
            },
        },
    },
});