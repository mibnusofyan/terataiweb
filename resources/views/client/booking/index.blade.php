@extends('layouts.main')

@section('title', 'Pesan Tiket - Menara Teratai')

@section('content')
    <section class="bg-gradient-to-r from-gray-800 to-gray-900 py-8">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-white" style="font-family: 'Emblema One', cursive;">Beli Tiket</h1>
        </div>
    </section>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="{{ route('booking.process') }}" method="POST"
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    @csrf

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="booking_date"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tanggal
                            Kunjungan:</label>
                        <input type="date" name="booking_date" id="booking_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('booking_date') border-red-500 @enderror"
                            value="{{ old('booking_date') }}" required min="{{ now()->toDateString() }}">
                        @error('booking_date')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Pilih Tiket dan
                            Jumlah:</label>

                        @forelse ($ticketTypes as $ticketType)
                            <div class="flex items-center mb-3 border-b pb-3 border-gray-200 dark:border-gray-700">
                                <div class="flex-grow">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $ticketType->name }}
                                    </h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Rp
                                        {{ number_format($ticketType->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="ml-4 flex items-center space-x-2">
                                    <button type="button" onclick="decrementQuantity({{ $ticketType->id }})"
                                        class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 font-bold py-1 px-3 rounded-lg focus:outline-none focus:shadow-outline">
                                        -
                                    </button>
                                    <input type="number" name="quantities[{{ $ticketType->id }}]"
                                        id="quantity_{{ $ticketType->id }}"
                                        class="shadow appearance-none w-16 py-1 px-3 rounded text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline text-center @error('quantities.' . $ticketType->id) border-red-500 @enderror"
                                        value="{{ old('quantities.' . $ticketType->id, 0) }}" min="0" readonly>
                                    <button type="button" onclick="incrementQuantity({{ $ticketType->id }})"
                                        class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 font-bold py-1 px-3 rounded-lg focus:outline-none focus:shadow-outline">
                                        +
                                    </button>
                                    @error('quantities.' . $ticketType->id)
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">Belum ada jenis tiket yang tersedia saat ini.
                            </p>
                        @endforelse
                        @error('quantities')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                            Pesan Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function incrementQuantity(ticketTypeId) {
            const quantityInput = document.getElementById('quantity_' + ticketTypeId);
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        function decrementQuantity(ticketTypeId) {
            const quantityInput = document.getElementById('quantity_' + ticketTypeId);
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 0) {
                quantityInput.value = currentValue - 1;
            }
        }
    </script>
@endsection