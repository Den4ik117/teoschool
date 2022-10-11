import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/index.scss',
                'resources/js/index.js',
            ],
            refresh: true,
        }),
        vue()
    ],
});