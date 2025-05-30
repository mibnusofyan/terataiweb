{{-- resources/views/tentang-kami.blade.php --}}
@extends('layouts.main')

@section('title', 'Tentang Kami - Menara Teratai Purwokerto')

@push('styles')
    {{-- Tambahkan style khusus untuk halaman ini jika ada --}}
    <style>
        .team-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .hero-tentang-kami {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1580654712603-eb4627ace7a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dG93ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&q=60');
            /* Ganti dengan URL gambar yang relevan */
            background-size: cover;
            background-position: center;
        }
    </style>
@endpush

@section('content')
    {{-- Bagian Hero dengan Judul "Tentang Kami" --}}
    <div class="hero-tentang-kami py-28 md:py-36 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight"
                style="font-family: 'Emblema One', cursive;">Tentang Kami</h1>
            <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
                Mengenal lebih dekat Menara Teratai Purwokerto dan tim di baliknya.
            </p>
        </div>
    </div>

    <div class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-6 md:px-12">

            {{-- Bagian Deskripsi Menara Teratai & Jam Operasional --}}
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
                        <p class="text-gray-600 leading-relaxed">
                            Menara Teratai buka setiap hari dari pagi hingga malam hari dengan tarif Rp. 15.000.
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

            <hr class="my-12 lg:my-16 border-gray-200">

            {{-- Bagian Tim Kami --}}
            <x-main.ourTeam />
        </div>
    </div>

    {{-- Bagian tambahan jika diperlukan, misalnya Visi & Misi atau Sejarah --}}
    {{-- <div class="py-16 lg:py-24 bg-slate-50">
        <div class="container mx-auto px-6 md:px-12">
            <section>
                <h2 class="text-3xl font-semibold text-center text-gray-800 mb-12">Visi & Misi Kami</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-sky-700 mb-3">Visi</h3>
                        <p class="text-gray-600">Menjadi penyedia informasi dan layanan tiket terdepan untuk destinasi
                            wisata Purwokerto, memberikan kemudahan dan pengalaman tak terlupakan bagi setiap pengunjung.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-sky-700 mb-3">Misi</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Mengembangkan platform digital yang inovatif dan mudah digunakan.</li>
                            <li>Menyajikan informasi akurat dan terkini mengenai Menara Teratai.</li>
                            <li>Berkolaborasi dengan pihak terkait untuk meningkatkan kualitas pariwisata daerah.</li>
                            <li>Memberikan pelayanan pelanggan yang responsif dan profesional.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div> --}}

@endsection

@push('scripts')
    <script>
        // Script khusus untuk halaman ini jika ada
    </script>
@endpush