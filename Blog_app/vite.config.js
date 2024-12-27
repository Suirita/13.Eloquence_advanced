import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                admin: ['resources/js/admin.js', 'resources/sass/admin.scss'],
                public: ['resources/js/public.js', 'resources/sass/public.scss'],
            },
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                quietDeps: true, // Suppresses deprecation warnings from dependencies
            },
        },
    },
});
