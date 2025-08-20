@props(['listing'])

<x-card class="group p-6 hover:shadow-md hover:-translate-y-0.5 transition">
    <div class="flex gap-4">
        <img class="hidden md:block w-28 h-28 object-contain rounded-xl shadow-sm"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt="{{ $listing->title }}" />
        <div class="flex-1">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 group-hover:text-laravel transition">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-base font-semibold text-gray-700 dark:text-gray-300 mb-3">{{ $listing->company }}
            </div>

            <x-listing-tags :tagsCsv="$listing->tags" class="flex-wrap gap-2" />

            <div class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
