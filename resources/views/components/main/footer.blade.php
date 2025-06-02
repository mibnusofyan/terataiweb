<div class="w-full bg-gray-900 text-gray-400 px-4 md:px-8 py-12">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="mb-4">
            <h3 class="text-white text-xl font-semibold mb-4">Hubungi Kami</h3>
            <div class="flex items-center mb-3">
                <i class="bi bi-geo-alt text-blue-600 mr-2"></i>
                <p class="mb-0 text-gray-400">Jl. Bung Karno, Kalibener, Kedungwuluh, Kec. Purwokerto Tim.,
                    Kabupaten Banyumas, Jawa Tengah</p>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="text-white text-xl font-semibold mb-4">Link Cepat</h3>
            <div class="flex flex-col justify-start">
                <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('landing-page') }}"><i
                        class="bi bi-arrow-right text-blue-600 mr-2"></i>Beranda</a>
                <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('booking.form') }}"><i
                        class="bi bi-arrow-right text-blue-600 mr-2"></i>Daftar Tiket</a>
                <a class="text-gray-400 hover:text-blue-600" href="{{ url('/contact') }}"><i
                        class="bi bi-arrow-right text-blue-600 mr-2"></i>Kontak</a>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="text-white text-xl font-semibold mb-4">Sosial Media</h3>
            <div class="flex mt-4">
                <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                    href="#"><i class="fab fa-twitter"></i></a>
                <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                    href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                    href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-0"
                    target="_blank" href="https://www.instagram.com/menarateratai_purwokerto"><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="w-full py-4 lg:py-0 px-4 md:px-8 bg-gray-900">
    <div class="container mx-auto">
        <div class="text-center">
            <p class="text-gray-400 mb-0">&copy; <a class="text-white font-bold hover:text-blue-600" href="#">Menara
                    Teratai</a>. Semua Hak Dilindungi.
            </p>
        </div>
    </div>
</div>
<a href="#"
    class="fixed bottom-8 right-8 bg-gray-800 text-white text-2xl p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-gray-700"
    id="backToTopBtn">
    <i class="bi bi-arrow-up"></i>
</a>