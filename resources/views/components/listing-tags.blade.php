@props(['tagsCsv'])

@php
    $tags = explode(', ', $tagsCsv);
@endphp

<ul {{ $attributes->merge(['class' => 'flex']) }}>
    @foreach ($tags as $tag)
        <li
            class="inline-flex items-center rounded-full bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-3 py-1 text-xs font-medium hover:bg-laravel hover:text-white transition">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach

</ul>
