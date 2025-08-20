<x-layout>
    <div class="mx-auto max-w-2xl px-4 py-8">
        <div
            class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm dark:border-slate-700 dark:bg-slate-800"
        >
            <header class="mb-8 text-center">
                <h2
                    class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100"
                >
                    Create a Gig
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Post a gig to find a developer
                </p>
            </header>

            <form
                method="POST"
                action="/listings"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-6">
                    <label
                        for="company"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Company Name
                    </label>
                    <input
                        type="text"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="company"
                        value="{{ old("company") }}"
                    />
                    @error("company")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="title"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Job Title
                    </label>
                    <input
                        type="text"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="title"
                        placeholder="Example: Senior Laravel Developer"
                        value="{{ old("title") }}"
                    />
                    @error("title")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="location"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Job Location
                    </label>
                    <input
                        type="text"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="location"
                        placeholder="Example: Remote, Boston MA, etc"
                        value="{{ old("location") }}"
                    />
                    @error("location")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Contact Email
                    </label>
                    <input
                        type="email"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="email"
                        value="{{ old("email") }}"
                    />
                    @error("email")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="website"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Website/Application URL
                    </label>
                    <input
                        type="url"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="website"
                        value="{{ old("website") }}"
                    />
                    @error("website")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="tags"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="tags"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{ old("tags") }}"
                    />
                    @error("tags")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="logo"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Company Logo
                    </label>
                    <input
                        type="file"
                        class="focus:ring-laravel file:bg-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 transition file:mr-4 file:rounded-full file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-red-600 focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="logo"
                    />
                    @error("logo")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label
                        for="description"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Job Description
                    </label>
                    <textarea
                        class="focus:ring-laravel w-full resize-none rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:ring-2 focus:outline-none dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="description"
                        rows="10"
                        placeholder="Include tasks, requirements, salary, etc"
                    >
                    {{ old("description") }}
                    </textarea>
                    @error("description")
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button
                        class="bg-laravel inline-flex items-center gap-2 rounded-lg px-6 py-3 font-medium text-white shadow-sm transition hover:bg-red-600"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Create Gig
                    </button>
                    <a
                        href="index.html"
                        class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200"
                    >
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
