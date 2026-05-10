@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Kategori Düzenle</h1>

        <a href="{{ route('categories.index') }}"
           class="text-blue-600 hover:underline">
            ← Kategorilere Dön
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
              action="{{ route('categories.update', $category) }}"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-2">Kategori Adı</label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Güncelle
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
