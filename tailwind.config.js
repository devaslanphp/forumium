/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './node_modules/flowbite/**/*.js',
        './vendor/filament/**/*.blade.php',
        './app/Http/Livewire/**/*.php',
        './app/Filament/Resources/**/*.php'
    ],
    theme: {
        extend: {
            colors: {
                'custom-primary': "#f8d481",
                'custom-primary-hover': "#f1d07c",
                'custom-foreground-primary': '#202124',
                danger: colors.rose,
                primary: colors.stone,
                success: colors.green,
                warning: colors.yellow,
            },
            maxWidth:{
                '5xl': '1075px',
            },
            fontFamily:{
                'sans': 'Roboto',
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwindcss-textshadow')
    ],
}
