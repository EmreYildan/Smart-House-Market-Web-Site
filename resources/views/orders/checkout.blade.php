@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">Sipariş Onay</h1>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4">Ürün</th>
                    <th class="text-left p-4">Adet</th>
                    <th class="text-left p-4">Fiyat</th>
                    <th class="text-left p-4">Ara Toplam</th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0; @endphp

                @foreach($items as $item)
                    @php
                        $subtotal = $item->quantity * $item->product->price;
                        $total += $subtotal;
                    @endphp

                    <tr class="border-t">
                        <td class="p-4 font-semibold">
                            {{ $item->product->name }}
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-xl shadow p-6 h-fit">
        <h2 class="text-2xl font-bold mb-6">Teslimat Bilgileri</h2>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <label class="block mb-2 font-semibold">
                Teslimat Adresi
            </label>

            <textarea
                name="shipping_address"
                required
                rows="5"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="Mahalle, sokak, apartman, ilçe, şehir bilgilerini giriniz"></textarea>

            @error('shipping_address')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
            <div class="border-t pt-6 mt-6">
            <div class="bg-blue-50 text-blue-700 p-4 rounded-lg mb-6">
                <p><strong>Mevcut Bakiyeniz:</strong> {{ auth()->user()->balance }} TL</p>
                <p><strong>Sipariş Toplamı:</strong> {{ $total }} TL</p>

                @php
                    $remaining = max($total - auth()->user()->balance, 0);
                @endphp

                <p><strong>Kartla Ödenecek Tutar:</strong> {{ $remaining }} TL</p>
            </div>
                <h2 class="text-2xl font-bold mb-4">
                    Ödeme Bilgileri
                </h2>

                <div class="space-y-4">

                    <div>
                        <label class="block font-semibold mb-2">
                            Kart Sahibi
                        </label>

                        <input type="text"
                            name="card_name"
                            placeholder="Ad Soyad"
                            class="w-full rounded-lg border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">
                            Kart Numarası
                        </label>

                        <input type="text"
                            name="card_number"
                            placeholder="1234 5678 9012 3456"
                            maxlength="19"
                            class="w-full rounded-lg border-gray-300 shadow-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="block font-semibold mb-2">
                                Son Kullanma Tarihi
                            </label>

                            <input type="text"
                                name="card_expiry"
                                placeholder="12/30"
                                class="w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block font-semibold mb-2">
                                CVV
                            </label>

                            <input type="text"
                                name="card_cvv"
                                placeholder="123"
                                maxlength="3"
                                class="w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                    </div>

                </div>

            </div>
            <div class="border-t mt-6 pt-6">
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Toplam Tutar</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $total }} TL</span>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    Siparişi Oluştur
                </button>
            </div>
        </form>

        <a href="{{ route('cart.index') }}"
           class="block text-center mt-4 text-blue-600 hover:underline">
            Sepete Geri Dön
        </a>
    </div>

</div>

@endsection
