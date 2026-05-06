<h1>Sipariş Onay</h1>

<a href="{{ route('cart.index') }}">Sepete Dön</a>

@php $total = 0; @endphp

<table border="1" cellpadding="10">
    <tr>
        <th>Ürün</th>
        <th>Adet</th>
        <th>Fiyat</th>
        <th>Ara Toplam</th>
    </tr>

    @foreach($items as $item)
        @php
            $subtotal = $item->quantity * $item->product->price;
            $total += $subtotal;
        @endphp
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }} TL</td>
            <td>{{ $subtotal }} TL</td>
        </tr>
    @endforeach
</table>

<h3>Toplam: {{ $total }} TL</h3>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <label>Teslimat Adresi</label><br>
    <textarea name="shipping_address" required></textarea><br><br>

    <button type="submit">Siparişi Oluştur</button>
</form>
