<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">

                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                        Smart House Market
                    </a>
                </div>

                <div class="hidden space-x-8 sm:ms-10 sm:flex">

                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        Ürünler
                    </x-nav-link>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                Admin Panel
                            </x-nav-link>

                            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                                Ürün Yönetimi
                            </x-nav-link>

                            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                                Kategoriler
                            </x-nav-link>

                            <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')">
                                Siparişler
                            </x-nav-link>

                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                                Kullanıcılar
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                                Panelim
                            </x-nav-link>

                            <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.*')">
                                Sepetim
                            </x-nav-link>

                            <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')">
                                Siparişlerim
                            </x-nav-link>

                            <x-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.*')">
                                Favorilerim
                            </x-nav-link>

                            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">
                                Profil
                            </x-nav-link>
                        @endif
                    @endauth

                </div>
            </div>

            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Çıkış Yap
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center gap-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">
                        Giriş
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Kayıt Ol
                    </a>
                </div>
            @endauth

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                Ürünler
            </x-responsive-nav-link>

            @auth
                @if(auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        Admin Panel
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                        Ürün Yönetimi
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                        Kategoriler
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')">
                        Siparişler
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                        Kullanıcılar
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                        Panelim
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.*')">
                        Sepetim
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')">
                        Siparişlerim
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.*')">
                        Favorilerim
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">
                        Profil
                    </x-responsive-nav-link>
                @endif
            @endauth

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">

            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Çıkış Yap
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block text-gray-700">
                        Giriş
                    </a>

                    <a href="{{ route('register') }}" class="block text-blue-600 font-semibold">
                        Kayıt Ol
                    </a>
                </div>
            @endauth

        </div>
    </div>
</nav>
