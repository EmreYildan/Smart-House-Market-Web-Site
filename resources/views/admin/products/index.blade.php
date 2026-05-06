<h1>Ürün Yönetimi</h1>

<a href="{{ route('products.create') }}">Yeni Ürün Ekle</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ürün Adı</th>
            <th>Fiyat</th>
            <th>Stok</th>
            <th>Durum</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} TL</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->is_active ? 'Satışta' : 'Pasif' }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Düzenle</a>

                    <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bu ürünü silmek istediğine emin misin?')">
                            Sil
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
