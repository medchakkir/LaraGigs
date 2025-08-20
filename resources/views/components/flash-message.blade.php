@if (session()->has("message"))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => (show = false), 3000)"
        x-show="show"
        class="fixed top-20 left-1/2 z-[60] -translate-x-1/2 text-center"
    >
        <div
            class="w-auto rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-lg dark:border-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-100"
            role="alert"
        >
            <p class="text-sm">{{ session("message") }}</p>
        </div>
    </div>
@endif
