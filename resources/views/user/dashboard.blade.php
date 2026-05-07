@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Hoş Geldin, {{ auth()->user()->name }}
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold text-gray-900">Bakiyem</h2>

        <p class="text-3xl font-bold text-blue-600 mt-4">
            {{ auth()->user()->balance }} TL
        </p>
    </div>

    <a href="{{ route('orders.index') }}"
       class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-gray-900">Siparişlerim</h2>

        <p class="text-gray-600 mt-2">
            Tüm siparişlerinizi görüntüleyin.
        </p>
    </a>

    <a href="{{ route('cart.index') }}"
       class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-gray-900">Sepetim</h2>

        <p class="text-gray-600 mt-2">
            Sepetinizdeki ürünleri yönetin.
        </p>
    </a>

</div>

@endsection
