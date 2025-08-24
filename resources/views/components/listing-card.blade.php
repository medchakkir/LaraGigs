@props(['listing'])

<article
    class="group rounded-xl border border-gray-200 bg-white p-6 shadow-md transition-all duration-200 focus-within:shadow-lg hover:-translate-y-1 hover:shadow-lg dark:border-slate-600 dark:bg-slate-800 dark:shadow-slate-900/20 dark:hover:shadow-slate-900/30"
    role="article" aria-labelledby="listing-title-{{ $listing->id }}">
    <div class="flex gap-4">
        <img class="hidden h-28 w-28 rounded-xl object-contain shadow-sm md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt="{{ $listing->company }} logo" loading="lazy" />
        <div class="flex-1">
            <h3 id="listing-title-{{ $listing->id }}"
                class="group-hover:text-laravel text-xl font-semibold text-gray-900 transition dark:text-gray-100">
                <a href="/listings/{{ $listing->id }}"
                    class="focus-ring focus:ring-laravel rounded focus:outline-none focus:ring-2 focus:ring-offset-2"
                    aria-label="View details for {{ $listing->title }} position at {{ $listing->company }}">
                    {{ $listing->title }}
                </a>
            </h3>
            <div class="mb-3 text-base font-semibold text-gray-700 dark:text-gray-300">
                {{ $listing->company }}
            </div>

            <x-listing-tags :tagsCsv="$listing->tags" class="flex-wrap gap-2" />

            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                <span class="sr-only">Location:</span>
                {{ $listing->location }}
            </div>
        </div>
    </div>
</article>
