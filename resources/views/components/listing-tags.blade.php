@props([
    "tagsCsv",
])

@php
    $tags = explode(", ", $tagsCsv);
@endphp

<ul {{ $attributes->merge(["class" => "flex"]) }}>
    @foreach ($tags as $tag)
        <li
            class="hover:bg-laravel inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 transition hover:text-white dark:bg-slate-700 dark:text-gray-300"
        >
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
