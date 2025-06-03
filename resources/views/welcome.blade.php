@extends('layouts.main')
@section('title', 'Menara Teratai Purwokerto')
@section('content')
    <div class="w-full p-2 md:p-4 lg:p-6 mb-8 md:mb-12 bg-gray-900 text-gray-400">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 py-8 md:py-12">
            <div class="col-span-1 lg:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <img class="w-full rounded-lg mb-4" src="{{ asset('images/menara/menara1.jpg') }}" alt="Hero Image 2">
                <p class="text-center text-5xl text-gray-400 mb-4">
                    <i class="bi bi-arrow-down animate-bounce"></i>
                </p>
                <p class="mb-0 text-gray-400">
                    Menara pandang setinggi 117 meter yang dibangun sejak tahun 2021 ini merupakah sebuah proyek
                    infrastruktur pariwisata baru di Kawasan Kota Baru Purwokerto yang berada di wilayah Jalan Bung Karno.
                    Menara ini dibuka untuk tahap uji coba pada tanggal 27 April 2022 dalam tahap finalisasi fasad bangunan.
                </p>
            </div>
            <div class="col-span-1 lg:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.3s"
                style="min-height: 500px;">
                <div class="relative h-full">
                    <img class="absolute w-full h-full object-cover rounded-lg"
                        src="{{ asset('images/menara/menara7.jpg') }}" alt="Hero Image 1">
                </div>
            </div>
            <div class="col-span-1 lg:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                <p class="mb-4 text-gray-400">
                    Pembangunan Menara Pandang Teratai Purwokerto merupakan inisiatif Pemerintah Kabupaten Banyumas untuk
                    menciptakan ikon baru Purwokerto di wilayah kawasan perkotaan baru.
                </p>
                <p class="text-center text-5xl text-gray-400 mb-4">
                    <i class="bi bi-arrow-up animate-bounce"></i>
                </p>
                <img class="w-full rounded-lg" src="{{ asset('images/menara/menara6.jpeg') }}" alt="Hero Image 3">
            </div>
            <div class="col-span-full text-center animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <h1 class="text-6xl md:text-7xl text-gray-400 text-center mb-0 font-['Emblema_One']">Menara Pandang Teratai
                </h1>
                <button
                    class="mt-6 px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-300">
                    <a href="{{ route('booking.form') }}">Beli Tiket</a>
                </button>
            </div>
        </div>
    </div>


    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-wrap lg:flex-nowrap items-center -mx-4">
            <div class="w-full lg:w-5/12 px-4 mb-8 lg:mb-0 animate__animated animate__fadeIn" data-wow-delay="0.1s"
                style="min-height: 500px;">
                <div class="relative h-full">
                    <img class="w-full h-full rounded-tl-full" src="{{ asset('images/menara/menara11.jpg') }}"
                        alt="About Image">
                </div>
            </div>
            <div class="w-full lg:w-7/12 px-4 animate__animated animate__fadeIn" data-wow-delay="0.2s">
                <div class="mb-8">
                    <h5 class="text-blue-600 text-lg font-semibold mb-2">Tentang Kami</h5>
                    <h1 class="text-4xl md:text-5xl font-bold mb-0">Tempat Wisata Terbaik di Purwokerto</h1>
                </div>
                <p class="mb-6 animate__animated animate__fadeIn" data-wow-delay="0.3s">
                    Menara pandang ini dibangun oleh pembiayaan program Pemulihan Ekonomi Nasional (PEN) dari dana APBN dan
                    nantinya akan dikelola oleh Badan Layanan Umum Daerah Unit Pelaksana Teknis Dinas (BLUD-UPTD) Lokawisata
                    Baturraden.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="animate__animated animate__fadeIn" data-wow-delay="0.4s">
                        <div class="bg-gray-100 rounded p-6">
                            <img class="w-20 h-20 object-cover bg-blue-600 rounded-full mb-3"
                                src="{{ asset('images/logo/architecture.png') }}" alt="Feature 1 Icon">
                            <h4 class="text-xl font-semibold mb-2">Arsitektur</h4>
                            <p class="mb-0 text-gray-700">
                                Puncak menara yang mahkota bunga teratai memiliki filosofi dari Dwipa Semarang dengan
                                pembagian menara menjadi tiga tingkatan, yakni tingkat bawah, tingkat tengah, dan tingkat
                                atas.
                            </p>
                        </div>
                    </div>
                    <div class="animate__animated animate__fadeIn" data-wow-delay="0.5s">
                        <div class="bg-gray-100 rounded p-6">
                            <img class="w-20 h-20 object-cover bg-blue-600 rounded-full mb-3"
                                src="{{ asset('images/logo/building.png') }}" alt="Feature 3 Icon">
                            <h4 class="text-xl font-semibold mb-2">Fitur Bangunan</h4>
                            <p class="mb-0 text-gray-700">
                                Menara pandang ini memiliki total lima lantai dengan penggunaan yang berbeda-beda.
                                ketinggian sekitar 70-80 meter dan puncak menara di bawah mahkota teratai yang dibatasi
                                dengan mesh atau pembatas jaring besi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 pb-12">
            <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <div class="rounded-lg text-center p-8 bg-gray-800 text-white">
                    <img class="w-36 h-36 mx-auto object-cover bg-white rounded-full mb-4"
                        src="{{ asset('images/menara/menara9.jpg') }}" alt="Feature Icon">
                    <h3 class="text-2xl font-semibold my-4">Pemandangan 360 Derajat</h3>
                    <p class="text-gray-300">
                        Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd
                        elitr duo vero amet amet stet
                    </p>
                    <a class="inline-block mt-4 text-blue-400 hover:text-blue-600" style="letter-spacing: 1px;"
                        href="#">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.3s">
                <div class="rounded-lg text-center p-8 bg-gray-800 text-white">
                    <img class="w-36 h-36 mx-auto object-cover bg-white rounded-full mb-4"
                        src="{{ asset('images/menara/menara10.jpeg') }}" alt="Feature Icon">
                    <h3 class="text-2xl font-semibold my-4">Fasilitas Lengkap</h3>
                    <p class="text-gray-300">
                        Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd
                        elitr duo vero amet amet stet
                    </p>
                    <a class="inline-block mt-4 text-blue-400 hover:text-blue-600" style="letter-spacing: 1px;"
                        href="#">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                <div class="rounded-lg text-center p-8 bg-gray-800 text-white">
                    <img class="w-36 h-36 mx-auto object-cover bg-white rounded-full mb-4"
                        src="{{ asset('images/menara/menara11.jpg') }}" alt="Feature Icon">
                    <h3 class="text-2xl font-semibold my-4">Lokasi Strategis</h3>
                    <p class="text-gray-300">
                        Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd
                        elitr duo vero amet amet stet
                    </p>
                    <a class="inline-block mt-4 text-blue-400 hover:text-blue-600" style="letter-spacing: 1px;"
                        href="#">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full pt-12 px-0 relative">
        <div class="mb-8 text-center max-w-xl mx-auto animate__animated animate__fadeIn" data-wow-delay="0.1s">
            <h5 class="text-blue-600 text-lg font-semibold mb-2">Galeri Foto</h5>
            <h1 class="text-4xl md:text-5xl font-bold mb-0">Jelajahi Keindahan Menara Teratai</h1>
        </div>
        <div class="text-center">
            <div class="tab-content">
                <div id="tab-1" class="p-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0">
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.1s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 1
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.2s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara1.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 2
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.3s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara3.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 3
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.4s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan3.jpeg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 4
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan2.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 5
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara6.jpeg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 6
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 7
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara9.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Pemandangan 8
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="p-0 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0">
                        <div class="col-span-1 md:col-span-1">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menu-6.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Fasilitas 1
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="p-0 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0">
                        <div class="col-span-1 md:col-span-1">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('images/menu-7.jpg') }}"
                                    alt="Gallery Image">
                                <div
                                    class="absolute bottom-4 end-4 mb-4 mr-4 py-1 px-3 bg-gray-900 text-blue-600 rounded-full">
                                    Lainnya 1
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-main.ourTeam />

    <div class="container mx-auto px-4 py-8 md:py-10 my-6 md:my-8">
        <div class="mb-8 text-center max-w-xl mx-auto animate__animated animate__fadeIn" data-wow-delay="0.1s">
            <h5 class="text-blue-600 text-lg font-semibold mb-2">Artikel Terbaru</h5>
            <h1 class="text-4xl md:text-5xl font-bold mb-0">Artikel Terbaru Tentang Menara Teratai</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            {{-- Item Artikel 1 --}}
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden rounded-t-lg h-56">
                        <img class="absolute w-full h-full object-cover" src="{{ asset('images/artikel/capster.png') }}"
                            alt="Artikel Image">
                    </div>
                    <div class="flex items-center rounded-b-lg p-4"> {{-- Pastikan rounded-b-lg --}}
                        <div class="flex-shrink-0 text-center text-gray-400 border-r border-gray-600 pr-3 mr-3">
                            <span>01</span>
                            <h6 class="text-blue-600 uppercase mb-0 text-sm font-semibold">Januari</h6>
                            <span>2045</span>
                        </div>
                        <a class="text-lg font-semibold leading-tight text-white hover:text-blue-600" href="#">
                            Capster Talent Day 2025
                        </a>
                    </div>
                </div>
            </div>

            {{-- Item Artikel 2 --}}
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.3s">
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden rounded-t-lg h-56">
                        <img class="absolute w-full h-full object-cover" src="{{ asset('images/artikel/eternallove.png') }}"
                            alt="Artikel Image">
                    </div>
                    <div class="flex items-center rounded-b-lg p-4">
                        <div class="flex-shrink-0 text-center text-gray-400 border-r border-gray-600 pr-3 mr-3">
                            <span>01</span>
                            <h6 class="text-blue-600 uppercase mb-0 text-sm font-semibold">Januari</h6>
                            <span>2045</span>
                        </div>
                        <a class="text-lg font-semibold leading-tight text-white hover:text-blue-600" href="#">
                            Purwokerto Wedding Festival
                        </a>
                    </div>
                </div>
            </div>

            {{-- Item Artikel 3 --}}
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden rounded-t-lg h-56">
                        <img class="absolute w-full h-full object-cover" src="{{ asset('images/artikel/kapalapi.png') }}"
                            alt="Artikel Image">
                    </div>
                    <div class="flex items-center rounded-b-lg p-4">
                        <div class="flex-shrink-0 text-center text-gray-400 border-r border-gray-600 pr-3 mr-3">
                            <span>01</span>
                            <h6 class="text-blue-600 uppercase mb-0 text-sm font-semibold">Januari</h6>
                            <span>2045</span>
                        </div>
                        <a class="text-lg font-semibold leading-tight text-white hover:text-blue-600" href="#">
                            Gerak Semangat bersama Kapal Api
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-main.testimonial :reviews="$reviews" />

    <div class="w-full relative overflow-hidden">
        <a href="#" class="absolute inset-0 flex items-center justify-center bg-white rounded-full z-10"
            style="width: 100px; height: 100px; margin: auto;">
            <i class="fab fa-instagram text-4xl text-gray-700 hover:text-blue-600"></i>
        </a>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-0">
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara1.jpg') }}"
                    alt="Instagram Image">
            </div>
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.2s">
                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara.jpg') }}" alt="Instagram Image">
            </div>
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.3s">
                <img class="w-full h-full object-cover" src="{{ asset('images/menara/menara6.jpeg') }}"
                    alt="Instagram Image">
            </div>
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.4s">
                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan.jpg') }}"
                    alt="Instagram Image">
            </div>
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.5s">
                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan2.jpg') }}"
                    alt="Instagram Image">
            </div>
            <div class="col-span-1 animate__animated animate__fadeIn" data-wow-delay="0.6s">
                <img class="w-full h-full object-cover" src="{{ asset('images/jembatan/jembatan4.jpg') }}"
                    alt="Instagram Image">
            </div>
        </div>
    </div>
@endsection