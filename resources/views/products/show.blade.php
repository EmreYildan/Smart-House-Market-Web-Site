@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    <div>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full rounded-2xl shadow-lg">
        @endif
    </div>

    <div>

        @if($product->category)
            <span class="inline-block bg-blue-100 text-blue-700 text-sm px-4 py-1 rounded-full mb-4">
                {{ $product->category->name }}
            </span>
        @endif

        <h1 class="text-4xl font-bold text-gray-900">
            {{ $product->name }}
        </h1>

        @php
            $averageRating = $product->reviews->avg('rating');
        @endphp

        <div class="mt-4 text-yellow-500 text-xl">
            @if($averageRating)
                ⭐ {{ number_format($averageRating, 1) }} / 5

                <span class="text-gray-500 text-base">
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
                <span class="text-gray-400 text-base">
                    Henüz puan yok
                </span>
            @endif
        </div>

        <p class="text-gray-600 mt-6 leading-8">
            {{ $product->description }}
        </p>

        <div class="mt-8 flex items-center justify-between">
            <span class="text-4xl font-bold text-blue-600">
                {{ $product->price }} TL
            </span>

            <span class="text-gray-500">
                Stok: {{ $product->stock }}
            </span>
        </div>

        @auth

            <form method="POST"
                  action="{{ route('cart.add', $product) }}"
                  class="mt-8 space-y-4">

                @csrf

                <input type="number"
                       name="quantity"
                       value="1"
                       min="1"
                       max="{{ $product->stock }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm">

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">
                    Sepete Ekle
                </button>

            </form>

            <form method="POST"
                  action="{{ route('favorites.toggle', $product) }}"
                  class="mt-4">

                @csrf

                <button type="submit"
                        class="w-full bg-pink-500 text-white py-3 rounded-xl hover:bg-pink-600">
                    ❤️ Favorilere Ekle
                </button>

            </form>

        @endauth

    </div>

</div>

<div class="mt-16">

    <h2 class="text-3xl font-bold mb-8">
        Yorumlar
    </h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @auth
        <div class="bg-white rounded-xl shadow p-6 mb-10">

            <form method="POST"
                action="{{ route('reviews.store', $product) }}"
                enctype="multipart/form-data"
                class="space-y-4">

                @csrf

                <div>
                    <label class="block font-semibold mb-2">
                        Puan
                    </label>

                    <select name="rating"
                            class="w-full rounded-lg border-gray-300 shadow-sm">

                        <option value="5">5 - Çok iyi</option>
                        <option value="4">4 - İyi</option>
                        <option value="3">3 - Orta</option>
                        <option value="2">2 - Kötü</option>
                        <option value="1">1 - Çok kötü</option>

                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        Yorum
                    </label>

                    <textarea name="comment"
                              rows="4"
                              class="w-full rounded-lg border-gray-300 shadow-sm"
                              placeholder="Yorumunuzu yazın..."></textarea>

                              <div>
                                <label class="block font-semibold mb-2">
                                    Fotoğraf Ekle!
                                </label>

                                <input type="file"
                                    name="image"
                                    class="w-full rounded-lg border-gray-300 shadow-sm">
                            </div>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 font-semibold">
                    Yorumu Gönder
                </button>

            </form>

        </div>
    @endauth

    <div class="space-y-6">

        @forelse($product->reviews as $review)

            <div class="bg-white rounded-xl shadow p-6">

                <div class="flex items-center justify-between mb-3">

                    <h3 class="font-bold text-lg">
                        {{ mb_substr($review->user->name, 0, 1) }} *** {{ mb_substr($review->user->name, -1) }}.
                    </h3>

                    <span class="text-yellow-500 font-semibold">
                        ⭐ {{ $review->rating }}/5
                    </span>

                </div>

                <p class="text-gray-600">
                    {{ $review->comment }}
                </p>

                @if($review->image)

                    <a href="{{ asset('storage/' . $review->image) }}"
                    target="_blank">

                        <img src="{{ asset('storage/' . $review->image) }}"
                            class="mt-4 w-40 h-40 object-cover rounded-lg border hover:scale-105 transition cursor-pointer">

                    </a>

                @endif

            </div>

        @empty

            <div class="bg-white rounded-xl shadow p-8 text-center text-gray-500">
                Henüz yorum yapılmamış.
            </div>

        @endforelse

    </div>

</div>

@endsection
