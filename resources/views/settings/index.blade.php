@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto space-y-8">

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
            Ayarlar
        </h1>

        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
                Tema Seçimi
            </h2>

            <div class="flex gap-4">

                <button onclick="setTheme('light')"
                        class="bg-gray-200 text-gray-900 px-5 py-3 rounded-lg">
                    ☀️ Aydınlık Tema
                </button>

                <button onclick="setTheme('dark')"
                        class="bg-gray-900 text-white px-5 py-3 rounded-lg">
                    🌙 Karanlık Tema
                </button>

            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
            Bildirim Tercihleri
        </h2>

        <div class="space-y-4">

            <label class="flex items-center justify-between">
                <span class="text-gray-700 dark:text-gray-200">
                    Sipariş bildirimleri
                </span>

                <input type="checkbox" checked class="rounded">
            </label>

            <label class="flex items-center justify-between">
                <span class="text-gray-700 dark:text-gray-200">
                    Kampanya bildirimleri
                </span>

                <input type="checkbox" checked class="rounded">
            </label>

            <label class="flex items-center justify-between">
                <span class="text-gray-700 dark:text-gray-200">
                    E-posta bildirimleri
                </span>

                <input type="checkbox" class="rounded">
            </label>

        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
            Dil Ayarı
        </h2>

        <select onchange="setLanguage(this.value)"
        class="w-full rounded-lg border-gray-300 shadow-sm">

            <option value="tr">Türkçe</option>
            <option value="en">English</option>

        </select>

    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">

        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
            Hesap Güvenliği
        </h2>

        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Hesabınız güvenli durumda.
        </p>

        <a href="{{ route('profile.edit') }}"
           class="inline-block bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
            Profil Ayarlarına Git
        </a>

    </div>

</div>

<script>
    function setTheme(theme) {
        localStorage.setItem('theme', theme);

        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }


        function setLanguage(lang) {
        localStorage.setItem('language', lang);

        if (lang === 'en') {
            alert('English mode enabled.');
        } else {
            alert('Türkçe modu aktif.');
        }

        location.reload();
    }
</script>

@endsection
