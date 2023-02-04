import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/ranges.js',
                'resources/js/colors.js',
            ],
            refresh: true,
        }),
    ],
});
