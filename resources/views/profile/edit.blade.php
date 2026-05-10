@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Profil Ayarları
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 shadow rounded-lg">

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                    Ad Soyad
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', auth()->user()->name) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm">
            </div>

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                    E-Posta
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', auth()->user()->email) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm">
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                Profili Güncelle
            </button>

        </form>

    </div>

    <div class="mt-8 bg-white p-6 shadow rounded-lg">

        <h2 class="text-xl font-bold text-red-600 mb-3">
            Hesabı Pasif Et
        </h2>

        <p class="text-gray-600 mb-4">
            Hesabınızı pasif hale getirirseniz çıkış yapılır.
        </p>

        <form method="POST" action="{{ route('profile.deactivate') }}">
            @csrf

            <button type="submit"
                    onclick="return confirm('Hesabınızı pasif hale getirmek istediğinize emin misiniz?')"
                    class="bg-red-600 text-white px-5 py-3 rounded-lg hover:bg-red-700">
                Hesabımı Pasif Et
            </button>
        </form>

    </div>

</div>

@endsection
