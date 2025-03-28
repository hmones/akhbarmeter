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

    <!-- Full-screen slider container -->
    <div id="fullscreen-slider" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
        <div id="slider-content" class="w-full h-full"></div>
        <button id="close-slider" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
    </div>
@endsection

@push('scripts')
    <script>
        async function loadImages(topicId) {
            try {
                // Fetch images from the API
                const url = '{{ url("gallery-images") }}/' + topicId;
                const response = await fetch(url);
                const images = await response.json();
                // const images = data;

                if (images.length === 0) {
                    alert('No images found for this topic.');
                    return;
                }

                // Show the slider
                const sliderContainer = document.getElementById('fullscreen-slider');
                const sliderContent = document.getElementById('slider-content');
                sliderContainer.classList.remove('hidden');

                // Simple slider implementation (you can enhance this with fullpage-image-slider)
                let currentIndex = 0;
                sliderContent.innerHTML = `<img src="${images[currentIndex]}" class="w-full h-full object-contain">`;

                // Basic navigation (optional: enhance with fullpage-image-slider)
                sliderContent.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % images.length;
                    sliderContent.innerHTML = `<img src="${images[currentIndex]}" class="w-full h-full object-contain">`;
                });

                // Close slider
                document.getElementById('close-slider').addEventListener('click', () => {
                    sliderContainer.classList.add('hidden');
                    sliderContent.innerHTML = ''; // Clear content
                });
            } catch (error) {
                console.error('Error loading images:', error);
                alert('Failed to load images.');
            }
        }
    </script>
@endpush
