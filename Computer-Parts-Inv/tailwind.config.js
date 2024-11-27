import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            clipPath: {
                'custom' : 'polygon(0 0, 50% 0, 100% 100%, 0 100%)',
            },
            backgroundImage: {
                'custom-image': "url('C:\Users\Chryssdale\OneDrive\Documents\BSIT_third_Year\ELECT1\Finals\PortfolioWebsite\Computer-Parts-Inv\computer.jpg')",
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('preline/plugin', 'tailwindcss-clip-path'),    
        forms
    ],
};
