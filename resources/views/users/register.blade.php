<x-layout>
    <div class="max-w-md mx-auto px-4 py-8 w-full">
        <x-card>
            <header class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Register</h2>
                <p class="text-gray-600 dark:text-gray-400">Create an account to post gigs</p>
            </header>

            <form method="POST" action="/users">
                @csrf
                <div class="mb-6">
                    <label for="name"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                    <input type="text"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="name" value="{{ old('name') }}" />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input type="email"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="email" value="{{ old('email') }}" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input type="password"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="password" value="{{ old('password') }}" />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm
                        Password</label>
                    <input type="password"
                        class="w-full rounded-lg border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-laravel focus:border-transparent transition"
                        name="password_confirmation" value="{{ old('password_confirmation') }}" />

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-laravel px-6 py-3 text-white font-medium shadow-sm hover:bg-red-600 transition">
                        <i class="fa-solid fa-user-plus"></i>
                        Register
                    </button>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Already have an account? <a href="login.html"
                            class="text-laravel hover:text-red-600 font-medium transition">Login</a></p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
