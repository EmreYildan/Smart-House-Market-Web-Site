@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Kategori Yönetimi</h1>

    <a href="{{ route('categories.create') }}"
       class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
        Yeni Kategori Ekle
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
                <th class="text-left p-4">Kategori Adı</th>
                <th class="text-left p-4">İşlemler</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr class="border-t">
                    <td class="p-4">#{{ $category->id }}</td>

                    <td class="p-4 font-semibold">
                        {{ $category->name }}
                    </td>

                    <td class="p-4 flex gap-2">
                        <a href="{{ route('categories.edit', $category) }}"
                           class="bg-yellow-500 text-white px-3 py-2 rounded-lg hover:bg-yellow-600">
                            Düzenle
                        </a>

                        <form method="POST" action="{{ route('categories.destroy', $category) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Bu kategoriyi silmek istediğine emin misin?')"
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
