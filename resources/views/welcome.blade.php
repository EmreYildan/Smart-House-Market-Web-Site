@extends('layouts.app')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <div>
        <h1 class="text-4xl font-bold text-gray-900">
            Akıllı Ev Ürünleri
        </h1>

        <p class="text-gray-600 mt-2">
            Evinizi daha güvenli, konforlu ve teknolojik hale getirin.
        </p>
    </div>

    <form method="GET"
          action="{{ url('/') }}"
          class="flex flex-col md:flex-row gap-3">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Ürün ara..."
               class="rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

        <select name="category"
                class="rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

            <option value="">Tüm Kategoriler</option>

            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach

        </select>

        <button type="submit"
                class="bg-blue-600 text-white px-5 rounded-lg hover:bg-blue-700">
            Filtrele
        </button>

    </form>

</div>

@if($products->count() > 0)

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($products as $product)

            <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                <div class="h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center overflow-hidden">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="h-full w-full object-cover rounded-lg">
                    @else
                        <span class="text-gray-500">Ürün Görseli</span>
                    @endif

                </div>

                @if($product->category)
                    <span class="inline-block bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full mb-3">
                        {{ $product->category->name }}
                    </span>
                @endif

                <h2 class="text-xl font-semibold">
                    {{ $product->name }}
                </h2>

                @php
                    $averageRating = $product->reviews->avg('rating');
                @endphp

                <div class="mt-2 text-yellow-500">
                    @if($averageRating)
                        ⭐ {{ number_format($averageRating, 1) }} / 5

                        <span class="text-gray-500 text-sm">
                            @php
                                $photoCount = $product->reviews->whereNotNull('image')->count();
                            @endphp

                            ({{ $product->reviews->count() }} yorum
                            @if($photoCount > 0)
                                • {{ $photoCount }} fotoğraf
                            @endif
                            )
                        </span>
                    @else
                        <span class="text-gray-400 text-sm">
                            Henüz puan yok
                        </span>
                    @endif
                </div>

                <p class="text-gray-600 mt-2">
                    {{ $product->description }}
                </p>

                <div class="mt-4 flex justify-between items-center">

                    <span class="text-2xl font-bold text-blue-600">
                        {{ $product->price }} TL
                    </span>

                    <span class="text-sm text-gray-500">
                        Stok: {{ $product->stock }}
                    </span>

                </div>

                <div class="mt-5">

                    @auth

                        @if($product->stock > 0)

                            <form method="POST"
                                  action="{{ route('cart.add', $product) }}"
                                  class="space-y-3">

                                @csrf

                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    max="{{ $product->stock }}"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <button type="submit"
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                                    Sepete Ekle
                                </button>

                            </form>

                            <a href="{{ route('products.show', $product) }}"
                               class="block text-center w-full bg-gray-100 text-gray-800 py-2 rounded-lg hover:bg-gray-200 mt-3">
                                Detayları Gör
                            </a>

                            <form method="POST"
                                  action="{{ route('favorites.toggle', $product) }}"
                                  class="mt-3">

                                @csrf

                                <button type="submit"
                                        class="w-full bg-pink-500 text-white py-2 rounded-lg hover:bg-pink-600">
                                    ❤️ Favorilere Ekle
                                </button>

                            </form>

                        @else

                            <button disabled
                                    class="w-full bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed">
                                Stokta Yok
                            </button>

                        @endif

                    @else

                        <a href="{{ route('login') }}"
                           class="block text-center w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900">
                            Sepete eklemek için giriş yap
                        </a>

                    @endauth

                </div>

            </div>

        @endforeach

    </div>
    <div class="mt-8">
        {{ $products->links() }}
    </div>

@else

    <div class="bg-white rounded-xl shadow p-8 text-center">
        <p class="text-gray-600">Henüz ürün eklenmemiş.</p>
    </div>

@endif

@endsection

