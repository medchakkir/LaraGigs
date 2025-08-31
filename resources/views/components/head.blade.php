<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Find the best Laravel jobs and projects on LaraJobs." />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Alpine.js v3 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.9/cdn.js"
        integrity="sha512-Qg4yHOPXaMOpvyQ8hk5ZVYUIXGE/0hxftn0lecaz04ohvI0ytM7AXpSzK1sfcYk79B1WexR3nG37Q/JboHLB2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        };
    </script>

    <style>
        html {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Focus styles for better accessibility - remove default outlines */
        .focus-ring:focus {
            outline: none !important;
        }

        .focus-ring:focus-visible {
            outline: 2px solid #ef3b2d !important;
            outline-offset: 2px !important;
        }

        /* Remove default button and link outlines */
        button:focus,
        a:focus,
        input:focus,
        textarea:focus,
        select:focus {
            outline: none !important;
        }

        /* Custom focus styles for form elements */
        input:focus-visible,
        textarea:focus-visible,
        select:focus-visible {
            outline: 2px solid #ef3b2d !important;
            outline-offset: 2px !important;
        }
    </style>

    <title>@yield('title', 'LaraJobs | Find Laravel Jobs & Projects')</title>
</head>
