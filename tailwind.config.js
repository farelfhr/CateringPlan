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
        container: {
            center: true,
            padding: '2rem',
            screens: {
                '2xl': '1400px'
            }
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                heading: ['Poppins', 'sans-serif'],
            },
            colors: {
                primary: '#FF90BB',      // Pink
                secondary: '#FFC1DA',    // Light Pink
                accent: '#8ACCD5',       // Blue
                background: '#F8F8E1',   // Cream
                brown: '#945034',
                'cute-pink': '#FFD1DC',
                'mint-green': '#98FF98',
                'soft-yellow': '#FFFACD',
                'warm-peach': '#FFCCCB',
                'baby-blue': '#89CFF0',
                'lavender': '#E6E6FA',
                primarygreen: '#5F8B4C',
                primaryyellow: '#FFDDAB',
                primarypink: '#FF9A9A',
                cream: '#FFF7ED',
                softpink: '#F9C6D1',
                rose: '#F7A4A4',
                peach: '#FFD6A5',
                mint: '#C7F9CC',
                navy: '#3A405A',
                'pink-pastel': {
                    50: '#fdf2f8',
                    100: '#fce7f3',
                    200: '#fbcfe8',
                    300: '#f9a8d4',
                    400: '#f472b6',
                    500: '#ec4899',
                    600: '#db2777',
                    700: '#be185d',
                    800: '#9d174d',
                    900: '#831843',
                },
                'rose-pastel': {
                    50: '#fff1f2',
                    100: '#ffe4e6',
                    200: '#fecdd3',
                    300: '#fda4af',
                    400: '#fb7185',
                    500: '#f43f5e',
                    600: '#e11d48',
                    700: '#be123c',
                    800: '#9f1239',
                    900: '#881337',
                },
            },
            borderRadius: {
                '4xl': '2rem',
            },
            animation: {
                'bounce-gentle': 'bounce-gentle 2s infinite',
                'float': 'float 3s ease-in-out infinite',
                'wiggle': 'wiggle 1s ease-in-out infinite',
            },
            keyframes: {
                'bounce-gentle': {
                    '0%, 100%': { transform: 'translateY(0)', animationTimingFunction: 'cubic-bezier(0,0,0.2,1)' },
                    '50%': { transform: 'translateY(-5px)', animationTimingFunction: 'cubic-bezier(0.8,0,1,1)' }
                },
                'float': {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' }
                },
                'wiggle': {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' }
                }
            }
        },
    },

    plugins: [forms],
};
