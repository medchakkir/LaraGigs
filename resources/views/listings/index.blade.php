<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="mx-auto mb-16 mt-10 grid max-w-6xl grid-cols-1 gap-6 px-4 sm:grid-cols-2">
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
            class="bg-laravel fixed bottom-6 right-6 inline-flex items-center gap-2 rounded-full px-5 py-3 text-white shadow-lg transition-all duration-200 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-white/60">
            <i class="fa-solid fa-plus"></i>
            Post Job
        </a>
    @endpush
</x-layout>
