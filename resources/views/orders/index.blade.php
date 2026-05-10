@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">Siparişlerim</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

@if($orders->count() > 0)

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4">Sipariş No</th>
                    <th class="text-left p-4">Toplam</th>
                    <th class="text-left p-4">Durum</th>
                    <th class="text-left p-4">Adres</th>
                    <th class="text-left p-4">Tarih</th>
                    <th class="text-left p-4">İşlem</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                    <tr class="border-t">
                        <td class="p-4 font-semibold">#{{ $order->id }}</td>

                        <td class="p-4">
                            {{ $order->total_price }} TL
                        </td>

                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">
                                @switch($order->status)
                                    @case('pending') Bekliyor @break
                                    @case('approved') Onaylandı @break
                                    @case('preparing') Hazırlanıyor @break
                                    @case('packed') Paketlendi @break
                                    @case('shipped') Kargoya Verildi @break
                                    @case('on_the_way') Yolda @break
                                    @case('delivered') Teslim Edildi @break
                                    @case('cancelled') İptal Edildi @break
                                    @default {{ $order->status }}
                                @endswitch
                            </span>
                        </td>

                        <td class="p-4 text-gray-600">
                            {{ $order->shipping_address }}
                        </td>

                        <td class="p-4 text-gray-500">
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </td>

                        <td class="p-4">
                            @if($order->status === 'pending')

                                <form method="POST" action="{{ route('orders.cancel', $order) }}">
                                    @csrf

                                    <button type="submit"
                                            onclick="return confirm('Siparişi iptal etmek istediğinize emin misiniz?')"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                        İptal Et
                                    </button>

                                </form>

                            @elseif($order->status === 'delivered')

                                <form method="POST" action="{{ route('orders.received', $order) }}">
                                    @csrf

                                    <button type="submit"
                                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                        Ürünlerimi Teslim Aldım
                                    </button>

                                </form>

                            @elseif($order->status === 'received')

                                <span class="text-green-700 font-semibold">
                                    Teslim Alındı
                                </span>

                            @else

                                <span class="text-gray-400">
                                    İşlem Yok
                                </span>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else

    <div class="bg-white rounded-xl shadow p-10 text-center">
        <h2 class="text-2xl font-bold mb-4">Henüz siparişiniz yok</h2>

        <a href="{{ url('/') }}"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Alışverişe Başla
        </a>
    </div>

@endif

@endsection
