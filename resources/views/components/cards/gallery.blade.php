@props([
    'record',
    'index'
])

<div {{ $attributes->merge(['class' => 'thumbnail-container cursor-pointer']) }} onclick="openGalleryModal({{ $index }})">
    <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" class="thumbnail w-full h-60 object-cover rounded-lg shadow-md">
    <div class="thumbnail-title text-center mt-2 mb-0 text-sm font-medium text-gray-800">
        <h2>{{ $record->title }}</h2>
    </div>
</div>

<div id="gallery-modal-{{ $index }}" class="gallery-modal fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <button id="close-gallery-{{ $index }}" class="close-gallery-modal absolute top-4 right-4 text-black text-3xl z-[1000]">&times;</button>
    <div class="gallery-grid-container max-w-[900px] mx-auto pt-5">
        <div class="mb-4 text-black">
            <h2 class="text-2xl text-center font-bold">{{ $record->title }}</h2>
        </div>
        <div class="gallery-grid flex flex-col items-center justify-center gap-2.5">
            <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" data-gallery-id="{{ $index }}" data-image-index="0" class="w-[520px] object-cover rounded-lg cursor-pointer">
        </div>
        <div class="mb-4 text-black pt-2">
            {!! $record->description !!}
        </div>
    </div>
</div>

<div id="slideshow-modal-{{ $index }}" class="slideshow-modal fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
    <button id="close-slideshow-{{ $index }}" class="close-slideshow absolute top-4 right-4 text-white text-3xl z-[1000]">&times;</button>
    <div class="swiper-fullscreen w-full h-full flex items-center justify-center">
        <div class="swiper-wrapper">
            @foreach($record->images ?? [] as $image)
                <div class="swiper-slide flex items-center justify-center flex-col">
                    <img src="{{ Storage::url($image) }}" alt="{{ $record->title }}" class="max-w-full max-h-[80vh] object-contain">
                    <p class="text-white mt-4">{{ $record->title }}</p>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-prev swiper-button-prev-fullscreen text-black"></div>
        <div class="swiper-button-next swiper-button-next-fullscreen text-black"></div>
        <div class="swiper-pagination swiper-pagination-fullscreen"></div>
    </div>
</div>

@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        .gallery-modal {
            overflow-y: auto;
            padding: 20px;
            background-color: #F5F5F5;
        }
        .swiper-fullscreen, .swiper-slide {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
        }
        .swiper-slide img {
            display: block;
            margin: 0 auto;
        }
        .close-slideshow, .close-gallery-modal {
            z-index: 1000 !important;
        }
        .gallery-grid-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }
        .gallery-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-direction: column;
        }
        .gallery-grid img {
            width: 520px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
        }
        .thumbnail-container {
            width: 100%;
            display: inline-block;
            padding: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .thumbnail {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
        }
        .thumbnail-title {
            text-align: center;
            margin-top: 8px;
            margin-bottom: 0;
            font-size: 0.9rem;
            color: #333;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .gallery-grid img {
                width: 400px;
                height: 267px;
            }
            .thumbnail {
                height: 200px;
            }
        }
        @media (max-width: 640px) {
            .gallery-grid img {
                width: 320px;
                height: 213px;
            }
            .thumbnail {
                height: 160px;
            }
        }
    </style>
    <script>
        let slideshowSwipers = {};

        function openGalleryModal(index) {
            const modal = document.getElementById(`gallery-modal-${index}`);
            modal.classList.remove('hidden');

            const closeButton = document.getElementById(`close-gallery-${index}`);
            closeButton.removeEventListener('click', closeGalleryModal);
            closeButton.addEventListener('click', () => {
                closeGalleryModal(index);
            });
        }

        function closeGalleryModal(index) {
            const modal = document.getElementById(`gallery-modal-${index}`);
            modal.classList.add('hidden');
        }

        function openSlideshow(index, startIndex) {
            const galleryModal = document.getElementById(`gallery-modal-${index}`);
            const slideshowModal = document.getElementById(`slideshow-modal-${index}`);
            galleryModal.classList.add('hidden');
            slideshowModal.classList.remove('hidden');

            if (!slideshowSwipers[index]) {
                slideshowSwipers[index] = new Swiper(slideshowModal.querySelector('.swiper-fullscreen'), {
                    initialSlide: startIndex,
                    loop: true,
                    navigation: {
                        nextEl: `.swiper-button-next-fullscreen`,
                        prevEl: `.swiper-button-prev-fullscreen`,
                    },
                    pagination: {
                        el: `.swiper-pagination-fullscreen`,
                        clickable: true,
                    },
                    keyboard: {
                        enabled: true,
                    },
                });
            } else {
                slideshowSwipers[index].slideToLoop(startIndex);
            }

            const closeButton = document.getElementById(`close-slideshow-${index}`);
            closeButton.removeEventListener('click', closeSlideshow);
            closeButton.addEventListener('click', (e) => {
                e.stopPropagation();
                closeSlideshow(index);
            });

            slideshowModal.removeEventListener('click', handleSlideshowClickOutside);
            slideshowModal.addEventListener('click', handleSlideshowClickOutside);
        }

        function closeSlideshow(index) {
            const slideshowModal = document.getElementById(`slideshow-modal-${index}`);
            slideshowModal.classList.add('hidden');
        }

        function handleSlideshowClickOutside(e) {
            const index = e.currentTarget.id.split('-')[2];
            if (e.target === e.currentTarget || e.target.classList.contains('swiper-fullscreen')) {
                closeSlideshow(index);
            }
        }

        function handleGalleryClickOutside(e) {
            const index = e.currentTarget.id.split('-')[2];
            if (e.target === e.currentTarget) {
                closeGalleryModal(index);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.gallery-modal').forEach(modal => {
                modal.removeEventListener('click', handleGalleryClickOutside);
                modal.addEventListener('click', handleGalleryClickOutside);
            });

            document.querySelectorAll('.gallery-grid img').forEach(img => {
                img.addEventListener('click', (e) => {
                    const index = parseInt(e.target.getAttribute('data-gallery-id'));
                    const imageIndex = parseInt(e.target.getAttribute('data-image-index'));
                    openSlideshow(index, imageIndex);
                });
            });
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.gallery-modal:not(.hidden)').forEach(modal => {
                    const index = modal.id.split('-')[2];
                    closeGalleryModal(index);
                });
                document.querySelectorAll('.slideshow-modal:not(.hidden)').forEach(modal => {
                    const index = modal.id.split('-')[2];
                    closeSlideshow(index);
                });
            }
        });
    </script>
@endonce
