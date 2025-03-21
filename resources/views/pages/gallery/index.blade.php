@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.gallery.header')" :description="translate('pages.gallery.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.gallery.header')" :description="translate('pages.gallery.description')"/>
        <div class="container mb-10 space-y-10">
            @foreach($topics->chunk(3) as $rowTopics)
                <div class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowTopics as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                            <button
                                type="button"
                                onclick="loadImages('{{ $record->id }}')"
                                class="cursor-pointer w-full"
                                data-topic-id="{{ $record->id }}"
                                aria-label="View gallery for {{ $record->title }}"
                            >
                                <x-card :title="$record->title">
                                    <x-slot:image>
                                        <div class="w-full h-[266px] bg-cover bg-center bg-no-repeat"
                                             style="background-image: url('{{ $record->image ? Storage::url($record->image) : asset('images/placeholders/article.png') }}')">
                                        </div>
                                    </x-slot:image>
                                </x-card>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="container my-20 space-y-10" dir="ltr">
            {{ $topics->appends(request()->except('page'))->links() }}
        </div>

        <!-- Popup Carousel with Full-Width Fix -->
        <div id="carouselPopup" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center min-h-screen">
            <div class="relative w-full max-w-full mx-auto">
                <button class="absolute top-4 right-4 text-white text-2xl z-50 hover:text-gray-300" onclick="closePopup()">×</button>
                <div class="relative w-full">
                    <div class="overflow-hidden w-full">
                        <div class="flex transition-transform duration-500 ease-in-out w-full min-h-[80vh]" id="imageCarousel">
                            <!-- Images loaded here -->
                        </div>
                    </div>
                    <button class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-3xl z-50 hover:text-gray-300" onclick="prevSlide()">❮</button>
                    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-3xl z-50 hover:text-gray-300" onclick="nextSlide()">❯</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentSlide = 0;
        let images = [];
        let isLoading = false;

        function updateCarousel() {
            const carousel = document.getElementById('imageCarousel');
            if (carousel && images.length > 0) {
                carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
                console.log('Carousel updated, current slide:', currentSlide);
            } else {
                console.warn('Cannot update carousel: element or images missing');
            }
        }

        function renderCarousel() {
            const carousel = document.getElementById('imageCarousel');
            if (!carousel) {
                console.error('Carousel element not found');
                throw new Error('Carousel container not found');
            }
            carousel.innerHTML = images.map((img, index) => `
                <div class="min-w-full flex-shrink-0">
                    <img src="${img}" class="w-full h-[80vh] object-contain" alt="Slide ${index + 1}" onload="console.log('Image loaded:', '${img}')" onerror="console.error('Image failed to load:', '${img}')">
                </div>
            `).join('');
            console.log('Carousel rendered with HTML:', carousel.innerHTML);
            setTimeout(updateCarousel, 0); // Force DOM update
        }

        function openPopup() {
            const popup = document.getElementById('carouselPopup');
            if (!popup) {
                console.error('Popup element not found');
                throw new Error('Popup container not found');
            }
            popup.classList.remove('hidden');
            console.log('Popup opened');
            currentSlide = 0;
            updateCarousel();
        }

        function closePopup() {
            const popup = document.getElementById('carouselPopup');
            if (popup) {
                popup.classList.add('hidden');
                console.log('Popup closed');
            }
        }

        function nextSlide() {
            if (images.length > 0) {
                currentSlide = (currentSlide + 1) % images.length;
                updateCarousel();
            }
        }

        function prevSlide() {
            if (images.length > 0) {
                currentSlide = (currentSlide - 1 + images.length) % images.length;
                updateCarousel();
            }
        }

        function loadImages(topicId) {
            if (isLoading) {
                console.log('Load in progress, skipping...');
                return;
            }
            isLoading = true;
            const url = '{{ url("gallery-images") }}/' + topicId;
            console.log('Fetching images from:', url);

            fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(`HTTP error ${response.status}: ${text}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Raw response:', data);
                    let imageData = Array.isArray(data) ? data :
                        data.images ? data.images :
                            data.data ? data.data : [];

                    if (!Array.isArray(imageData)) {
                        throw new Error('Expected an array, got: ' + JSON.stringify(imageData));
                    }

                    images = imageData.map(item =>
                        typeof item === 'string' ? item : (item.url || item.image || item)
                    ).filter(Boolean);

                    console.log('Processed images:', images);

                    if (images.length === 0) {
                        alert('No images available for this gallery.');
                        return;
                    }

                    // Preload images to avoid delays
                    Promise.all(images.map(src => new Promise((resolve, reject) => {
                        const img = new Image();
                        img.src = src;
                        img.onload = resolve;
                        img.onerror = reject;
                    })))
                        .then(() => {
                            renderCarousel();
                            openPopup();
                        })
                        .catch(() => alert('Failed to preload images'));
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    alert('Failed to load images: ' + error.message);
                })
                .finally(() => {
                    isLoading = false;
                    console.log('Loading complete');
                });
        }

        document.addEventListener('keydown', (e) => {
            const popup = document.getElementById('carouselPopup');
            if (popup && !popup.classList.contains('hidden')) {
                if (e.key === 'Escape') closePopup();
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded');
            if (!document.getElementById('imageCarousel')) {
                console.error('imageCarousel element missing');
            }
        });
    </script>
@endpush
