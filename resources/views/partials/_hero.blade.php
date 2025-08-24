<section class="relative overflow-hidden bg-gradient-to-br from-red-600 to-rose-700 shadow-lg" role="banner"
    aria-labelledby="hero-title">
    <div class="pointer-events-none absolute inset-0 bg-center bg-no-repeat opacity-10"
        style="background-image: url('{{ asset('images/laravel-logo.png') }}')" aria-hidden="true"></div>
    <div class="mx-auto max-w-6xl px-4">
        <div class="flex h-[380px] flex-col items-center justify-center space-y-4 text-center">
            <h1 id="hero-title" class="text-5xl font-extrabold tracking-tight text-white md:text-6xl">
                Lara
                <span class="text-black drop-shadow-sm">Jobs</span>
            </h1>
            <p class="max-w-2xl text-xl font-semibold text-red-50 md:text-2xl">
                Find your next Laravel opportunity or hire talented developers
            </p>
            <div class="pt-2">
                @auth
                    <a href="/listings/create"
                        class="focus-ring inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 font-semibold text-red-600 shadow-lg transition-all duration-200 hover:bg-gray-100 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2"
                        aria-label="Create a new job listing">
                        <i class="fa-solid fa-bullhorn" aria-hidden="true"></i>
                        Post a Job
                    </a>
                @else
                    <a href="/register"
                        class="focus-ring inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 font-semibold text-red-600 shadow-lg transition-all duration-200 hover:bg-gray-100 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2"
                        aria-label="Sign up to create an account and post job listings">
                        <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </div>
</section>
