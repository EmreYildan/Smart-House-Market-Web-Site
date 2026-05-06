<h1>Ürün Düzenle</h1>

<a href="{{ route('products.index') }}">Ürün Listesine Dön</a>

@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('products.update', $product) }}">
    @csrf
    @method('PUT')

    <div>
        <label>Ürün Adı</label><br>
        <input type="text" name="name" value="{{ $product->name }}">
    </div>

    <div>
        <label>Açıklama</label><br>
        <textarea name="description">{{ $product->description }}</textarea>
    </div>

    <div>
        <label>Fiyat</label><br>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}">
    </div>

    <div>
        <label>Stok</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}">
    </div>

    <div>
        <label>Fotoğraf URL</label><br>
        <input type="text" name="image" value="{{ $product->image }}">
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}>
            Satışta mı?
        </label>
    </div>

    <button type="submit">Güncelle</button>
</form>
