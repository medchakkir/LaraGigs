<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="max-w-6xl mx-auto px-4 mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6 mb-16">
        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No listings found.</p>
        @endunless
    </div>

    {{-- Pagination --}}
    {{ $listings->links('vendor.pagination.custom') }}

    @push('fab')
        {{-- Floating Action Button --}}
        <a href="/listings/create"
            class="fixed bottom-6 right-6 inline-flex items-center gap-2 rounded-full bg-laravel px-5 py-3 text-white shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-white/60 transition-all duration-200">
            <i class="fa-solid fa-plus"></i>
            Post Job
        </a>
    @endpush
</x-layout>
