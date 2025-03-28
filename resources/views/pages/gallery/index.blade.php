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
    </div>

    <div id="fullscreen-slider" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
        <div id="slider-content" class="w-full h-full relative flex items-center justify-center">
            <img id="slider-image" src="" class="max-w-full max-h-full object-contain" alt="Slider Image">
            <button id="prev-slide" class="absolute left-4 text-white text-4xl p-2 hover:bg-gray-800 rounded-full" aria-label="Previous Image">&larr;</button>
            <button id="next-slide" class="absolute right-4 text-white text-4xl p-2 hover:bg-gray-800 rounded-full" aria-label="Next Image">&rarr;</button>
        </div>
        <button id="close-slider" class="absolute top-4 right-4 text-white text-2xl p-2 hover:bg-gray-800 rounded-full">×</button>
    </div>
@endsection

@push('scripts')
    <script>
        let images = [];
        let currentIndex = 0;

        async function loadImages(topicId) {
            try {
                const url = '{{ url("gallery-images") }}/' + topicId;
                const response = await fetch(url);
                const data = await response.json();
                images = data;

                if (images.length === 0) {
                    alert('No images found for this topic.');
                    return;
                }

                const sliderContainer = document.getElementById('fullscreen-slider');
                const sliderImage = document.getElementById('slider-image');
                sliderContainer.classList.remove('hidden');

                currentIndex = 0;
                sliderImage.src = images[currentIndex];

                const updateImage = () => {
                    sliderImage.src = images[currentIndex];
                };

                const prevSlide = () => {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    updateImage();
                };

                const nextSlide = () => {
                    currentIndex = (currentIndex + 1) % images.length;
                    updateImage();
                };

                document.getElementById('prev-slide').addEventListener('click', prevSlide);
                document.getElementById('next-slide').addEventListener('click', nextSlide);

                document.addEventListener('keydown', (e) => {
                    if (!sliderContainer.classList.contains('hidden')) {
                        if (e.key === 'ArrowLeft') prevSlide();
                        if (e.key === 'ArrowRight') nextSlide();
                        if (e.key === 'Escape') closeSlider();
                    }
                });

                document.getElementById('close-slider').addEventListener('click', closeSlider);

                function closeSlider() {
                    sliderContainer.classList.add('hidden');
                    sliderImage.src = '';
                    images = [];
                }
            } catch (error) {
                console.error('Error loading images:', error);
                alert('Failed to load images.');
            }
        }
    </script>
@endpush
