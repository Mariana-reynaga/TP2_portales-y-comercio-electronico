import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors:{
                'black': '#030706',
                'white': '#f8fcfb',
                'primary': '#69aba7',
                'secondary': '#a0a7ca',
                'accent': '#4e4683'
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                lilita: ['Lilita One'],
                outfit: ['Outfit']
            },
        },
    },
    plugins: [],
};
