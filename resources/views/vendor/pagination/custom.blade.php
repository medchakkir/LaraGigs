@if ($paginator->hasPages())
    <div class="max-w-6xl mx-auto px-4 mb-16">
        <nav class="flex items-center justify-center" aria-label="Pagination">
            <ul class="flex items-center gap-2">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span
                            class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 dark:border-slate-700 bg-gray-100 dark:bg-slate-700 px-4 text-sm font-medium text-gray-400 dark:text-gray-400 cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 text-sm font-medium text-gray-700 dark:text-gray-200 hover:border-laravel/50 hover:text-laravel transition">
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li>
                            <span class="px-3 py-2 text-gray-400 dark:text-gray-400">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span aria-current="page"
                                        class="inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-laravel bg-laravel px-3 text-sm font-semibold text-white">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-3 text-sm font-medium text-gray-700 dark:text-gray-200 hover:border-laravel/50 hover:text-laravel transition">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 text-sm font-medium text-gray-700 dark:text-gray-200 hover:border-laravel/50 hover:text-laravel transition">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span
                            class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 dark:border-slate-700 bg-gray-100 dark:bg-slate-700 px-4 text-sm font-medium text-gray-400 dark:text-gray-400 cursor-not-allowed">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
