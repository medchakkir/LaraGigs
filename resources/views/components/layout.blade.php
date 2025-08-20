<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
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
    </style>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body
    class="bg-gray-50 dark:bg-slate-900 text-gray-800 dark:text-gray-100 antialiased transition-colors duration-200 min-h-screen flex flex-col">
    <nav
        class="sticky top-0 z-50 bg-white/80 dark:bg-slate-800/90 backdrop-blur border-b border-gray-200 dark:border-slate-700">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex h-16 items-center justify-between">
                <a href="/" class="flex items-center gap-3">
                    <img class="h-9 w-auto" src="{{ asset('images/logo.png') }}" alt="LaraGigs logo" />
                    <span class="sr-only">LaraGigs</span>
                </a>
                <ul class="flex items-center gap-3 text-sm font-medium">
                    <li>
                        <button id="theme-toggle"
                            class="inline-flex items-center gap-2 rounded-full border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-3 py-2 text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-slate-600 transition">
                            <i class="fa-solid fa-sun dark:hidden"></i>
                            <i class="fa-solid fa-moon hidden dark:inline"></i>
                            <span class="sr-only">Toggle theme</span>
                        </button>
                    </li>
                    @auth
                        <li>
                            <a href="/listings/manage"
                                class="hover:text-laravel hover:border-laravel/40 inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-2 text-gray-700 shadow-sm transition dark:border-slate-600 dark:bg-slate-700 dark:text-gray-200">
                                <i class="fa-solid fa-gear"></i>
                                Manage Gigs
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button
                                    class="bg-laravel inline-flex items-center gap-2 rounded-full px-4 py-2 shadow-sm transition hover:bg-gray-200 dark:hover:bg-slate-600">
                                    <i class="fa-solid fa-door-closed"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                    <li>
                        <a href="/register"
                            class="inline-flex items-center gap-2 rounded-full border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-2 text-gray-700 dark:text-gray-200 shadow-sm hover:text-laravel hover:border-laravel/40 transition">
                            <i class="fa-solid fa-user-plus"></i>
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="login.html"
                            class="inline-flex items-center gap-2 rounded-full bg-laravel px-4 py-2 text-white shadow-sm hover:bg-red-600 transition">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-1">

        {{ $slot }}

    </main>

    <!-- Stack for page-specific floating buttons -->
    @stack('fab')

    <footer class="border-t border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
        <div class="max-w-6xl mx-auto px-4 h-20 flex items-center justify-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">Copyright &copy; 2022, All Rights reserved</p>
        </div>
    </footer>

    <x-flash-message />

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
