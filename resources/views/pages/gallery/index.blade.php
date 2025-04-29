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
                display: flex; /* Changed to flex for centering */
                justify-content: center; /* Center horizontally */
                align-items: center; /* Center vertically */
                gap: 10px; /* Spacing between images */
                flex-direction: column; /* Stack image and title vertically */
            }
            .gallery-grid img {
                width: 480px; /* Increased width (previously 360px), maintaining 6:4 ratio */
                height: 320px; /* Increased height (previously 240px), maintaining 6:4 ratio (480/320 = 1.5) */
                object-fit: cover;
                border-radius: 8px;
                cursor: pointer;
            }
            .gallery-swiper {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* 3 equal columns */
                gap: 5px 20px; /* Row gap: 5px, Column gap: 20px */
                width: 100%;
                max-width: 1200px; /* Limit the max width for larger screens */
                margin: 0 auto; /* Center the grid */
            }
            .thumbnail-container {
                width: 100%; /* Take the full width of the grid column */
                display: inline-block; /* Ensure container wraps content */
                padding: 0; /* Remove padding to eliminate extra space */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
                border-radius: 8px; /* Match the image's border-radius */
            }
            .thumbnail {
                width: 100%;
                height: 240px; /* Fixed height to ensure uniformity, maintaining 6:4 ratio with responsive widths */
                object-fit: cover;
                border-radius: 8px;
                cursor: pointer;
            }
            .thumbnail-title {
                text-align: center;
                margin-top: 8px;
                margin-bottom: 0; /* Remove extra space below title */
                font-size: 0.9rem;
                color: #333;
                font-weight: 500;
            }
            .gallery-grid-title {
                text-align: center;
                margin-top: 8px;
                font-size: 1rem;
                color: #000;
                font-weight: 500;
            }
            /* Responsive adjustments */
            @media (max-width: 1024px) {
                .gallery-swiper {
                    grid-template-columns: repeat(2, 1fr); /* 2 columns on medium screens */
                }
                .gallery-grid {
                    flex-direction: column; /* Stack on smaller screens */
                }
                .gallery-grid img {
                    width: 400px; /* Slightly smaller for medium screens */
                    height: 267px; /* Maintain 6:4 ratio (400/1.5 ≈ 267) */
                }
                .thumbnail {
                    height: 200px; /* Adjusted height for medium screens (6:4 ratio) */
                }
            }
            @media (max-width: 640px) {
                .gallery-swiper {
                    grid-template-columns: repeat(1, 1fr); /* 1 column on small screens */
                }
                .gallery-grid {
                    flex-direction: column; /* Stack on smaller screens */
                }
                .gallery-grid img {
                    width: 320px; /* Even smaller for small screens */
                    height: 213px; /* Maintain 6:4 ratio (320/1.5 ≈ 213) */
                }
                .thumbnail {
                    height: 160px; /* Adjusted height for small screens (6:4 ratio) */
                }
            }
        </style>

        <div class="container mb-10 space-y-10">
            <div class="gallery-swiper">
                @foreach($gallery as $record)
                    <div class="thumbnail-container cursor-pointer" onclick="openGalleryModal({{ $loop->index }})">
                        <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" class="thumbnail">
                        <div class="thumbnail-title">{{ $record->title }}</div>
                    </div>
                    <div id="gallery-modal-{{ $loop->index }}" class="gallery-modal fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
                        <button id="close-gallery-{{ $loop->index }}" class="close-gallery-modal absolute top-4 right-4 text-black text-3xl z-1000">×</button>
                        <div class="gallery-grid-container pt-5">
                            <!-- Title and Description -->
                            <div class="mb-4 text-black">
                                <h2 class="text-2xl font-bold">{{ $record->title }}</h2>
                            </div>
                            <!-- Single Thumbnail Image with Title -->
                            <div class="gallery-grid">
                                <img src="{{ Storage::url($record->thumbnail) }}" alt="{{ $record->title }}" data-gallery-id="{{ $loop->index }}" data-image-index="0">
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
            <div class="container my-20 space-y-10" dir="ltr">
                {{ $gallery->appends(request()->except('page'))->links() }}
            </div>
        </div>

        <!-- Load Swiper JS (only for slideshow) -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            let slideshowSwipers = {};

            // Open the gallery modal (grid of images)
            function openGalleryModal(index) {
                const modal = document.getElementById(`gallery-modal-${index}`);
                modal.classList.remove('hidden');

                // Attach close button event listener for gallery modal
                const closeButton = document.getElementById(`close-gallery-${index}`);
                closeButton.removeEventListener('click', closeGalleryModal);
                closeButton.addEventListener('click', () => {
                    closeGalleryModal(index);
                });
            }

            // Close the gallery modal
            function closeGalleryModal(index) {
                const modal = document.getElementById(`gallery-modal-${index}`);
                modal.classList.add('hidden');
            }

            // Open the full-screen slideshow
            function openSlideshow(index, startIndex) {
                const galleryModal = document.getElementById(`gallery-modal-${index}`);
                const slideshowModal = document.getElementById(`slideshow-modal-${index}`);

                // Hide the gallery modal
                galleryModal.classList.add('hidden');
                // Show the slideshow modal
                slideshowModal.classList.remove('hidden');

                // Initialize Swiper for the slideshow if not already initialized
                if (!slideshowSwipers[index]) {
                    slideshowSwipers[index] = new Swiper(slideshowModal.querySelector('.swiper-fullscreen'), {
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
                    slideshowSwipers[index].slideToLoop(startIndex);
                }

                // Attach close button event listener for slideshow
                const closeButton = document.getElementById(`close-slideshow-${index}`);
                closeButton.removeEventListener('click', closeSlideshow);
                closeButton.addEventListener('click', (e) => {
                    e.stopPropagation(); // Prevent click from bubbling to the modal
                    closeSlideshow(index);
                });

                // Ensure the slideshow modal itself has a click listener for click-outside
                slideshowModal.removeEventListener('click', handleSlideshowClickOutside);
                slideshowModal.addEventListener('click', handleSlideshowClickOutside);
            }

            // Close the full-screen slideshow
            function closeSlideshow(index) {
                const slideshowModal = document.getElementById(`slideshow-modal-${index}`);
                slideshowModal.classList.add('hidden');
            }

            // Handle click outside for slideshow modal
            function handleSlideshowClickOutside(e) {
                const index = e.currentTarget.id.split('-')[2];
                if (e.target === e.currentTarget || e.target.classList.contains('swiper-fullscreen')) {
                    closeSlideshow(index);
                }
            }

            // Close gallery modal on click outside
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

            // Close modals on Escape key
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

            // Attach click event listeners to gallery thumbnail to open slideshow
            document.querySelectorAll('.gallery-grid img').forEach(img => {
                img.addEventListener('click', (e) => {
                    const index = parseInt(e.target.getAttribute('data-gallery-id'));
                    const imageIndex = parseInt(e.target.getAttribute('data-image-index'));
                    openSlideshow(index, imageIndex);
                });
            });
        </script>
@endsection
