<form action="/" class="relative z-20 -mt-8" role="search">
    <div class="mx-auto max-w-3xl px-4">
        <div
            class="relative rounded-2xl bg-white shadow-xl ring-1 ring-gray-200 dark:bg-slate-800 dark:shadow-slate-900/30 dark:ring-slate-600">
            <div class="absolute left-4 top-4">
                <i class="fa fa-search text-gray-400" aria-hidden="true"></i>
            </div>
            <label for="search-input" class="sr-only">Search Laravel Gigs</label>
            <input type="text" id="search-input" name="search" value="{{ request('search') }}"
                class="focus-ring focus:ring-laravel h-14 w-full rounded-2xl bg-transparent pl-12 pr-32 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 dark:text-gray-100"
                placeholder="Search for Laravel gigs, companies, or locations..."
                aria-label="Search for Laravel gigs and projects" autocomplete="off" />
            <div class="absolute right-2 top-2">
                <button type="submit"
                    class="bg-laravel focus-ring inline-flex h-10 items-center justify-center rounded-xl px-5 text-white shadow transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2"
                    aria-label="Submit search">
                    <i class="fa fa-search mr-2" aria-hidden="true"></i>
                    Search
                </button>
            </div>
        </div>
    </div>
</form>
