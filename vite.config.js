import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
// import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/frontend/app.css',
            'resources/css/backend/app.css',
            'resources/js/frontend/app.js',
            'resources/js/backend/app.js',
        ]),

        // react(),
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
    ],
    // resolve @ (added by vijay goswami https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-laravel-mix-to-vite)
    resolve: {
        alias: {
            '@': '/resources/js/frontend'
        }
    }
});
