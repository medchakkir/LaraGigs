<x-layout>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="/"
                class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transition">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Listings
            </a>
        </div>

        <x-card>
            <div class="flex flex-col md:flex-row gap-6 mb-8">
                <img class="w-32 h-32 object-contain rounded-xl shadow-sm bg-gray-50 dark:bg-slate-700"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="{{ $listing->title }}" />
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $listing->title }}</h1>
                    <div class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">{{ $listing->company }}
                    </div>

                    <x-listing-tags :tagsCsv="$listing->tags" class="flex-wrap gap-2 mb-4" />

                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $listing->location }}</span>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 dark:border-slate-700 pt-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Job Description</h2>
                <div class="prose prose-gray dark:prose-invert max-w-none">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                        {{ $listing->description }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="mailto:{{ $listing->email }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-laravel px-6 py-3 text-white font-medium shadow-sm hover:bg-red-600 transition">
                        <i class="fa-solid fa-envelope"></i>
                        Contact Employer
                    </a>
                    <a href="{{ $listing->website }}" target="_blank"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-900 dark:bg-gray-900 px-6 py-3 text-white font-medium shadow-sm hover:bg-gray-800 transition">
                        <i class="fa-solid fa-globe"></i>
                        Visit Website
                    </a>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{ $listing->id }}/edit" class="flex items-center gap-2">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-500 transition">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </x-card>

    </div>
</x-layout>
