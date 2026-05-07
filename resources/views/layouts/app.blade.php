<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart House Market</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
                Smart House Market
            </a>

            <div class="flex gap-4 items-center">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600">Ürünler</a>

                @auth
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600">Sepetim</a>
                    <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-blue-600">Siparişlerim</a>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">Admin Panel</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            Çıkış
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Giriş</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Kayıt Ol
                    </a>
                @endauth
            </div>
        </div>
    </nav>

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
