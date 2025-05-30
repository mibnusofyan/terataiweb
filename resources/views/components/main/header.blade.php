<header class="bg-white dark:bg-gray-900 shadow-md sticky top-0 z-40 transition-all duration-300 ease-in-out" id="navbar">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <nav x-data="{ mobileMenuOpen: false }" class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('landing-page') }}" class="flex items-center space-x-2 text-2xl font-bold text-gray-800 dark:text-white">
                    <img src="{{ asset('images/logo-teratai-putih.png') }}" alt="Menara Teratai Logo" class="h-10">
                    <span>Menara Teratai</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('landing-page') }}#home" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Home</a>
                <a href="{{ route('landing-page') }}#about" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Tentang</a>
                <a href="{{ route('landing-page') }}#ticket" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Tiket</a>
                <a href="{{ route('landing-page') }}#gallery" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Galeri</a>
                <a href="{{ route('landing-page') }}#contact" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Kontak</a>

                @auth
                    <a href="{{ route('booking.form') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">Book Now</a>
                    <a href="{{ route('my.bookings') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-300">My Bookings</a>
                    {{-- "Riwayat Pemesanan" sama dengan "My Bookings", jadi cukup satu --}}

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">Register</a>
                    @endif
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 dark:text-gray-300 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden py-2">
            <a href="{{ route('landing-page') }}#home" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Home</a>
            <a href="{{ route('landing-page') }}#about" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Tentang</a>
            <a href="{{ route('landing-page') }}#ticket" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Tiket</a>
            <a href="{{ route('landing-page') }}#gallery" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Galeri</a>
            <a href="{{ route('landing-page') }}#contact" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Kontak</a>
            @auth
                <a href="{{ route('booking.form') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Book Now</a>
                <a href="{{ route('my.bookings') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">My Bookings</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                        Log Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Register</a>
                @endif
            @endauth
        </div>
    </div>
</header>

<script>
    // Navbar scroll effect
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');
    window.addEventListener("scroll", function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.style.top = "-80px"; // Adjust based on navbar height
        } else {
            navbar.style.top = "0";
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling

        // Add/remove shadow on scroll
        if (scrollTop > 50) {
            navbar.classList.add('shadow-lg');
        } else {
            navbar.classList.remove('shadow-lg');
        }
    });

    // Alpine.js data for dropdown and mobile menu
    document.addEventListener('alpine:init', () => {
        Alpine.data('headerData', () => ({
            open: false,
            mobileMenuOpen: false
        }))
    });
</script>