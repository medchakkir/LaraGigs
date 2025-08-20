<x-layout>
    <div class="mx-auto w-full max-w-md px-4 py-8">
        <x-card>
            <header class="mb-8 text-center">
                <h2 class="mb-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Login
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Log into your account to post a gig
                </p>
            </header>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-6">
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email
                    </label>
                    <input type="email"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="email" value="{{ old('email') }}" />

                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Password
                    </label>
                    <input type="password"
                        class="focus:ring-laravel w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 transition focus:border-transparent focus:outline-none focus:ring-2 dark:border-slate-600 dark:bg-slate-700 dark:text-gray-100"
                        name="password" value="{{ old('password') }}" />

                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="bg-laravel inline-flex w-full items-center justify-center gap-2 rounded-lg px-6 py-3 font-medium text-white shadow-sm transition hover:bg-red-600">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Sign In
                    </button>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        No account?
                        <a href="/register" class="text-laravel font-medium transition hover:text-red-600">
                            Register
                        </a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
