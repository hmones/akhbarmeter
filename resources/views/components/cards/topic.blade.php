@props(['topic'])

<x-card :title="$topic->title" :show="route('topics.show', $topic->id)" :tags="$topic->tags">
    <x-slot:image>
        <a href="{{route('topics.show', $topic->id)}}">
            <div class="relative w-full h-[266px] bg-cover bg-center bg-no-repeat" style="background-image: url('{{$topic->image ? Storage::url($topic->image) : asset('images/placeholders/article.png')}}')">
                <!-- Even Larger Badge Image -->
                @if($topic->type === 'fakeNews')
                    @if($topic->fake_news_badge === 'notTrue')
                        <img src="{{ asset('images/topic/badges/fake-news/Untrue.png') }}" alt="Badge" class="absolute top-4 left-4 w-21 h-18">
                    @elseif($topic->fake_news_badge === 'halfTrue')
                        <img src="{{ asset('images/topic/badges/fake-news/Half-ture.png') }}" alt="Badge" class="absolute top-4 left-4 w-20 h-18">
                    @elseif($topic->fake_news_badge === 'misleadingContext')
                        <img src="{{ asset('images/topic/badges/fake-news/Misleading.png') }}" alt="Badge" class="absolute top-4 left-4 w-20 h-18">
                    @elseif($topic->fake_news_badge === 'unproven')
                        <img src="{{ asset('images/topic/badges/fake-news/Unproven.png') }}" alt="Badge" class="absolute top-4 left-4 w-20 h-18">
                    @else
                        <img src="{{ asset('images/topic/badges/fake-news/True.png') }}" alt="Badge" class="absolute top-4 left-4 w-20 h-18">
                    @endif
                @elseif($topic->type === 'akhbarMeterInMedia')
                    <img src="{{ asset('images/topic/badges/AkhbarMeter_in_Media.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'codeOfEthics')
                    <img src="{{ asset('images/topic/badges/Code_of_Ethics.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'explainer')
                    <img src="{{ asset('images/topic/badges/Explainer.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'factSheet')
                    <img src="{{ asset('images/topic/badges/Factsheet.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'mediaAnalysisReports')
                    <img src="{{ asset('images/topic/badges/Media_analysis_reports.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'other')
                    <img src="{{ asset('images/topic/badges/Other.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @elseif($topic->type === 'violations')
                    <img src="{{ asset('images/topic/badges/Violations.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @else
                    <img src="{{ asset('images/topic/badges/Workshop.png') }}" alt="Badge" class="absolute top-2 right-2 w-23 h-20">
                @endif
            </div>
        </a>
    </x-slot:image>
</x-card>
