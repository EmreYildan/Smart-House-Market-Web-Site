<h1>Akıllı Ev Ürünleri</h1>

<a href="{{ route('cart.index') }}">Sepetim</a>

<hr>

@foreach($products as $product)
    <div style="border:1px solid #ccc; padding:15px; margin:15px;">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Fiyat: {{ $product->price }} TL</p>
        <p>Stok: {{ $product->stock }}</p>

        @auth
            <form method="POST" action="{{ route('cart.add', $product) }}">
                @csrf
                <button type="submit">Sepete Ekle</button>
            </form>
        @else
            <a href="{{ route('login') }}">Sepete eklemek için giriş yap</a>
        @endauth
    </div>
@endforeach
