<h1>Sepetim</h1>

<a href="{{ url('/') }}">Alışverişe Devam Et</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@php
    $total = 0;
@endphp

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Ürün</th>
            <th>Adet</th>
            <th>Birim Fiyat</th>
            <th>Ara Toplam</th>
            <th>İşlem</th>
        </tr>
    </thead>

    <tbody>
        @forelse($items as $item)
            @php
                $subtotal = $item->quantity * $item->product->price;
                $total += $subtotal;
            @endphp

            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->product->price }} TL</td>
                <td>{{ $subtotal }} TL</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Çıkar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Sepetiniz boş.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<h3>Toplam: {{ $total }} TL</h3>

@if($items->count() > 0)
    <a href="{{ route('orders.checkout') }}">Siparişi Tamamla</a>
@endif
