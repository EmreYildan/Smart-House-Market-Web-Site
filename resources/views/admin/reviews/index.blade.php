@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">
        Yorum Yönetimi
    </h1>

    <a href="{{ route('admin.dashboard') }}"
       class="text-blue-600 hover:underline">
        ← Admin Panele Dön
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
                <th class="text-left p-4">Kullanıcı</th>
                <th class="text-left p-4">Ürün</th>
                <th class="text-left p-4">Puan</th>
                <th class="text-left p-4">Yorum</th>
                <th class="text-left p-4">Fotoğraf</th>
                <th class="text-left p-4">Tarih</th>
                <th class="text-left p-4">İşlem</th>
            </tr>
        </thead>

        <tbody>

            @forelse($reviews as $review)

                <tr class="border-t align-top">

                    <td class="p-4 font-semibold">
                        {{ $review->user->name }}
                    </td>

                    <td class="p-4">
                        {{ $review->product->name }}
                    </td>

                    <td class="p-4 text-yellow-500 font-bold">
                        ⭐ {{ $review->rating }}/5
                    </td>

                    <td class="p-4 text-gray-700 max-w-sm">
                        {{ $review->comment }}
                    </td>

                    <td class="p-4">

                        @if($review->image)

                            <img src="{{ asset('storage/' . $review->image) }}"
                                 class="w-20 h-20 object-cover rounded-lg border">

                        @else

                            <span class="text-gray-400 text-sm">
                                Yok
                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-gray-500 text-sm">
                        {{ $review->created_at->format('d.m.Y H:i') }}
                    </td>

                    <td class="p-4">

                        <form method="POST"
                              action="{{ route('admin.reviews.destroy', $review) }}">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yorumu silmek istediğinize emin misiniz?')"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">

                                Sil

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-500">
                        Henüz yorum bulunmuyor.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">
    {{ $reviews->links() }}
</div>

@endsection
