@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.gallery.header')" :description="translate('pages.gallery.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.gallery.header')" :description="translate('pages.gallery.description')"/>
        <!-- Load Swiper CSS (only for slideshow) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- Custom CSS to Ensure Centering and Styling -->
        <style>
            .gallery-modal {
                overflow-y: auto; /* Allow scrolling if content overflows */
                padding: 20px; /* Add padding to prevent content from touching edges */
                background-color: #F5F5F5; /* Add white-grey background color */
            }
            /* Rest of your existing styles remain unchanged */
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
                z-index: 1000 !important; /* Ensure close buttons are above all Swiper elements */
            }
            .gallery-grid-container {
                width: 100%;
                max-width: 900px; /* Match Facebook's typical gallery width */
                margin: 0 auto; /* Center the container */
            }
            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* 3 columns */
                gap: 10px; /* Spacing between images */
            }
            .gallery-grid img {
                width: 100%;
                height: 150px; /* Reduced height to prevent overflow */
                object-fit: cover;
                border-radius: 8px;
                cursor: pointer;
            }
            /* Responsive adjustments */
            @media (max-width: 1024px) {
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr); /* 2 columns on medium screens */
                }
            }
            @media (max-width: 640px) {
                .gallery-grid {
                    grid-template-columns: repeat(1, 1fr); /* 1 column on small screens */
                }
            }
        </style>

        <div class="container mb-10 space-y-10">
            @foreach($gallery->chunk(3) as $rowTopics)
                <div class="gallery-swiper flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0" data-gallery-id="{{ $loop->index }}">
                    @foreach($rowTopics as $record)
                        <div class="thumbnail cursor-pointer" onclick="openGalleryModal({{ $loop->index }})">
                            <img src="{{ $record->thumbnail ? Storage::url($record->thumbnail) : ($record->images[0] ?? asset('images/placeholders/article.png')) }}" alt="{{ $record->title }}" class="w-full h-[200px] object-cover rounded-lg">
                        </div>
                        <!-- Gallery Modal (Shows Title, Description, and Grid of Images) -->
                        <div id="gallery-modal-{{ $loop->index }}" class="gallery-modal fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
                            <button id="close-gallery-{{ $loop->index }}" class="close-gallery-modal absolute top-4 right-4 text-black text-3xl z-1000">×</button>
                            <div class="gallery-grid-container pt-5">
                                <!-- Title and Description -->
                                <div class="mb-4 text-black">
                                    <h2 class="text-2xl font-bold">{{ $record->title }}</h2>
                                </div>
                                <!-- Image Grid -->
                                <div class="gallery-grid">
                                    @foreach($record->images ?? [] as $key => $image)
                                        <img src="{{ Storage::url($image) }}" alt="{{ $record->title }}" data-gallery-id="{{ $loop->index }}" data-image-index="{{ $key }}">
                                    @endforeach
                                </div>
                                <div class="mb-4 text-black editor-content pt-2">
                                    {!! $record->description !!}
                                </div>
                            </div>
                        </div>

                        <!-- Full-Screen Slideshow Modal -->
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
            @endforeach
        <div class="container my-20 space-y-10" dir="ltr">
            {{ $gallery->appends(request()->except('page'))->links() }}
        </div>
    </div>

    <!-- Load Swiper JS (only for slideshow) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        let slideshowSwipers = {};

        // Open the gallery modal (grid of images)
        function openGalleryModal(galleryId) {
            const modal = document.getElementById(`gallery-modal-${galleryId}`);
            modal.classList.remove('hidden');

            // Attach close button event listener for gallery modal
            const closeButton = document.getElementById(`close-gallery-${galleryId}`);
            closeButton.removeEventListener('click', closeGalleryModal);
            closeButton.addEventListener('click', () => {
                closeGalleryModal(galleryId);
            });
        }

        // Close the gallery modal
        function closeGalleryModal(galleryId) {
            const modal = document.getElementById(`gallery-modal-${galleryId}`);
            modal.classList.add('hidden');
        }

        // Open the full-screen slideshow
        function openSlideshow(galleryId, startIndex) {
            const galleryModal = document.getElementById(`gallery-modal-${galleryId}`);
            const slideshowModal = document.getElementById(`slideshow-modal-${galleryId}`);

            // Hide the gallery modal
            galleryModal.classList.add('hidden');
            // Show the slideshow modal
            slideshowModal.classList.remove('hidden');

            // Initialize Swiper for the slideshow if not already initialized
            if (!slideshowSwipers[galleryId]) {
                slideshowSwipers[galleryId] = new Swiper(slideshowModal.querySelector('.swiper-fullscreen'), {
                    initialSlide: startIndex,
                    loop: true, // Enable looping to cycle through slides
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
                // Update the slide index if Swiper is already initialized
                slideshowSwipers[galleryId].slideToLoop(startIndex);
            }

            // Attach close button event listener for slideshow
            const closeButton = document.getElementById(`close-slideshow-${galleryId}`);
            closeButton.removeEventListener('click', closeSlideshow);
            closeButton.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent click from bubbling to the modal
                closeSlideshow(galleryId);
            });

            // Ensure the slideshow modal itself has a click listener for click-outside
            slideshowModal.removeEventListener('click', handleSlideshowClickOutside);
            slideshowModal.addEventListener('click', handleSlideshowClickOutside);
        }

        // Close the full-screen slideshow
        function closeSlideshow(galleryId) {
            const slideshowModal = document.getElementById(`slideshow-modal-${galleryId}`);
            slideshowModal.classList.add('hidden');
        }

        // Handle click outside for slideshow modal
        function handleSlideshowClickOutside(e) {
            const galleryId = e.currentTarget.id.split('-')[2];
            if (e.target === e.currentTarget || e.target.classList.contains('swiper-fullscreen')) {
                closeSlideshow(galleryId);
            }
        }

        // Close gallery modal on click outside
        document.querySelectorAll('.gallery-modal').forEach(modal => {
            modal.removeEventListener('click', handleGalleryClickOutside);
            modal.addEventListener('click', handleGalleryClickOutside);
        });

        function handleGalleryClickOutside(e) {
            const galleryId = e.currentTarget.id.split('-')[2];
            if (e.target === e.currentTarget) {
                closeGalleryModal(galleryId);
            }
        }

        // Close modals on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.gallery-modal:not(.hidden)').forEach(modal => {
                    const galleryId = modal.id.split('-')[2];
                    closeGalleryModal(galleryId);
                });
                document.querySelectorAll('.slideshow-modal:not(.hidden)').forEach(modal => {
                    const galleryId = modal.id.split('-')[2];
                    closeSlideshow(galleryId);
                });
            }
        });

        // Attach click event listeners to gallery images to open slideshow
        document.querySelectorAll('.gallery-grid img').forEach(img => {
            img.addEventListener('click', (e) => {
                const galleryId = parseInt(e.target.getAttribute('data-gallery-id'));
                const imageIndex = parseInt(e.target.getAttribute('data-image-index'));
                openSlideshow(galleryId, imageIndex);
            });
        });
    </script>
@endsection
