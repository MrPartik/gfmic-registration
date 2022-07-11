/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './src/**/*.{html,js}',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        borderColor: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus'],
        textColor: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus'],
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('tw-elements/dist/plugin')],
};
