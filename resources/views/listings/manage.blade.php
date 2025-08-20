<x-layout>
    <div class="mx-auto max-w-4xl px-4 py-8">
        <x-card
            class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <header class="mb-8 text-center">
                <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100">Manage Gigs</h1>
                <p class="text-gray-600 dark:text-gray-400">Manage your job listings</p>
            </header>

            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-slate-700">
                <table class="w-full">
                    <thead class="border-b border-gray-200 bg-gray-50 dark:border-slate-700 dark:bg-slate-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Job
                                Title</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 dark:text-gray-300">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                        @unless ($listings->isEmpty())
                            @foreach ($listings as $listing)
                                <tr class="transition hover:bg-gray-50 dark:hover:bg-slate-800">
                                    <td class="px-6 py-4">
                                        <a href="view.html"
                                            class="text-lg font-medium text-gray-900 transition hover:text-red-500 dark:text-gray-100">{{ $listing->title }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <a href="/listings/{{ $listing->id }}/edit"
                                                class="inline-flex items-center gap-2 rounded-lg bg-blue-50 px-3 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-100 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>
                                            <form method="POST" action="/listings/{{ $listing->id }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center gap-2 rounded-lg bg-red-50 px-3 py-2 text-sm font-medium text-red-700 transition hover:bg-red-100 dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/50">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endunless
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</x-layout>
