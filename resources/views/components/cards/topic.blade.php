@props(['topic'])

<x-card :title="$topic->title" :show="route('topics.show', $topic->id)" :tags="$topic->tags">
    <x-slot:image>
        <a href="{{route('topics.show', $topic->id)}}">
            <div  class="w-full h-[266px] bg-cover bg-center bg-no-repeat" style="background-image: url('{{$topic->image ? Storage::url($topic->image) : asset('images/placeholders/article.png')}}')"></div>
        </a>
    </x-slot:image>
</x-card>
