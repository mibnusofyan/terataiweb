<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Tambahkan style untuk background gambar di sisi kiri */
        .bg-split-image {
            /* Ganti URL ini dengan path gambar Menara Teratai yang ingin Anda gunakan */
            background-image: url('{{ asset('images/menara/menara1.jpg') }}');
            /* Contoh path gambar */
            background-size: cover;
            background-position: center;
        }

        /* Opsional: Style overlay jika gambar terlalu ramai */
        .bg-split-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
            /* Overlay hitam 30% */
            z-index: 1;
        }

        /* Pastikan konten di atas overlay */
        .content-above-overlay {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 bg-split-image hidden md:flex flex-col justify-center items-center p-6 relative">
            <div class="content-above-overlay text-white text-center">
                <h1 class="text-4xl font-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Selamat Datang!</h1>
                <a href="/">
                    <span class="text-2xl font-bold text-gray-800 dark:text-gray-200">Menara Pandang Teratai Purwokerto</span>
                </a>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 p-6 sm:p-8">
            <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-800 shadow-xl overflow-hidden sm:rounded-lg">
                <div class="mb-4 text-center">
                    <a href="/">
                        <img src="{{ asset('images/logo/logo-menara.png') }}" alt="Logo Menara Teratai" class="h-16 w-16 mx-auto">
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Login</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Silakan masuk untuk melanjutkan</p>
                </div>
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>