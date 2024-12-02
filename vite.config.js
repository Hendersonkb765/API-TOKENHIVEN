import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/css/style.css',
                    'resources/css/login.css',
                    'resources/css/colors.css'
                ],
            refresh: true,
        }),
    ],
});
