<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 lg:p-10 text-gray-900 dark:text-gray-100">
                    <div class="text-center mb-10">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">Selamat Datang di Dashboard
                            {{ config('app.name') }}</h1>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Kelola semua hal terkait pemesanan tiket
                            Menara Teratai Anda di sini.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div class="flex justify-center order-last md:order-first">
                            <img src="{{ asset('images/menara/menara11.jpg') }}" alt="Menara Teratai View"
                                class="rounded-xl shadow-lg object-cover w-full h-64 md:h-80">
                        </div>

                        <div class="flex flex-col items-center md:items-start space-y-6">
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Apa yang ingin Anda
                                lakukan?</h2>

                            <a href="{{ route('my.bookings') }}"
                                class="w-full md:w-72 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out text-center flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M17 16h.01" />
                                </svg>
                                <span>Riwayat Pemesanan</span>
                            </a>

                            <a href="{{ route('booking.form') }}"
                                class="w-full md:w-72 bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out text-center flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Buat Pemesanan Baru</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>