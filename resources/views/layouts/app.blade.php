<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart House Market</title>

    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-300">

    @include('layouts.navigation')

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white dark:bg-gray-800 border-t dark:border-gray-700 mt-12">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-500 dark:text-gray-300">
            © 2026 Smart House Market
        </div>
    </footer>

    <x-chatbot />


</body>
</html>
