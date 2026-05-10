@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Ürün Yönetimi</h1>

    <a href="{{ route('products.create') }}"
       class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
        Yeni Ürün Ekle
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
                <th class="text-left p-4">ID</th>
                <th class="text-left p-4">Ürün</th>
                <th class="text-left p-4">Kategori</th>
                <th class="text-left p-4">Fiyat</th>
                <th class="text-left p-4">Stok</th>
                <th class="text-left p-4">Durum</th>
                <th class="text-left p-4">İşlemler</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr class="border-t">
                    <td class="p-4">#{{ $product->id }}</td>

                    <td class="p-4 font-semibold">
                        {{ $product->name }}
                    </td>

                    <td class="p-4">
                        @if($product->category)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                {{ $product->category->name }}
                            </span>
                        @else
                            <span class="text-gray-400">
                                Kategori Yok
                            </span>
                        @endif
                    </td>

                    <td class="p-4">
                        {{ $product->price }} TL
                    </td>

                    <td class="p-4">
                        {{ $product->stock }}
                    </td>

                    <td class="p-4">
                        @if($product->is_active)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Satışta
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Pasif
                            </span>
                        @endif
                    </td>

                    <td class="p-4 flex gap-2">
                        <a href="{{ route('products.edit', $product) }}"
                           class="bg-yellow-500 text-white px-3 py-2 rounded-lg hover:bg-yellow-600">
                            Düzenle
                        </a>

                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Bu ürünü silmek istediğine emin misin?')"
                                    class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600">
                                Sil
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
