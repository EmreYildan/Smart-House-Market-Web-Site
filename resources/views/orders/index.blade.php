<h1>Siparişlerim</h1>

<a href="{{ url('/') }}">Alışverişe Devam Et</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Toplam</th>
        <th>Durum</th>
        <th>Adres</th>
        <th>Tarih</th>
    </tr>

    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->total_price }} TL</td>
            <td>
                @switch($order->status)
                    @case('pending')
                        Bekliyor
                        @break

                    @case('approved')
                        Onaylandı
                        @break

                    @case('preparing')
                        Hazırlanıyor
                        @break

                    @case('packed')
                        Paketlendi
                        @break

                    @case('shipped')
                        Kargoya Verildi
                        @break

                    @case('on_the_way')
                        Yolda
                        @break

                    @case('delivered')
                        Teslim Edildi
                        @break

                    @default
                        {{ $order->status }}
                @endswitch
            </td>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
</table>
