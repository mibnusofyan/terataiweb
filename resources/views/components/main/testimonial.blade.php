@props(['reviews' => collect()])

{{-- Link CSS KeenSlider --}}
<link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

<section id="testimoni" class="bg-gray-900 py-12 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

        {{-- Judul Section --}}
        <div class="mb-8 text-center max-w-xl mx-auto animate__animated animate__fadeIn" data-wow-delay="0.1s">
            <h5 class="text-blue-600 text-lg font-semibold mb-2">Testimonial</h5>
            <h1 class="text-4xl text-gray-200 md:text-5xl font-bold mb-0">Baca ulasan tepercaya dari pelanggan kami
            </h1>
        </div>

        @if ($reviews && $reviews->count() > 0)
            <div id="keen-slider" class="keen-slider">
                {{-- Loop untuk setiap ulasan --}}
                @foreach ($reviews as $review)
                    <div class="keen-slider__slide">
                        <blockquote class="rounded-lg bg-white p-6 shadow-sm sm:p-8 flex flex-col h-full">

                            <div class="flex items-center gap-4">
                                @if (filter_var($review->image_path, FILTER_VALIDATE_URL))
                                    <img alt="{{ $review->name }}" src="{{ $review->image_path }}"
                                        class="size-14 rounded-full object-cover" />
                                @elseif ($review->image_path) {{-- Assuming local images are stored with a path --}}
                                    <img alt="{{ $review->name }}" src="{{ asset('storage/' . $review->image_path) }}"
                                        class="size-14 rounded-full object-cover" />
                                @else
                                    <div class="size-14 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-xl text-gray-600">{{ strtoupper(substr($review->name, 0, 1)) }}</span>
                                    </div>
                                @endif

                                <div>
                                    <p class="text-lg font-semibold text-gray-900">{{ $review->name }}</p>

                                    <div class="flex justify-center gap-0.5 text-yellow-400">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-gray-700 dark:text-gray-900 text-base">
                                {{ $review->message }}
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
        @else
            <p class="text-center text-gray-400">Belum ada ulasan.</p>
        @endif
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