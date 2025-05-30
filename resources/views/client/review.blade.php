@extends('layouts.main')

@section('title', 'Ulasan - Menara Teratai Purwokerto')

@push('styles')
    <style>
        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            /* Sesuaikan ukuran bintang */
            color: #ddd;
            /* Warna bintang kosong */
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #facc15;
            /* Warna bintang terisi (kuning Tailwind) */
        }

        /* Untuk menampilkan bintang dari kanan ke kiri saat hover */
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
        }
    </style>
@endpush

@section('content')
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 py-20 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl font-bold text-white tracking-tight" style="font-family: 'Emblema One', cursive;">Ulasan
            </h1>
        </div>
    </div>

    <div class="bg-gray-100">
        <div class="container mx-auto">
            <section class="my-16">
                <h2 class="text-3xl font-semibold text-center text-gray-800 mb-2">Sampaikan Ulasan Anda</h2>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <form action="{{ route('reviews.store') }}" method="POST"
                    class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    @csrf
                    @guest
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Anda:</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition duration-150 ease-in-out"
                            placeholder="Masukkan nama Anda" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    @endguest
                    <div class="mb-6 text-center">
                        <span class="text-gray-700 block mb-2">Beri Peringkat:</span>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5" required /><label for="star5"
                                title="5 stars"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                                title="4 stars"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                                title="3 stars"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                title="2 stars"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                                title="1 star"><i class="fas fa-star"></i></label>
                        </div>
                        @error('rating')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Pesan Anda:</label>
                        <textarea id="message" name="message" rows="5"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition duration-150 ease-in-out"
                            placeholder="Tulis ulasan Anda di sini..." required></textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                            Kirim
                        </button>
                    </div>
                </form>
            </section>
            <hr class="my-12 border-gray-300">
        </div>

        {{-- Bagian Testimonial --}}
        <x-main.testimonial :reviews="$reviews" />
    </div>
@endsection

@push('scripts')
    <script>
        const ratingStars = [...document.getElementsByClassName("star-rating label")];

        function executeRating(stars) {
            const starClassActive = "fas fa-star text-yellow-400";
            const starClassInactive = "far fa-star text-gray-300";
            const starsLength = stars.length;
            let i;
            stars.map((star) => {
                star.onclick = () => {
                    i = stars.indexOf(star);

                    if (star.className === starClassInactive) {
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                    }
                };
            });
        }
    </script>
@endpush