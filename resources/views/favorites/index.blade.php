@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Favorilerim
</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

@if($favorites->count() > 0)

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($favorites as $favorite)

            <div class="bg-white rounded-xl shadow p-5">

                <div class="h-48 bg-gray-200 rounded-lg mb-4 overflow-hidden">
                    @if($favorite->product->image)
                        <img src="{{ asset('storage/' . $favorite->product->image) }}"
                             class="w-full h-full object-cover">
                    @endif
                </div>

                <h2 class="text-xl font-bold">
                    {{ $favorite->product->name }}
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ $favorite->product->description }}
                </p>

                <p class="text-blue-600 font-bold mt-4">
                    {{ $favorite->product->price }} TL
                </p>

                <form method="POST"
                      action="{{ route('favorites.toggle', $favorite->product) }}"
                      class="mt-4">

                    @csrf

                    <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                        Favorilerden Kaldır
                    </button>

                </form>

            </div>

        @endforeach

    </div>

@else

    <div class="bg-white rounded-xl shadow p-10 text-center">
        <h2 class="text-2xl font-bold mb-4">
            Favori ürününüz yok
        </h2>

        <a href="{{ url('/') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Ürünlere Git
        </a>
    </div>

@endif

@endsection
