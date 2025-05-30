@extends('layouts.main')

@section('title', 'Unggah Bukti Transfer - Menara Teratai')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
                {{ __('Unggah Bukti Transfer') }}
            </h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div
                        class="p-6 mb-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border-t-4 border-blue-500 dark:border-blue-400">
                        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Untuk Pesanan
                            #{{ $booking->id }}</h2>
                        <p class="text-gray-700 dark:text-gray-300 mb-2">Tanggal Kunjungan:
                            {{ $booking->booking_date->format('d M Y') }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 mb-2">Total Harga: <span
                                class="font-bold text-blue-600 dark:text-blue-400">Rp
                                {{ number_format($booking->total_price, 0, ',', '.') }}</span></p>
                        <p class="text-gray-700 dark:text-gray-300">Status Saat Ini: <span
                                class="font-bold capitalize">{{ $booking->status }}</span>
                        </p>
                    </div>

                    <form action="{{ route('payment.upload.process', $booking) }}" method="POST"
                        enctype="multipart/form-data" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">

                        @csrf
                        <div class="mb-4">
                            <label for="payment_proof"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Pilih Bukti
                                Transfer
                                (Gambar
                                atau PDF):</label>
                            <input type="file" name="payment_proof" id="payment_proof"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('payment_proof') border-red-500 @enderror"
                                required>
                            @error('payment_proof')
                                <p class="text-red-500 dark:text-red-400 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                                Unggah Bukti
                            </button>
                            <a href="{{ route('my.bookings') }}"
                                class="inline-block align-baseline font-bold text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-600">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection