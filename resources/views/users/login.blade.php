<x-layout>
    <div class="mx-auto flex min-h-[calc(100vh-8rem)] w-full max-w-md items-center justify-center px-4 py-8">
        <x-card class="w-full">
            <header class="mb-8 text-center">
                <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Login
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Log into your account to post a job
                </p>
            </header>

            <form method="POST" action="/users/authenticate" role="form" aria-labelledby="login-title">
                @csrf
                <div class="mb-6">
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email <span class="text-red-500" aria-label="required">*</span>
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
                <div class="mb-8">
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Password <span class="text-red-500" aria-label="required">*</span>
                    </label>
                    <input type="password" id="password"
                        class="focus-ring w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="password" value="{{ old('password') }}" required aria-describedby="password-error"
                        aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" />

                    @error('password')
                        <p id="password-error" class="mt-2 text-sm text-red-600 dark:text-red-400" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="focus-ring bg-laravel focus:ring-laravel inline-flex w-full items-center justify-center gap-2 rounded-lg px-6 py-3 font-medium text-white shadow-sm transition hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2"
                        aria-label="Sign in to your account">
                        <i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i>
                        Sign In
                    </button>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        No account?
                        <a href="/register"
                            class="focus-ring text-laravel focus:ring-laravel rounded font-medium transition hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-offset-1"
                            aria-label="Create a new account">
                            Register
                        </a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
