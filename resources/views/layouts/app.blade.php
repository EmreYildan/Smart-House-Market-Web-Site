<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart House Market</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    @include('layouts.navigation')

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-500">
            © 2026 Smart House Market
        </div>
    </footer>

</body>
</html>
