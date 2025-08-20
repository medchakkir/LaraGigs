<div
    {{ $attributes->merge(["class" => "bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-2xl p-8 shadow-sm"]) }}
>
    {{ $slot }}
</div>
