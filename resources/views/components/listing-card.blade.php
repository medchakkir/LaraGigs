@props(['listing'])

<x-card class="group p-6 transition hover:-translate-y-0.5 hover:shadow-md">
    <div class="flex gap-4">
        <img class="hidden h-28 w-28 rounded-xl object-contain shadow-sm md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt="{{ $listing->title }}" />
        <div class="flex-1">
            <h3 class="group-hover:text-laravel text-xl font-semibold text-gray-900 transition dark:text-gray-100">
                <a href="/listings/{{ $listing->id }}">
                    {{ $listing->title }}
                </a>
            </h3>
            <div class="mb-3 text-base font-semibold text-gray-700 dark:text-gray-300">
                {{ $listing->company }}
            </div>

            <x-listing-tags :tagsCsv="$listing->tags" class="flex-wrap gap-2" />

            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                <i class="fa-solid fa-location-dot"></i>
                {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
