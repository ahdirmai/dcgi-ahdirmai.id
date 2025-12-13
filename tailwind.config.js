import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', 'serif'],
            },
            colors: {
                elegant: {
                    black: '#050505',
                    charcoal: '#0F0F0F',
                    red: '#720000',
                    redlight: '#A50000',
                    gold: '#C5A059',
                    text: '#E0E0E0'
                }
            },
        },
    },

    plugins: [forms],
};
