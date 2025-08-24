<nav class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur dark:border-slate-700 dark:bg-slate-800/90"
    role="navigation" aria-label="Main navigation">
    <div class="mx-auto max-w-6xl px-4">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center gap-3" aria-label="Go to homepage">
                <img class="h-9 w-auto" src="{{ asset('images/logo.png') }}" alt="LaraJobs logo" />
                <span class="sr-only">LaraJobs</span>
            </a>

            <ul class="flex items-center gap-3 text-sm font-medium" role="menubar">
                <li role="none">
                    <button id="theme-toggle" type="button"
                        class="focus:ring-laravel inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-2 text-gray-700 shadow-sm transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-200 dark:hover:bg-slate-600"
                        aria-label="Toggle dark mode" role="menuitem">
                        <i class="fa-solid fa-sun dark:hidden" aria-hidden="true"></i>
                        <i class="fa-solid fa-moon hidden dark:inline" aria-hidden="true"></i>
                        <span class="sr-only">Toggle theme</span>
                    </button>
                </li>

                @auth
                    <li role="none">
                        <a href="/listings/manage"
                            class="hover:text-laravel hover:border-laravel/40 focus:ring-laravel inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-2 text-gray-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-200"
                            role="menuitem" aria-label="Manage your job listings">
                            <i class="fa-solid fa-gear" aria-hidden="true"></i>
                            My Listings
                        </a>
                    </li>
                    <li role="none">
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-laravel inline-flex items-center gap-2 rounded-full px-4 py-2 text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                role="menuitem" aria-label="Logout from your account">
                                <i class="fa-solid fa-door-closed" aria-hidden="true"></i>
                                Sign Out
                            </button>
                        </form>
                    </li>
                @else
                    <li role="none">
                        <a href="/register"
                            class="hover:text-laravel hover:border-laravel/40 focus:ring-laravel inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-2 text-gray-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-200"
                            role="menuitem" aria-label="Create a new account">
                            <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                            Sign Up
                        </a>
                    </li>
                    <li role="none">
                        <a href="/login"
                            class="bg-laravel inline-flex items-center gap-2 rounded-full px-4 py-2 text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            role="menuitem" aria-label="Sign in to your account">
                            <i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i>
                            Sign In
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
