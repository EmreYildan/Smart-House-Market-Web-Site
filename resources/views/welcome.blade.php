@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Akıllı Ev Ürünleri</h1>
        <p class="text-gray-600 mt-2">Evinizi daha güvenli, konforlu ve teknolojik hale getirin.</p>
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

                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>

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
                                <form method="POST" action="{{ route('cart.add', $product) }}" class="space-y-3">
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
    @else
        <div class="bg-white rounded-xl shadow p-8 text-center">
            <p class="text-gray-600">Henüz ürün eklenmemiş.</p>
        </div>
    @endif
@endsection
