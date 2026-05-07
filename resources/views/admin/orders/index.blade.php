@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Sipariş Yönetimi</h1>

    <a href="{{ route('admin.dashboard') }}"
       class="text-blue-600 hover:underline">
        ← Admin Panele Dön
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-4">Sipariş No</th>
                <th class="text-left p-4">Kullanıcı</th>
                <th class="text-left p-4">Toplam</th>
                <th class="text-left p-4">Durum</th>
                <th class="text-left p-4">Adres</th>
                <th class="text-left p-4">Ürünler</th>
                <th class="text-left p-4">İşlem</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr class="border-t align-top">
                    <td class="p-4 font-semibold">#{{ $order->id }}</td>

                    <td class="p-4">
                        Kullanıcı #{{ $order->user_id }}
                    </td>

                    <td class="p-4 font-semibold">
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
                                @default {{ $order->status }}
                            @endswitch
                        </span>
                    </td>

                    <td class="p-4 text-gray-600 max-w-xs">
                        {{ $order->shipping_address }}
                    </td>

                    <td class="p-4 text-gray-700">
                        @foreach($order->items as $item)
                            <div class="mb-1">
                                {{ $item->product->name }} x {{ $item->quantity }}
                            </div>
                        @endforeach
                    </td>

                    <td class="p-4">
                        @if($order->status === 'pending')
                            <form method="POST" action="{{ route('admin.orders.approve', $order) }}">
                                @csrf
                                <button type="submit"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    Onayla
                                </button>
                            </form>
                        @elseif($order->status !== 'delivered')
                            <form method="POST" action="{{ route('admin.orders.nextStatus', $order) }}">
                                @csrf
                                <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Durumu İlerlet
                                </button>
                            </form>
                        @else
                            <span class="text-green-700 font-semibold">
                                Teslim edildi
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
