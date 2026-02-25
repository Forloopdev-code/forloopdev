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
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            'jet':          '#363537',
            'trueBlue':     '#3066BE',
            'platinum':     '#E0E0E0',
            'pistachio':    '#8ED081',
            'persianGreen': '#1EA896',
            'white':        '#ffffff',
            'black':        '#000000',
            'transparent':  'transparent',
            'current':      'currentColor',
            neutral: {
                50:  '#fafafa',
                100: '#f5f5f5',
                200: '#e5e5e5',
                300: '#d4d4d4',
                400: '#a3a3a3',
                500: '#737373',
                600: '#525252',
                700: '#404040',
                800: '#262626',
                900: '#171717',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'brand-gradient': 'linear-gradient(135deg, #8ED081 0%, #1EA896 50%, #3066BE 100%)',
                'brand-gradient-r': 'linear-gradient(to right, #8ED081, #1EA896, #3066BE)',
                'hero-overlay': 'linear-gradient(to bottom, rgba(54,53,55,0.7) 0%, rgba(54,53,55,0.85) 100%)',
            },
        },
    },

    plugins: [forms, typography],
};
