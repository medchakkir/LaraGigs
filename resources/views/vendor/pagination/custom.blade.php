@if ($paginator->hasPages())
    <div class="mx-auto mb-16 max-w-6xl px-4">
        <nav class="flex items-center justify-center" aria-label="Pagination Navigation">
            <ul class="flex items-center gap-2" role="list">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li role="listitem">
                        <span
                            class="inline-flex h-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-100 px-4 text-sm font-medium text-gray-400 dark:border-slate-700 dark:bg-slate-700 dark:text-gray-400"
                            aria-disabled="true" aria-label="Previous page (disabled)">
                            <i class="fa-solid fa-chevron-left mr-2" aria-hidden="true"></i>
                            Previous
                        </span>
                    </li>
                @else
                    <li role="listitem">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="hover:border-laravel/50 hover:text-laravel focus-ring focus:ring-laravel inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-4 text-sm font-medium text-gray-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200"
                            aria-label="Go to previous page">
                            <i class="fa-solid fa-chevron-left mr-2" aria-hidden="true"></i>
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li role="listitem">
                            <span class="px-3 py-2 text-gray-400 dark:text-gray-400" aria-hidden="true">
                                {{ $element }}
                            </span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li role="listitem">
                                    <span aria-current="page"
                                        class="border-laravel bg-laravel inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border px-3 text-sm font-semibold text-white"
                                        aria-label="Current page, page {{ $page }}">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li role="listitem">
                                    <a href="{{ $url }}"
                                        class="hover:border-laravel/50 hover:text-laravel focus-ring focus:ring-laravel inline-flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-gray-200 bg-white px-3 text-sm font-medium text-gray-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200"
                                        aria-label="Go to page {{ $page }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li role="listitem">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="hover:border-laravel/50 hover:text-laravel focus-ring focus:ring-laravel inline-flex h-10 items-center justify-center rounded-lg border border-gray-200 bg-white px-4 text-sm font-medium text-gray-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:border-slate-700 dark:bg-slate-800 dark:text-gray-200"
                            aria-label="Go to next page">
                            Next
                            <i class="fa-solid fa-chevron-right ml-2" aria-hidden="true"></i>
                        </a>
                    </li>
                @else
                    <li role="listitem">
                        <span
                            class="inline-flex h-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-100 px-4 text-sm font-medium text-gray-400 dark:border-slate-700 dark:bg-slate-700 dark:text-gray-400"
                            aria-disabled="true" aria-label="Next page (disabled)">
                            Next
                            <i class="fa-solid fa-chevron-right ml-2" aria-hidden="true"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
