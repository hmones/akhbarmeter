@props(['topic'])

<x-card :title="$topic->title" :time="$topic->created_at->diffForHumans()" :show="route('topics.show', $topic->id)" >
    <x-slot:image>
        <a href="{{route('topics.show', $topic->id)}}">
            <div  class="w-full h-[266px] bg-[url('{{Storage::url($topic->image)}}')] bg-cover bg-center bg-no-repeat"></div>
        </a>
    </x-slot:image>
    <x-slot:icon>
        <i class="fa fa-file-text-o fa-2x text-red-700 me-2" aria-hidden="true"></i>
    </x-slot:icon>
</x-card>
