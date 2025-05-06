<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @forelse ($bookings as $booking)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6 border-t-4 border-blue-500 dark:border-blue-400">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <div class="mb-4 sm:mb-0">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Pesanan
                                    #{{ $booking->id }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Tanggal Pesan:
                                    {{ $booking->created_at->format('d M Y H:i') }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Tanggal Kunjungan:
                                    {{ $booking->booking_date->format('d M Y') }}
                                </p>
                            </div>
                            <div class="text-left sm:text-right">
                                <span
                                    class="px-3 py-1 text-sm font-semibold rounded-full
                                                    @if ($booking->status === 'pending') bg-yellow-200 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-200
                                                    @elseif ($booking->status === 'paid') bg-green-200 text-green-800 dark:bg-green-700 dark:text-green-200
                                                    @elseif ($booking->status === 'cancelled') bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-200
                                                    @elseif ($booking->status === 'completed') bg-blue-200 text-blue-800 dark:bg-blue-700 dark:text-blue-200
                                                    @else bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                                <p class="text-lg font-bold mt-2 text-gray-900 dark:text-gray-100">Total: Rp
                                    {{ number_format($booking->total_price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">Detail Tiket:
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
                                @forelse ($booking->bookingItems as $item)
                                    <li>
                                        {{ $item->quantity }}x {{ $item->ticketType->name }}
                                        (@ Rp {{ number_format($item->price_per_item, 0, ',', '.') }})
                                        - Subtotal: Rp
                                        {{ number_format($item->quantity * $item->price_per_item, 0, ',', '.') }}
                                    </li>
                                @empty
                                    <li>Tidak ada detail item untuk pesanan ini.</li>
                                @endforelse
                            </ul>
                        </div>

                        @if ($booking->status === 'pending')
                            <div class="text-right">
                                <a href="{{ route('payment.upload.form', $booking) }}"
                                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
                                    Unggah Bukti Transfer
                                </a>
                            </div>
                        @endif

                    </div>
                @empty
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                        <p class="text-gray-600 dark:text-gray-400 text-lg mb-4">Anda belum memiliki riwayat pesanan
                            tiket.</p>
                        <a href="{{ route('booking.form') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Pesan Tiket Sekarang
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
