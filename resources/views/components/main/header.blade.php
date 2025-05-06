<div class="w-full bg-gray-900">
    <div class="container mx-auto flex flex-wrap items-center justify-between lg:flex-nowrap px-4 lg:px-0 py-3">
        {{-- Logo and Brand for Desktop --}}
        <div class="lg:w-1/4 bg-blue-600 hidden lg:flex items-center justify-center p-0" style="height: 100px;">
            <img src="{{ asset('images/logo/logo-menara.png') }}" alt="logo Menara Teratai"
                class="w-auto h-16 lg:h-20 ml-4 object-contain">
            <a href="{{ url('/') }}" class="block w-full h-full flex items-center justify-center text-center">
                <h1 class="m-0 text-3xl lg:text-2xl text-white uppercase font-['Emblema_One']">PURWOKERTO</h1>
            </a>
        </div>

        {{-- Main Content Area --}}
        <div class="w-full lg:w-3/4 flex flex-col">
            <div class="hidden lg:flex justify-end items-center bg-gray-950 px-5 py-2">
                <div class="flex items-center mr-6">
                    <i class="fa fa-envelope text-blue-600 mr-2"></i>
                    <p class="mb-0 text-gray-400 text-sm">info@menarateratai.com</p>
                </div>
                <div class="flex items-center">
                    <i class="fa fa-phone-alt text-blue-600 mr-2"></i>
                    <p class="mb-0 text-gray-400 text-sm">+62 xxx xxxx xxxx</p>
                </div>
                <div class="flex items-center ml-4">
                    <a class="w-8 h-8 flex items-center justify-center border border-gray-700 text-gray-400 hover:text-blue-500 hover:border-blue-500 rounded-full ml-2 transition-colors duration-300"
                        href="#"><i class="fab fa-facebook-f text-xs"></i></a>
                    <a class="w-8 h-8 flex items-center justify-center border border-gray-700 text-gray-400 hover:text-blue-500 hover:border-blue-500 rounded-full ml-2 transition-colors duration-300"
                        href="#"><i class="fab fa-twitter text-xs"></i></a>
                    <a class="w-8 h-8 flex items-center justify-center border border-gray-700 text-gray-400 hover:text-blue-500 hover:border-blue-500 rounded-full ml-2 transition-colors duration-300"
                        href="#"><i class="fab fa-linkedin-in text-xs"></i></a>
                </div>
            </div>

            <nav x-data="{ open: false }" class="w-full p-4 lg:p-0 lg:px-5" style="background: #111111;">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}"
                        class="block lg:hidden text-blue-600 text-sm uppercase font-['Emblema_One']">
                        Menara Pandang Teratai
                    </a>

                    <button @click="open = !open" class="lg:hidden text-gray-300 hover:text-white p-2 rounded">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div x-show="open" class="lg:hidden mt-2" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">

                    <div class="flex flex-col py-2">
                        <a href="{{ url('/') }}"
                            class="block py-2 px-3 text-white hover:text-blue-600 transition-colors duration-300">Home</a>
                        <a href="{{ url('/about') }}"
                            class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300">Tentang
                            Kami</a>
                        <a href="{{ route('booking.form') }}"
                            class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300">Tiket</a>
                    </div>

                    {{-- Auth Links --}}
                    <div class="flex flex-col items-start py-2 w-full border-t border-gray-700 mt-2 pt-2">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300 w-full text-left">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300 w-full text-left">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300 w-full text-left">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block py-2 px-3 text-gray-300 hover:text-blue-600 transition-colors duration-300 w-full text-left">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden lg:flex lg:items-center lg:justify-between">
                    <div class="flex lg:mr-auto">
                        <a href="{{ url('/') }}"
                            class="py-4 px-4 text-white hover:text-blue-600 transition-colors duration-300">Home</a>
                        <a href="{{ url('/about') }}"
                            class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Tentang
                            Kami</a>
                        <a href="{{ route('booking.form') }}"
                            class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Tiket</a>
                    </div>

                    <div class="flex">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="py-4 px-4 text-gray-300 hover:text-blue-600 transition-colors duration-300">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>