<div class="w-full bg-gray-900 text-gray-400 px-4 md:px-8 py-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 animate__animated animate__fadeIn"
            data-wow-delay="0.1s">
            <div class="col-span-12 lg:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                    <div class="col-span-1 md:col-span-1 lg:col-span-1">
                        <h3 class="text-white text-xl font-semibold mb-4">Hubungi Kami</h3>
                        <div class="flex items-center mb-3">
                            <i class="bi bi-geo-alt text-blue-600 mr-2"></i>
                            <p class="mb-0 text-gray-400">Alamat Menara Teratai, Purwokerto</p>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="bi bi-envelope-open text-blue-600 mr-2"></i>
                            <p class="mb-0 text-gray-400">info@menarateratai.com</p>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="bi bi-telephone text-blue-600 mr-2"></i>
                            <p class="mb-0 text-gray-400">+62 xxx xxxx xxxx</p>
                        </div>
                        <div class="flex mt-4">
                            <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-2"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 rounded-full mr-0"
                                href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-1 lg:col-span-1 pt-0 md:pt-0 lg:pt-12">
                        <h3 class="text-white text-xl font-semibold mb-4">Link Cepat</h3>
                        <div class="flex flex-col justify-start">
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('landing-page') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Beranda</a>
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ url('/about') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Tentang Kami</a>
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('booking.form') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Daftar Tiket</a>
                            <a class="text-gray-400 hover:text-blue-600" href="{{ url('/contact') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Kontak</a>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-1 pt-0 md:pt-8 lg:pt-12">
                        <h3 class="text-white text-xl font-semibold mb-4">Link Lainnya</h3>
                        <div class="flex flex-col justify-start">
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('landing-page') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Beranda</a>
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ url('/about') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Tentang Kami</a>
                            <a class="text-gray-400 hover:text-blue-600 mb-2" href="{{ route('booking.form') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Daftar Tiket</a>
                            <a class="text-gray-400 hover:text-blue-600" href="{{ url('/contact') }}"><i
                                    class="bi bi-arrow-right text-blue-600 mr-2"></i>Kontak</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-span-full lg:col-span-4 md:col-span-2 md:col-start-1 lg:col-start-auto">
                <div class="flex flex-col items-center justify-center text-center h-full p-8 bg-gray-800 rounded">
                    <h3 class="text-white text-xl font-semibold mb-4">Newsletter</h3>
                    <h6 class="text-uppercase text-gray-300 mb-2 text-sm font-semibold">Berlangganan Newsletter Kami
                    </h6>
                    <p class="text-sm text-gray-400 mb-4">Amet justo diam dolor rebum lorem sit stet sea justo kasd
                    </p>
                    <form action="#" method="POST" class="w-full max-w-sm">
                        <div class="flex">
                            <input type="email"
                                class="flex-grow border border-white border-opacity-50 px-3 py-2 focus:outline-none focus:border-blue-600 bg-transparent text-white placeholder-gray-400"
                                placeholder="Email Anda">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition duration-300">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full py-4 lg:py-0 px-4 md:px-8 bg-gray-900">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-8">
        <div class="col-span-1 lg:col-span-1 py-4 lg:py-6 text-center">
            <p class="text-gray-400 mb-0">&copy; <a class="text-white font-bold hover:text-blue-600" href="#">Nama
                    Situs Anda</a>. Semua Hak Dilindungi.
            </p>
        </div>
        <div class="col-span-1 lg:col-span-1 py-4 lg:py-6 text-center">
            <p class="text-gray-400 mb-0">Dirancang oleh <a class="text-white font-bold hover:text-blue-600"
                    target="_blank" href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>
</div>
<a href="#"
    class="fixed bottom-8 right-8 bg-gray-800 text-white text-2xl p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-gray-700"
    id="backToTopBtn">
    <i class="bi bi-arrow-up"></i>
</a>