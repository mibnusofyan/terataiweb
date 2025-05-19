@php
    $ulasans = [
        [
            'name' => 'Sami M',
            'ulasan' =>
                '“Pemandangan 360 derajat yang luar biasa ke arah kota. Datanglah sebelum matahari terbenam dan saksikan matahari terbenam. Selain itu, tidak ada yang istimewa, kedai kopi yang harganya terlalu mahal, voucher yang Anda miliki akan membuatnya menjadi harga normal.”',
            'img' => 'images/testimonial/1.png',
            'rating' => 4,
        ],
        [
            'name' => 'Karso Mujiono',
            'ulasan' =>
                '“Suasana sejuk, pusat atraksi baru di kota. Tapi tidak banyak yang bisa dilihat dari atas. Mungkin di masa depan kalau banyak gedung tinggi akan lebih menarik.”',
            'img' => 'images/testimonial/2.png',
            'rating' => 5,
        ],
        [
            'name' => 'Creator Developer Designer',
            'ulasan' =>
                '“Dari puncak Menara Pandang Teratai, pengunjung dapat menikmati pemandangan spektakuler di sekitar Purwokerto. Anda akan dapat melihat keindahan kota, perbukitan, dan kehijauan daerah sekitar.”',
            'img' => 'images/testimonial/3.png',
            'rating' => 3,
        ],
        [
            'name' => 'AGHA',
            'ulasan' =>
                '“Wah seru banget! Purwokerto sekarang punya hal baru, ikon baru untuk kota ini..Ya, menara pandang ini baru saja dibuka dan berhasil menarik beberapa pengunjung (termasuk saya).”',
            'img' => 'images/testimonial/4.png',
            'rating' => 4,
        ],
        [
            'name' => 'Fathoni Faturrohman',
            'ulasan' =>
                '“ruang publik yang dibutuhkan oleh seluruh warga banyumas,, kecuali cuaca buruk karena ini dulunya adalah ruang terbuka dan terkadang difungsikan sebagai area taman bermain dan ya bagus untuk ikon baru banyumas”',
            'img' => 'images/testimonial/5.png',
            'rating' => 5,
        ],
    ];
@endphp

{{-- Link CSS KeenSlider --}}
<link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

<section id="testimoni" class="bg-gray-900 py-12 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

        {{-- Judul Section --}}
        <div class="mb-8 text-center max-w-xl mx-auto animate__animated animate__fadeIn" data-wow-delay="0.1s">
            <h5 class="text-blue-600 text-lg font-semibold mb-2">Testimonial</h5>
            <h1 class="text-4xl text-gray-200 md:text-5xl font-bold mb-0">Baca ulasan tepercaya dari pelanggan kami</h1>
        </div>

        <div id="keen-slider" class="keen-slider">
            {{-- Loop untuk setiap ulasan --}}
            @foreach ($ulasans as $rate)
                <div class="keen-slider__slide">
                    <blockquote class="rounded-lg bg-white p-6 shadow-sm sm:p-8 flex flex-col h-full">

                        <div class="flex items-center gap-4">
                            <img alt="{{ $rate['name'] }}" src="{{ asset($rate['img']) }}"
                                class="size-14 rounded-full object-cover" />

                            <div>
                                <p class="text-lg font-semibold text-gray-900">{{ $rate['name'] }}</p>

                                <div class="flex justify-center gap-0.5 text-red-600">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $rate['rating'])
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="gray">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <p class="mt-4 text-gray-700 dark:text-gray-900 text-base">
                            {{ $rate['ulasan'] }}
                        </p>
                    </blockquote>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex items-center justify-center gap-4">
            <button aria-label="Previous slide" id="keen-slider-previous"
                class="rounded-full border border-gray-300 bg-white p-3 text-gray-600 transition-colors hover:border-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <p class="w-16 text-center text-sm text-gray-200">
                <span id="keen-slider-active"></span>
                /
                <span id="keen-slider-count"></span>
            </p>

            <button aria-label="Next slide" id="keen-slider-next"
                class="rounded-full border border-gray-300 bg-white p-3 text-gray-600 transition-colors hover:border-gray-600 hover:text-gray-900">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- Script KeenSlider --}}
<script type="module">
    import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

    const keenSliderActive = document.getElementById('keen-slider-active')
    const keenSliderCount = document.getElementById('keen-slider-count')

    const keenSlider = new KeenSlider(
        '#keen-slider', {
        loop: true,
        defaultAnimation: {
            duration: 750,
        },
        slides: {
            origin: 'center',
            perView: 1,
            spacing: 16,
        },
        breakpoints: {
            '(min-width: 640px)': {
                slides: {
                    perView: 1.5,
                    spacing: 16,
                },
            },
            '(min-width: 768px)': {
                slides: {
                    perView: 2.5,
                    spacing: 16,
                },
            },
            '(min-width: 1024px)': {
                slides: {
                    perView: 3,
                    spacing: 24,
                },
            },
        },
        created(slider) {
            keenSliderActive.innerText = slider.track.details.rel + 1
            keenSliderCount.innerText = slider.slides.length
        },
        slideChanged(slider) {
            keenSliderActive.innerText = slider.track.details.rel + 1
        },
    },
        []
    )

    const keenSliderPrevious = document.getElementById('keen-slider-previous')
    const keenSliderNext = document.getElementById('keen-slider-next')

    keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
    keenSliderNext.addEventListener('click', () => keenSlider.next())

    keenSlider.on("updated", (slider) => {
        keenSliderActive.innerText = slider.track.details.rel + 1
        keenSliderCount.innerText = slider.slides.length
    })
</script>