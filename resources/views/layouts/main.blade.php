<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Pemesanan tiket online Menara Teratai Purwokerto" name="keywords">
    <meta content="Website resmi pemesanan tiket online Menara Teratai Purwokerto" name="description">

    <title>@yield('title', 'Menara Teratai Purwokerto')</title>

    <link href="{{ asset('images/logo/logo-menara.png') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Emblema+One&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div id="spinner" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
        <div class="w-12 h-12 border-4 border-t-transparent border-blue-500 rounded-full animate-spin" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    @include('components.main.header')

    <main>
        @yield('content')
    </main>

    @include('components.main.footer')

    <a href="#"
        class="fixed bottom-8 right-8 bg-gray-800 text-white text-2xl p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-gray-700"
        id="backToTopBtn">
        <i class="bi bi-arrow-up"></i>
    </a>

    <script>
        window.addEventListener('load', function () {
            const spinner = document.getElementById('spinner');
            if (spinner) {
                spinner.classList.add('hidden');
            }
        });

        const backToTopBtn = document.getElementById('backToTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                backToTopBtn.classList.add('opacity-100', 'pointer-events-auto');
                backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTopBtn.classList.remove('opacity-100', 'pointer-events-auto');
                backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });
        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    @stack('scripts')

</body>

</html>