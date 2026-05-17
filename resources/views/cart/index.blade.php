@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">Sepetim</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

@if($items->count() > 0)

    @php
        $total = 0;
    @endphp

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4">Ürün</th>
                    <th class="text-left p-4">Adet</th>
                    <th class="text-left p-4">Fiyat</th>
                    <th class="text-left p-4">Toplam</th>
                    <th class="text-left p-4">İşlem</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)

                    @php
                        $subtotal = $item->quantity * $item->product->price;
                        $total += $subtotal;
                    @endphp

                    <tr class="border-t">

                        <td class="p-4">
                            <div class="flex items-center gap-4">

                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                         alt="{{ $item->product->name }}"
                                         class="w-20 h-20 object-cover rounded-lg border">
                                @else
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 text-xs">
                                        Görsel Yok
                                    </div>
                                @endif

                                <div>
                                    <h2 class="font-semibold">
                                        {{ $item->product->name }}
                                    </h2>
                                </div>

                            </div>
                        </td>

                        <td class="p-4">
                            {{ $item->quantity }}
                        </td>

                        <td class="p-4">
                            {{ $item->product->price }} TL
                        </td>

                        <td class="p-4 font-semibold">
                            {{ $subtotal }} TL
                        </td>

                        <td class="p-4">
                            <form method="POST"
                                  action="{{ route('cart.remove', $item) }}">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                    Çıkar
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>

    <div class="mt-8 flex justify-between items-center">

        <a href="{{ url('/') }}"
           class="text-blue-600 hover:underline">
            ← Alışverişe Devam Et
        </a>

        <div class="bg-white shadow rounded-xl p-6 w-80">

            <h2 class="text-2xl font-bold mb-4">
                Sipariş Özeti
            </h2>

            <div class="flex justify-between mb-4">
                <span>Toplam:</span>
                <span class="font-bold">{{ $total }} TL</span>
            </div>

            <a href="{{ route('orders.checkout') }}"
               class="block text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                Siparişi Tamamla
            </a>

        </div>

    </div>

@else

    <div class="bg-white rounded-xl shadow p-10 text-center">

        <h2 class="text-2xl font-bold mb-4">
            Sepetiniz boş
        </h2>

        <a href="{{ url('/') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Ürünlere Git
        </a>

    </div>

@endif

@endsection
