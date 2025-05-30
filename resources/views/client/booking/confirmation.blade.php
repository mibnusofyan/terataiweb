@extends('layouts.main')

@section('title', 'Konfirmasi Pesanan - Menara Teratai')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
                {{ __('Pesanan Berhasil Dibuat!') }}
            </h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Informasi Umum Pesanan --}}
                    <div class="text-center mb-8">
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-lg">Terima kasih telah memesan tiket Menara
                            Teratai.</p>
                        <p class="text-gray-700 dark:text-gray-300 mb-6 text-lg">Pesanan Anda
                            telah kami terima dengan status <span
                                class="font-bold text-orange-600 dark:text-orange-400">Pending Pembayaran</span>.</p>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-lg">Silakan lakukan pembayaran dan unggah bukti transfer Anda.</p>
                    </div>

                    {{-- Kontainer Flexbox untuk Detail Pesanan dan Pembayaran --}}
                    <div class="flex flex-col md:flex-row gap-8 justify-center">
                        @isset($latestBooking)
                            <div class="w-full md:w-2/3 bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                                <h2
                                    class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 pb-2">
                                    Detail Pesanan Anda</h2>
                                <div class="text-gray-800 dark:text-gray-200">
                                    <p class="mb-2"><span class="font-semibold">ID Pesanan:</span> #{{ $latestBooking->id }}
                                    </p>
                                    <p class="mb-2"><span class="font-semibold">Tanggal Kunjungan:</span>
                                        {{ $latestBooking->booking_date->format('d M Y') }}</p>
                                    <p class="mb-2"><span class="font-semibold">Total Harga:</span> Rp
                                        <span
                                            class="font-bold text-blue-600 dark:text-blue-400">{{ number_format($latestBooking->total_price, 0, ',', '.') }}</span></p>
                                    <p class="mb-4"><span class="font-semibold">Status:</span> <span
                                            class="font-semibold capitalize {{ $latestBooking->status === 'pending' ? 'text-orange-600 dark:text-orange-400' : ($latestBooking->status === 'confirmed' || $latestBooking->status === 'completed' ? 'text-green-600 dark:text-green-400' : 'text-gray-700 dark:text-gray-300') }}">
                                            {{ str_replace('_', ' ', $latestBooking->status) }}
                                        </span>
                                    </p>
                                    <h3 class="font-semibold mb-2 border-b border-gray-200 dark:border-gray-600 pb-1">Item
                                        Pesanan:</h3>
                                    <ul class="list-disc list-inside mb-4">
                                        @forelse ($latestBooking->bookingItems as $item)
                                            <li>{{ $item->quantity }}x {{ $item->ticketType->name }} - Rp
                                                {{ number_format($item->subtotal, 0, ',', '.') }}</li>
                                        @empty
                                            <li>Tidak ada item dalam pesanan ini.</li>
                                        @endforelse
                                    </ul>

                                    {{-- Tombol Unggah Bukti Pembayaran --}}
                                    @if ($latestBooking->status === 'pending')
                                        <div class="mt-6 text-center">
                                             <a href="{{ route('payment.upload.form', $latestBooking->id) }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-300 text-base inline-block">
                                                Unggah Bukti Pembayaran
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="text-center text-gray-600 dark:text-gray-400">Tidak dapat menemukan detail pesanan.</p>
                        @endisset
                    </div>

                    <div class="mt-8 text-center">
                        <p class="mb-2"><a href="{{ route('my.bookings') }}"
                                class="text-blue-600 dark:text-blue-400 hover:underline text-lg">Lihat Riwayat Pesanan
                                Saya</a></p>

                        <p><a href="{{ route('landing-page') }}"
                                class="text-blue-600 dark:text-blue-400 hover:underline text-lg">Kembali ke Beranda</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection