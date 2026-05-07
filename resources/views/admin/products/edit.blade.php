@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Ürün Düzenle</h1>

    <a href="{{ route('products.index') }}"
       class="text-blue-600 hover:underline">
        ← Ürün Listesine Dön
    </a>
</div>

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
        <ul class="list-disc ml-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-xl shadow p-8">
    <form method="POST"
        action="{{ route('products.update', $product) }}"
        enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-2">Ürün Adı</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-2">Açıklama</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold mb-2">Fiyat</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-semibold mb-2">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-2">Yeni Ürün Görseli</label>

            <input type="file"
                name="image"
                class="w-full rounded-lg border-gray-300 shadow-sm">
        </div>

        @if($product->image)
            <div>
                <label class="block font-semibold mb-2">Mevcut Görsel</label>
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="w-40 h-40 object-cover rounded-lg border">
            </div>
        @endif

        <div>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1"
                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="font-semibold">Ürün satışta olsun</span>
            </label>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Ürünü Güncelle
            </button>
        </div>
    </form>
</div>

@endsection
