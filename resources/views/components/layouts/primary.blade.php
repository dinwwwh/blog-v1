<x-layouts.base class="relative bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <header class="flex items-center justify-between py-4">
            <x-app.logo class="h-8 md:h-12" />

            <nav class="hidden md:flex md:space-x-10">
                <a href="{{ route('home') }}" class="font-medium text-gray-500 hover:text-gray-900">Trang chủ</a>
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Danh sách</a>
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Giới thiệu</a>
            </nav>

            <div class="hidden md:block">
                @auth
                <div class="h-12 w-auto relative cursor-pointer" x-data="{isShowDropdown: false}"
                    x-on:click="isShowDropdown = !isShowDropdown">
                    <img class="w-full h-full rounded-full shadow"
                        src="https://avatars.dicebear.com/api/male/{{ (auth()->user()->name) }}.svg" alt="avatar">

                    {{-- Dropdown menu for desktop --}}
                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        tabindex="-1" x-show="isShowDropdown" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#" @class(['block px-4 py-2 text-sm hover:bg-gray-100 text-gray-700'
                            ,'bg-gray-100'=>request()->routeIs('login')
                            ])
                            tabindex="-1">
                            Profile
                        </a>

                        <a href="#" @class(['block px-4 py-2 text-sm hover:bg-gray-100 text-gray-700'
                            ,'bg-gray-100'=>request()->routeIs('login')
                            ])
                            tabindex="-1">
                            Cài đặt
                        </a>

                        <a href="#" @class(['block px-4 py-2 text-sm hover:bg-gray-100 text-gray-700'
                            ,'bg-gray-100'=>request()->routeIs('login')
                            ])
                            tabindex="-1">
                            Đăng xuất
                        </a>
                    </div>
                </div>
                @else
                <div class="bg-white shadow rounded-md">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                        Đăng nhập
                    </a>
                </div>
                @endauth
            </div>

            <div class="block md:hidden" x-data="{isShowDropdown: false}">
                <button x-on:click="isShowDropdown = true" type="button"
                    class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <x-icons.menu class="w-6 h-6" />
                </button>

                <div x-show="isShowDropdown" x-transition:enter="duration-150 ease-out"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                    x-on:click.away="isShowDropdown = false">
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <x-app.logo class="h-8" />
                            <div class="-mr-2">
                                <button x-on:click="isShowDropdown = false" type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <x-icons.x class="h-6 w-6" />
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">

                            <a href="{{ route('home') }}" @class(['block px-3 py-2 rounded-md text-base font-medium
                                text-gray-700 hover:text-gray-900 hover:bg-gray-50'
                                ,'bg-gray-50'=>request()->routeIs('home')])>
                                Trang chủ
                            </a>

                            <a href="#" @class(['block px-3 py-2 rounded-md text-base font-medium text-gray-700
                                hover:text-gray-900 hover:bg-gray-50' ,'bg-gray-50'=>request()->routeIs('')])>
                                Danh sách
                            </a>

                            <a href="#" @class(['block px-3 py-2 rounded-md text-base font-medium text-gray-700
                                hover:text-gray-900 hover:bg-gray-50' ,'bg-gray-50'=>request()->routeIs('')])>
                                Giới thiệu
                            </a>

                        </div>

                        @auth
                        <a href="#"
                            class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                            Profile
                        </a>
                        <a href="#"
                            class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                            Cài đặt
                        </a>
                        <a href="#"
                            class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                            Đăng xuất
                        </a>
                        @else
                        <a href="{{ route('login') }}"
                            class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                            Đăng nhập
                        </a>
                        @endauth
                    </div>
                </div>
            </div>

        </header>
        <main class="mt-16 px-4 sm:mt-24">
            {{ $slot }}
        </main>

    </div>
</x-layouts.base>
