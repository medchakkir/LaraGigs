<x-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-2xl p-8 shadow-sm">
            <header class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Edit Gig</h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Edit: {{ $listing->id }}
                </p>
            </header>

            <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company
                        Name</label>
                    <input type="text"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="company" value="{{ $listing->company }}" />
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job
                        Title</label>
                    <input type="text"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="title" placeholder="Example: Senior Laravel Developer" value="{{ $listing->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job
                        Location</label>
                    <input type="text"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="location" placeholder="Example: Remote, Boston MA, etc"
                        value="{{ $listing->location }}" />
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Contact
                        Email</label>
                    <input type="email"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="email" value="{{ $listing->email }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="website"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Website/Application
                        URL</label>
                    <input type="url"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="website" value="{{ $listing->website }}" />
                    @error('website')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tags
                        (Comma Separated)</label>
                    <input type="text"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="tags" placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{ $listing->tags }}" />
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="logo"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company Logo</label>
                    <input type="file"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-laravel file:text-white hover:file:bg-red-600"
                        name="logo" />

                    <img class="w-32 h-32 mt-4 object-contain rounded-xl shadow-sm bg-gray-50 dark:bg-slate-700"
                        src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                        alt="{{ $listing->title }}" />
                    @error('logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job
                        Description</label>
                    <textarea
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition resize-none"
                        name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">
                    {{ $listing->description }}
                    </textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button
                        class="inline-flex items-center gap-2 rounded-lg bg-laravel px-6 py-3 text-white font-medium shadow-sm hover:bg-red-600 transition">
                        <i class="fa-solid fa-plus"></i>
                        Edit Gig
                    </button>
                    <a href="index.html"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transition">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
