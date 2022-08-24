<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title . ' - ' : null }}Laravel Bootcamp</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
        <link rel="shortcut icon" href="/img/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#ff2d20">
        <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <meta name="color-scheme" content="light">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.theme === 'system') {
                    if (e.matches) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });

            function updateTheme() {
                if (!('theme' in localStorage)) {
                    localStorage.theme = 'system';
                }

                switch (localStorage.theme) {
                    case 'system':
                        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                        document.documentElement.setAttribute('color-theme', 'system');
                        break;

                    case 'dark':
                        document.documentElement.classList.add('dark');
                        document.documentElement.setAttribute('color-theme', 'dark');
                        break;

                    case 'light':
                        document.documentElement.classList.remove('dark');
                        document.documentElement.setAttribute('color-theme', 'light');
                        break;
                }
            }

            updateTheme();
        </script>
    </head>
    <body
        x-data="{ navIsOpen: false }"
        class="font-sans text-gray-900 antialiased"
    >
        @yield('content')
    </body>
</html>
