@extends('layouts.main')

@section('title', 'Kontak - Menara Teratai Purwokerto')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-gray-800 to-gray-900 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Emblema One', cursive;">Kontak</h1>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Visit Us -->
                <div class="text-center bg-white p-8 rounded-lg shadow-lg">
                    <div
                        class="bg-gray-800 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Visit Us</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Jl. Bung Karno, Kalibener, Kedungwuluh, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah
                    </p>
                </div>

                <!-- Email Us -->
                <div class="text-center bg-white p-8 rounded-lg shadow-lg">
                    <div
                        class="bg-gray-800 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Email Us</h3>
                    <p class="text-gray-600">
                        <a href="mailto:info@menarapurwokerto.com" class="hover:text-blue-600 transition duration-300">
                            info@menarapurwokerto.com
                        </a>
                    </p>
                </div>

                <!-- Call Us -->
                <div class="text-center bg-white p-8 rounded-lg shadow-lg">
                    <div
                        class="bg-gray-800 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Call Us</h3>
                    <p class="text-gray-600">
                        <a href="tel:+62345678" class="hover:text-blue-600 transition duration-300">
                            +012 345 6789
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3956.304428467786!2d109.2299732!3d-7.4315255!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f1132540dff%3A0x4bc3543636f5849e!2sMenara%20Pandang%20Teratai!5e0!3m2!1sen!2sid!4v1748579173597!5m2!1sen!2sid"
                    width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" width="100%" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full">
                </iframe>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Form submission handling
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Mengirim...';
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    alert('Terima kasih! Pesan Anda telah terkirim.');
                    form.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    </script>
@endpush