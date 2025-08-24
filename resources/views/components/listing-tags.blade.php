@props(['tagsCsv'])

@php
    $tags = explode(', ', $tagsCsv);
@endphp

<ul {{ $attributes->merge(['class' => 'flex']) }} role="list" aria-label="Job tags">
    @foreach ($tags as $tag)
        <li role="listitem">
            <a href="/?tag={{ $tag }}"
                class="hover:bg-laravel focus-ring focus:ring-laravel inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 transition hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-1 dark:bg-slate-700 dark:text-gray-300"
                aria-label="Filter by tag: {{ $tag }}">
                {{ $tag }}
            </a>
        </li>
    @endforeach
</ul>
