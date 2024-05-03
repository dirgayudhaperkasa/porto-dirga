import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/meyawo.css',
                'resources/css/themify-icons.css',
                'resources/js/jquery-3.4.1.js',
                'resources/js/bootstrap.bundle.js',
                'resources/js/bootstrap.affix.js',
                'resources/js/meyawo.js'
            ],
            refresh: true,
        }),
    ],
});
