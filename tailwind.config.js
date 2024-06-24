import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'xs': '480px',    // Custom extra small breakpoint
                'sm': '640px',    // Small breakpoint
                'md': '768px',    // Medium breakpoint
                'lg': '1024px',   // Large breakpoint
                'xl': '1280px',   // Extra large breakpoint
                '2xl': '1536px',  // 2X large breakpoint
              },
        },
    },

    plugins: [forms, typography,require('flowbite/plugin')],
};
