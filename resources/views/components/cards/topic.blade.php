@props(['topic'])

<x-card :title="$topic->title" :show="route('topics.show', $topic->id)" :tags="$topic->tags">
    <x-slot:image>
        <a href="{{route('topics.show', $topic->id)}}">
            <div class="relative w-full h-[266px] bg-cover bg-center bg-no-repeat" style="background-image: url('{{$topic->image ? Storage::url($topic->image) : asset('images/placeholders/article.png')}}')">
                <!-- Even Larger Badge Image -->
                @if($topic->type === 'fakeNews')
                    @if($topic->fake_news_badge === 'notTrue')
                        <img src="{{ asset('images/topic/badges/fake-news/Untrue.png') }}" alt="Badge" class="absolute top-2 right-2 w-20 h-18">
                    @elseif($topic->fake_news_badge === 'halfTrue')
                        <img src="{{ asset('images/topic/badges/fake-news/Half-ture.png') }}" alt="Badge" class="absolute top-1 right-2 w-20 h-18">
                    @elseif($topic->fake_news_badge === 'misleadingContext')
                        <img src="{{ asset('images/topic/badges/fake-news/Misleading.png') }}" alt="Badge" class="absolute top-1 right-2 w-20 h-18">
                    @elseif($topic->fake_news_badge === 'unproven')
                        <img src="{{ asset('images/topic/badges/fake-news/Unproven.png') }}" alt="Badge" class="absolute top-2 right-2 w-20 h-18">
                    @else
                        <img src="{{ asset('images/topic/badges/fake-news/True.png') }}" alt="Badge" class="absolute top-2 right-2 w-20 h-18">
                    @endif
                @endif
            </div>
        </a>
    </x-slot:image>
</x-card>
