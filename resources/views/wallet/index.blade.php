@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">Cüzdanım</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-8 mb-8">
        <h2 class="text-xl font-bold mb-2">Mevcut Bakiye</h2>

        <p class="text-4xl font-bold text-blue-600">
            {{ auth()->user()->balance }} TL
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-xl font-bold mb-6">Bakiye Yükle</h2>

        <form method="POST" action="{{ route('wallet.topUp') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-3">Yüklenecek Tutar</label>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    @foreach([50, 100, 200, 500, 1000] as $amount)
                        <label class="cursor-pointer">
                            <input type="radio"
                                   name="amount"
                                   value="{{ $amount }}"
                                   class="hidden peer"
                                   required>

                            <div class="text-center border rounded-lg py-3 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600">
                                {{ $amount }} TL
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-2">Kart Sahibi</label>
                <input type="text" name="card_name" class="w-full rounded-lg border-gray-300 shadow-sm">
            </div>

            <div>
                <label class="block font-semibold mb-2">Kart Numarası</label>
                <input type="text" name="card_number" maxlength="19" placeholder="1234 5678 9012 3456"
                       class="w-full rounded-lg border-gray-300 shadow-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-2">Son Kullanma</label>
                    <input type="text" name="card_expiry" placeholder="12/30"
                           class="w-full rounded-lg border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block font-semibold mb-2">CVV</label>
                    <input type="text" name="card_cvv" maxlength="3" placeholder="123"
                           class="w-full rounded-lg border-gray-300 shadow-sm">
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 font-semibold">
                Bakiyeyi Yükle
            </button>
        </form>
    </div>

</div>

@endsection
