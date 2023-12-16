@props(['topic'])

<x-card :title="$topic->title" :time="$topic->created_at->diffForHumans()" :show="route('topics.show', $topic->id)" >
    <x-slot:image>
        <a href="{{route('topics.show', $topic->id)}}">
            <div  class="w-full h-[266px] bg-cover bg-center bg-no-repeat" style="background-image: url('{{$topic->image ? Storage::url($topic->image) : asset('images/placeholders/article.png')}}')"></div>
        </a>
    </x-slot:image>
    <x-slot:icon>
        <i class="fa fa-file-text-o fa-2x text-red-700 me-2" aria-hidden="true"></i>
    </x-slot:icon>
</x-card>
