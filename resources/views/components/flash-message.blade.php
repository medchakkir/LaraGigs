@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed z-[60] top-20 left-1/2 -translate-x-1/2 text-center">
        <div class="w-auto rounded-lg shadow-lg px-4 py-3 bg-emerald-50 text-emerald-800 border border-emerald-200 dark:bg-emerald-900/40 dark:text-emerald-100 dark:border-emerald-700"
            role="alert">
            <p class="text-sm">{{ session('message') }}</p>
        </div>
    </div>
@endif
