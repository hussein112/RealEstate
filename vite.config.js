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
                'resources/js/settings.txt.js',

                'resources/css/admin/style.css',

                'resources/js/admin/colors.js',
                'resources/js/admin/passwords.js',
                'resources/js/admin/sidebar.js',
                'resources/js/admin/tooltips.js',
                'resources/js/admin/settings.txt.js',
                'resources/js/admin/charts.js',
                'resources/js/admin/features.js',



                'resources/css/employee/style.css',
                'resources/js/employee/settings.txt.js',
                'resources/js/employee/sidebar.js',
                'resources/js/employee/passwords.js',


                'resources/js/editorScaffolding.js'

            ],
            refresh: true,
        }),
    ],
});
