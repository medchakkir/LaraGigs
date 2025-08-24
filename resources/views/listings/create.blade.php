<x-layout>
    <div class="mx-auto flex min-h-[calc(100vh-8rem)] w-full max-w-2xl items-center justify-center px-4 py-8">
        <x-card class="w-full">
            <header class="mb-8 text-center">
                <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Post a Job Listing
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Post a new job listing to find talented developers
                </p>
            </header>

            <form method="POST" action="/listings" enctype="multipart/form-data" role="form"
                aria-labelledby="form-title">
                @csrf
                <div class="mb-6">
                    <label for="company" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Company Name <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="text" id="company"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="company" value="{{ old('company') }}" required aria-describedby="company-error"
                        aria-invalid="{{ $errors->has('company') ? 'true' : 'false' }}" />
                    @error('company')
                        <p id="company-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Job Title <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="text" id="title"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="title" placeholder="Example: Senior Laravel Developer" value="{{ old('title') }}"
                        required aria-describedby="title-error"
                        aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}" />
                    @error('title')
                        <p id="title-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="location" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Job Location <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="text" id="location"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="location" placeholder="Example: Remote, Boston MA, etc" value="{{ old('location') }}"
                        required aria-describedby="location-error"
                        aria-invalid="{{ $errors->has('location') ? 'true' : 'false' }}" />
                    @error('location')
                        <p id="location-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Contact Email <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="email" id="email"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="email" value="{{ old('email') }}" required aria-describedby="email-error"
                        aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" />
                    @error('email')
                        <p id="email-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="website" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Company Website <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="url" id="website"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="website" value="{{ old('website') }}" required aria-describedby="website-error"
                        aria-invalid="{{ $errors->has('website') ? 'true' : 'false' }}" />
                    @error('website')
                        <p id="website-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tags" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Skills & Technologies <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="text" id="tags"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="tags" placeholder="Example: Laravel, Backend, PostgreSQL, etc"
                        value="{{ old('tags') }}" required aria-describedby="tags-error"
                        aria-invalid="{{ $errors->has('tags') ? 'true' : 'false' }}" />
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Separate multiple skills with commas</p>
                    @error('tags')
                        <p id="tags-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="logo" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Company Logo
                    </label>
                    <input type="file" id="logo"
                        class="focus-ring file:bg-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 transition file:mr-4 file:rounded-full file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-red-600 focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="logo" accept="image/*" aria-describedby="logo-error"
                        aria-invalid="{{ $errors->has('logo') ? 'true' : 'false' }}" />
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload your company logo (optional)</p>
                    @error('logo')
                        <p id="logo-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="description" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Job Description <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <textarea id="description"
                        class="focus-ring w-full resize-none rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="description" rows="10" placeholder="Describe the role, responsibilities, requirements, and benefits"
                        required aria-describedby="description-error"
                        aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}">{{ old('description') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Include role details, requirements,
                        responsibilities, and compensation information</p>
                    @error('description')
                        <p id="description-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="focus-ring bg-laravel focus:ring-laravel inline-flex items-center gap-2 rounded-lg px-6 py-3 font-medium text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2"
                        aria-label="Create the job listing">
                        <i class="fa-solid fa-plus" aria-hidden="true"></i>
                        Create Job
                    </button>
                    <a href="/"
                        class="focus-ring focus:ring-laravel rounded text-gray-600 transition hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-200"
                        aria-label="Go back to homepage">
                        Cancel
                    </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
