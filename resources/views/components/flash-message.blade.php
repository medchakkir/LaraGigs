@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 3000)" x-show="show"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95"
        class="fixed left-1/2 top-20 z-[60] -translate-x-1/2 text-center" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div
            class="w-auto rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-lg dark:border-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-100">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium">{{ session('message') }}</p>
                <button type="button" @click="show = false"
                    class="ml-3 rounded-md p-1 text-emerald-600 hover:bg-emerald-200 hover:text-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:text-emerald-300 dark:hover:bg-emerald-800 dark:hover:text-emerald-50"
                    aria-label="Close">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
@endif
