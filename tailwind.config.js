const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                gray: {
                    900: '#232323',
                    800: '#222222',
                    700: '#565454',
                    600: '#777777',
                    500: '#93939e',
                    400: '#b5b5bd',
                    300: '#d7d7dc',
                    200: '#e7e8f2',
                    100: '#f5f5fa',
                    50: '#fbfbfd',
                },
                dark: {
                    900: '#0C0D12',
                    800: '#12141C',
                    700: '#171923',
                    600: '#252A37',
                    500: '#394056',
                },
                red: {
                    900: '#981d15',
                    800: '#ca473f',
                    700: '#ec0e00',
                    600: '#eb4432',
                    500: '#f9322c',
                },
            },
            fontFamily: {
                sans: ['scandia-web', ...defaultTheme.fontFamily.sans],
                mono: ['source-code-pro', ...defaultTheme.fontFamily.mono],
            },
            maxWidth: {
                '8xl': '88rem',
            },
            keyframes: {
                cube: {
                    '50%': { transform: 'translateY(1rem)' },
                },
            },
            animation: {
                cube: 'cube 12s ease-in-out infinite',
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-links': theme('colors.red[600]'),
                        '--tw-prose-code': theme('colors.red[800]'),
                        '--tw-prose-pre-bg': 'none',
                        h1: {
                            fontSize: '2.5rem',
                            fontWeight: '500',
                        },
                        h2: {
                            fontSize: '1.75rem',
                            fontWeight: '400',
                        },
                        h3: {
                            fontSize: '1.25rem',
                            fontWeight: '500',
                        },
                        a: {
                            fontWeight: theme('fontWeight.normal'),
                        },
                        code: {
                            background: theme('colors.gray[50]'),
                            fontWeight: theme('fontWeight.normal'),
                            borderRadius: '.125rem',
                            padding: '0 .125em',
                        },
                        'code::before': {
                            content: '',
                        },
                        'code::after': {
                            content: '',
                        },
                        kbd: {
                            background: theme('colors.gray[50]'),
                            padding: '0 .25em',
                        },
                        pre: {
                            paddingBottom: 0,
                            paddingLeft: 0,
                            paddingRight: 0,
                            paddingTop: 0,
                        },
                    },
                },
                invert: {
                    css: {
                        '--tw-prose-links': theme('colors.red[600]'),
                        '--tw-prose-code': theme('colors.red[600]'),
                        '--tw-prose-pre-bg': 'none',
                        code: {
                            background: theme('colors.dark[600]'),
                        },
                        kbd: {
                            background: theme('colors.gray[800]'),
                        },
                    },
                },
            }),
        },
    },
    plugins: [require('@tailwindcss/typography')],
}
