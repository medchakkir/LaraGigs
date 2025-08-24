<x-layout>
    <div class="mx-auto flex min-h-[80vh] max-w-4xl flex-col items-center justify-center px-4 text-center">
        <div class="mb-8">
            <div class="mb-6 text-8xl font-bold text-gray-200 dark:text-slate-700">404</div>
            <h1 class="mb-4 text-3xl font-bold text-gray-900 dark:text-gray-100">Page Not Found</h1>
            <p class="mb-8 text-lg text-gray-600 dark:text-gray-400">
                Sorry, we couldn't find the page you're looking for. It might have been moved, deleted, or you entered
                the wrong URL.
            </p>
        </div>

        <div class="flex flex-col gap-4 sm:flex-row">
            <a href="/"
                class="bg-laravel focus-ring focus:ring-laravel inline-flex items-center gap-2 rounded-lg px-6 py-3 text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2"
                aria-label="Go back to homepage">
                <i class="fa-solid fa-home" aria-hidden="true"></i>
                Go Home
            </a>
        </div>
    </div>
</x-layout>
