@if ($paginator->hasPages())
    <div class="mx-auto mb-16 max-w-6xl px-4">
        <nav class="flex items-center justify-center" aria-label="Pagination">
            <ul class="flex items-center gap-2">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span
                            class="inline-flex h-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-100 px-4 text-sm font-medium text-gray-400 dark:border-slate-700 dark:bg-slate-700 dark:text-gray-400">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="hover:border-laravel/50 hover:text-laravel inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-4 text-sm font-medium text-gray-700 transition dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200">
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li>
                            <span class="px-3 py-2 text-gray-400 dark:text-gray-400">
                                {{ $element }}
                            </span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span aria-current="page"
                                        class="border-laravel bg-laravel inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border px-3 text-sm font-semibold text-white">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="hover:border-laravel/50 hover:text-laravel inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-gray-200 bg-white px-3 text-sm font-medium text-gray-700 transition dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200">
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
                            class="hover:border-laravel/50 hover:text-laravel inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-4 text-sm font-medium text-gray-700 transition dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span
                            class="inline-flex h-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-100 px-4 text-sm font-medium text-gray-400 dark:border-slate-700 dark:bg-slate-700 dark:text-gray-400">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
