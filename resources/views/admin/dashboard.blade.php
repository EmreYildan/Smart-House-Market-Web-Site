@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Admin Paneli
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <a href="{{ route('products.index') }}"
       class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-gray-900">
            Ürün Yönetimi
        </h2>

        <p class="text-gray-600 mt-2">
            Ürün ekle, düzenle, sil ve stok yönetimi yap.
        </p>
    </a>

    <a href="{{ route('admin.orders.index') }}"
       class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-gray-900">
            Sipariş Yönetimi
        </h2>

        <p class="text-gray-600 mt-2">
            Siparişleri onayla ve kargo sürecini yönet.
        </p>
    </a>

    <a href="{{ route('admin.users.index') }}"
       class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-gray-900">
            Kullanıcı Yönetimi
        </h2>

        <p class="text-gray-600 mt-2">
            Kullanıcıları görüntüle ve yönet.
        </p>
    </a>

</div>

@endsection
