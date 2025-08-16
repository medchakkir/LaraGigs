@extends('layout')

@section('content')

    @include('partials._hero')

    @include('partials._search')

    <div class="max-w-6xl mx-auto px-4 mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6 mb-16">

        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                <div
                    class="group bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition">
                    <div class="flex gap-4">
                        <img class="hidden md:block w-28 h-28 object-contain rounded-xl shadow-sm"
                            src="{{ asset('images/no-image.png') }}" alt="{{ $listing->title }}" />
                        <div class="flex-1">
                            <h3
                                class="text-xl font-semibold text-gray-900 dark:text-gray-100 group-hover:text-laravel transition">
                                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-base font-semibold text-gray-700 dark:text-gray-300 mb-3">{{ $listing->company }}
                            </div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    class="inline-flex items-center rounded-full bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-3 py-1 text-xs font-medium hover:bg-laravel hover:text-white transition">
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="inline-flex items-center rounded-full bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-3 py-1 text-xs font-medium hover:bg-laravel hover:text-white transition">
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="inline-flex items-center rounded-full bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-3 py-1 text-xs font-medium hover:bg-laravel hover:text-white transition">
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="inline-flex items-center rounded-full bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-3 py-1 text-xs font-medium hover:bg-laravel hover:text-white transition">
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No listings found.</p>
        @endunless
    </div>
@endsection

@push('fab')
    <!-- Floating Action Button -->
    <a href=""
        class="fixed bottom-6 right-6 inline-flex items-center gap-2 rounded-full bg-laravel px-5 py-3 text-white shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-white/60 transition-all duration-200">
        <i class="fa-solid fa-plus"></i>
        Post Job
    </a>
@endpush
