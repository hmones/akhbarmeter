@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.gallery.header')" :description="translate('pages.gallery.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.gallery.header')" :description="translate('pages.gallery.description')"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
            .gallery-swiper {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px 20px;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
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
                .gallery-swiper {
                    grid-template-columns: repeat(2, 1fr);
                }
                .gallery-grid {
                    flex-direction: column;
                }
                .gallery-grid img {
                    width: 400px;
                    height: 267px;
                }
                .thumbnail {
                    height: 200px;
                }
            }
            @media (max-width: 640px) {
                .gallery-swiper {
                    grid-template-columns: repeat(1, 1fr);
                }
                .gallery-grid {
                    flex-direction: column;
                }
                .gallery-grid img {
                    width: 320px;
                    height: 213px;
                }
                .thumbnail {
                    height: 160px;
                }
            }
        </style>

        <div class="container mb-10 space-y-10">
            <div class="gallery-swiper">
                @foreach($gallery as $record)
                    <div class="thumbnail-container cursor-pointer" onclick="openGalleryModal({{ $loop->index }})">
                        <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" class="thumbnail">
                        <div class="thumbnail-title">
                            <h2>{{ $record->title }}</h2>
                        </div>
                    </div>
                    <div id="gallery-modal-{{ $loop->index }}" class="gallery-modal fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
                        <button id="close-gallery-{{ $loop->index }}" class="close-gallery-modal absolute top-4 right-4 text-black text-3xl z-1000">×</button>
                        <div class="gallery-grid-container pt-5">
                            <div class="mb-4 text-black">
                                <h2 class="text-2xl text-center font-bold">{{ $record->title }}</h2>
                            </div>
                            <div class="gallery-grid">
                                <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" data-gallery-id="{{ $loop->index }}" data-image-index="0">
                            </div>
                            <div class="mb-4 text-black editor-content pt-2">
                                {!! $record->description !!}
                            </div>
                        </div>
                    </div>

                    <div id="slideshow-modal-{{ $loop->index }}" class="slideshow-modal fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
                        <button id="close-slideshow-{{ $loop->index }}" class="close-slideshow absolute top-4 right-4 text-white text-3xl z-1000">×</button>
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
                @endforeach
            </div>
            <div class="container my-20 space-y-10" dir="ltr">
                {{ $gallery->appends(request()->except('page'))->links() }}
            </div>
        </div>

        <!-- Load Swiper JS (only for slideshow) -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

                // Initialize Swiper for the slideshow if not already initialized
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
                    e.stopPropagation(); // Prevent click from bubbling to the modal
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

            document.querySelectorAll('.gallery-modal').forEach(modal => {
                modal.removeEventListener('click', handleGalleryClickOutside);
                modal.addEventListener('click', handleGalleryClickOutside);
            });

            function handleGalleryClickOutside(e) {
                const index = e.currentTarget.id.split('-')[2];
                if (e.target === e.currentTarget) {
                    closeGalleryModal(index);
                }
            }

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

            document.querySelectorAll('.gallery-grid img').forEach(img => {
                img.addEventListener('click', (e) => {
                    const index = parseInt(e.target.getAttribute('data-gallery-id'));
                    const imageIndex = parseInt(e.target.getAttribute('data-image-index'));
                    openSlideshow(index, imageIndex);
                });
            });
        </script>
@endsection
