@props(['video'])

<x-card :title="$video->title" :time="$video->created_at->diffForHumans()" :show="route('videos.show', $video->id)" :tags="$video->tags" route="videos.index">
    <x-slot:image>
        <iframe class="w-full" height="266" src="{{$video->url}}" title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen loading="lazy">
        </iframe>
    </x-slot:image>
    <x-slot:icon>
        <i class="fa fa-youtube-play fa-2x text-red-700 me-2" aria-hidden="true"></i>
    </x-slot:icon>
</x-card>
