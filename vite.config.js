import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/app.scss',
            'resources/scss/theme.scss',
            'resources/js/app.js',
            'resources/js/theme.js',
        ]),
    ],
});

//npm i scss -D
