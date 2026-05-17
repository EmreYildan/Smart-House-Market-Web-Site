@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Hava Durumuna Göre Ürün Önerisi
    </h1>

    <div class="bg-white rounded-xl shadow p-8 mb-8">

        <form method="GET" action="{{ route('weather.index') }}" class="flex gap-3">
            <select name="city"
                    class="w-full rounded-lg border-gray-300 shadow-sm">

                @php
                    $cities = [
                        'Adana','Adıyaman','Afyonkarahisar','Ağrı','Amasya','Ankara','Antalya',
                        'Artvin','Aydın','Balıkesir','Bilecik','Bingöl','Bitlis','Bolu',
                        'Burdur','Bursa','Çanakkale','Çankırı','Çorum','Denizli','Diyarbakır',
                        'Edirne','Elazığ','Erzincan','Erzurum','Eskişehir','Gaziantep',
                        'Giresun','Gümüşhane','Hakkari','Hatay','Isparta','Mersin','İstanbul',
                        'İzmir','Kars','Kastamonu','Kayseri','Kırklareli','Kırşehir','Kocaeli',
                        'Konya','Kütahya','Malatya','Manisa','Kahramanmaraş','Mardin','Muğla',
                        'Muş','Nevşehir','Niğde','Ordu','Rize','Sakarya','Samsun','Siirt',
                        'Sinop','Sivas','Tekirdağ','Tokat','Trabzon','Tunceli','Şanlıurfa',
                        'Uşak','Van','Yozgat','Zonguldak','Aksaray','Bayburt','Karaman',
                        'Kırıkkale','Batman','Şırnak','Bartın','Ardahan','Iğdır','Yalova',
                        'Karabük','Kilis','Osmaniye','Düzce'
                    ];
                @endphp

                @foreach($cities as $item)
                    <option value="{{ $item }}"
                        {{ $city == $item ? 'selected' : '' }}>
                        {{ $item }}
                    </option>
                @endforeach

            </select>

            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Ara
            </button>
        </form>

    </div>

    @if($weather)

        <div class="bg-white rounded-xl shadow p-8 mb-8">
            <h2 class="text-2xl font-bold mb-6">
                {{ $city }} Anlık Hava Durumu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-blue-50 p-6 rounded-xl">
                    <p class="text-gray-600">Sıcaklık</p>
                    <p class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $weather['temperature_2m'] }} °C
                    </p>
                </div>

                <div class="bg-green-50 p-6 rounded-xl">
                    <p class="text-gray-600">Rüzgar Hızı</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">
                        {{ $weather['wind_speed_10m'] }} km/s
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-8">
            <h2 class="text-2xl font-bold mb-6">
                Hava Durumuna Göre Önerilen Ürünler
            </h2>

            @if($recommendedProducts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recommendedProducts as $product)
                        <div class="border rounded-xl p-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="w-full h-40 object-cover rounded-lg mb-4">
                            @endif

                            <h3 class="font-bold text-lg">
                                {{ $product->name }}
                            </h3>

                            <p class="text-blue-600 font-bold mt-2">
                                {{ $product->price }} TL
                            </p>

                            <a href="{{ route('products.show', $product) }}"
                               class="block text-center bg-gray-100 mt-4 py-2 rounded-lg hover:bg-gray-200">
                                Detayları Gör
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">
                    Bu hava durumuna uygun ürün bulunamadı.
                </p>
            @endif
        </div>

    @else

        <div class="bg-red-100 text-red-700 p-4 rounded-lg">
            Hava durumu bilgisi alınamadı. Lütfen il adını kontrol edin.
        </div>

    @endif

</div>

@endsection
