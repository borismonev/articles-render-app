import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // your SCSS file
                'resources/css/app.css', // your SCSS file
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
