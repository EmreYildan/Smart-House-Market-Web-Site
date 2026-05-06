<h1>Admin Sipariş Yönetimi</h1>

<a href="{{ route('admin.dashboard') }}">Admin Panele Dön</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Kullanıcı</th>
        <th>Toplam</th>
        <th>Durum</th>
        <th>Adres</th>
        <th>Ürünler</th>
        <th>İşlem</th>
    </tr>

    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
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
            <td>
                @foreach($order->items as $item)
                    {{ $item->product->name }} x {{ $item->quantity }} <br>
                @endforeach
            </td>
            <td>
                @if($order->status === 'pending')
                    <form method="POST" action="{{ route('admin.orders.approve', $order) }}">
                        @csrf
                        <button type="submit">Onayla</button>
                    </form>
                @elseif($order->status !== 'delivered')
                    <form method="POST" action="{{ route('admin.orders.nextStatus', $order) }}">
                        @csrf
                        <button type="submit">Durumu İlerlet</button>
                    </form>
                @else
                    Teslim edildi
                @endif
            </td>
        </tr>
    @endforeach
</table>
