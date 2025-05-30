@extends('layouts.main')

@section('title', 'Tentang Kami - Menara Teratai Purwokerto')

@section('content')
    <section class="bg-gradient-to-r from-gray-800 to-gray-900 py-8">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Emblema One', cursive;">Tentang Kami</h1>
        </div>
    </section>

    <div class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-6 md:px-12">
            <section class="mb-16 lg:mb-24">
                <div class="grid md:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="md:col-span-7 lg:col-span-8">
                        <h2 class="text-3xl lg:text-4xl font-semibold text-gray-800 mb-6">
                            Selamat Datang di Menara Teratai Purwokerto
                        </h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Menara Teratai merupakan destinasi wisata yang terletak di Kecamatan Purwokerto Barat. Tempat
                            wisata yang dibuka pada tanggal 27 April 2022 ini memiliki ketinggian sekitar 114 m sehingga
                            dapat memberikan pemandangan kota Purwokerto dari ketinggian.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Terdapat area yang menarik yaitu jembatan kaca tembus pandang di lantai 3, yang memiliki
                            ketinggian 70-80m. Pada malam hari, bangunan luar menara ini memancarkan cahaya lampu
                            warna-warni sehingga sangat menarik jika diabadikan.
                        </p>
                    </div>
                    <div class="md:col-span-5 lg:col-span-4 bg-sky-50 p-6 rounded-xl shadow-lg">
                        <h3 class="text-2xl font-semibold text-sky-700 mb-4 text-center border-b-2 border-sky-200 pb-2">
                            <i class="far fa-clock mr-2"></i>Jam Operasional
                        </h3>
                        <p class="text-gray-700 text-lg text-center font-medium">
                            Setiap Hari:
                        </p>
                        <p class="text-sky-600 text-3xl font-bold text-center my-2">
                            09.00 - 22.00 WIB
                        </p>
                        <p class="text-gray-500 text-sm text-center mt-3">
                            Waktu dapat berubah sewaktu-waktu. Silakan hubungi kami untuk informasi terbaru.
                        </p>
                    </div>
                </div>
            </section>
            <hr class=" border-gray-200">
        </div>
    </div>
    {{-- Bagian Tim Kami --}}
    <x-main.ourTeam />
@endsection