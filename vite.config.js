import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Http/Livewire/**/*.php',
        './app/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Instrument Sans', ...defaultTheme.fontFamily.sans],
                display: ['Cormorant Garamond', 'Georgia', 'serif'],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: {
                    50:  '#f0f7f4',
                    100: '#dceee6',
                    200: '#bbdcce',
                    300: '#8dc3ae',
                    400: '#5ea48a',
                    500: '#3d8870',
                    600: '#2d6e59',
                    700: '#255849',
                    800: '#1f463b',
                    900: '#1b3b32',
                    950: '#0e211d',
                },
                gold: {
                    50:  '#fdf9ed',
                    100: '#f9efcc',
                    200: '#f2db95',
                    300: '#ebc25d',
                    400: '#e4aa35',
                    500: '#d4901f',
                    600: '#bb7019',
                    700: '#995118',
                    800: '#7d4019',
                    900: '#683619',
                    950: '#3c1c0a',
                },
            },
            backgroundImage: {
                'hero-pattern': "url('/images/hero-pattern.svg')",
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
                'fade-in': 'fadeIn 0.5s ease-out forwards',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
            },
        },
    },

    plugins: [forms, typography],
};