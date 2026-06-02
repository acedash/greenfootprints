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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'mint-offwhite': '#eaf7f1',
                'mint-dark': '#b9dbcc',
            },
            boxShadow: {
                'neumorphic': '8px 8px 16px #cdd9d4, -8px -8px 16px #ffffff',
                'neumorphic-sm': '4px 4px 8px #cdd9d4, -4px -4px 8px #ffffff',
                'neumorphic-inner': 'inset 6px 6px 12px #cdd9d4, inset -6px -6px 12px #ffffff',
            }
        },
    },

    plugins: [forms],
};
