<x-layout>
    <div class="mx-auto max-w-4xl px-4 py-8">
        <div class="mb-6">
            <a href="/"
                class="inline-flex items-center gap-2 text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Listings
            </a>
        </div>

        <x-card>
            <div class="mb-8 flex flex-col gap-6 md:flex-row">
                <img class="h-32 w-32 rounded-xl bg-gray-50 object-contain shadow-sm dark:bg-slate-700"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="{{ $listing->title }}" />
                <div class="flex-1">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $listing->title }}
                    </h1>
                    <div class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-300">
                        {{ $listing->company }}
                    </div>

                    <x-listing-tags :tagsCsv="$listing->tags" class="mb-4 flex-wrap gap-2" />

                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $listing->location }}</span>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-8 dark:border-slate-700">
                <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Job Description
                </h2>
                <div class="prose prose-gray dark:prose-invert max-w-none">
                    <p class="mb-6 leading-relaxed text-gray-700 dark:text-gray-300">
                        {{ $listing->description }}
                    </p>
                </div>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="mailto:{{ $listing->email }}"
                        class="bg-laravel inline-flex items-center justify-center gap-2 rounded-lg px-6 py-3 font-medium text-white shadow-sm transition hover:bg-red-600">
                        <i class="fa-solid fa-envelope"></i>
                        Contact Employer
                    </a>
                    <a href="{{ $listing->website }}" target="_blank"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-900 px-6 py-3 font-medium text-white shadow-sm transition hover:bg-gray-800 dark:bg-gray-900">
                        <i class="fa-solid fa-globe"></i>
                        Visit Website
                    </a>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 flex space-x-6 p-2">
            <a href="/listings/{{ $listing->id }}/edit" class="flex items-center gap-2">
                <i class="fa-solid fa-pencil"></i>
                Edit
            </a>
            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 text-red-600 transition hover:text-red-500">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </button>
            </form>
        </x-card>
    </div>
</x-layout>
