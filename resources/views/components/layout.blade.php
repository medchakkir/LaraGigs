<!DOCTYPE html>
<html lang="en">
<x-head />

<body
    class="flex min-h-screen flex-col bg-gray-100 text-gray-800 antialiased transition-colors duration-200 dark:bg-slate-900 dark:text-gray-100">
    <x-navigation />

    <main class="flex-1" role="main">
        {{ $slot }}
    </main>

    <!-- Stack for page-specific floating buttons -->
    @stack('fab')

    <x-footer />
    <x-flash-message />

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
