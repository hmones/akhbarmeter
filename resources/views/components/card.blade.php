@props([
        'image',
        'icon' => null,
        'time' => now()->diffForHumans(),
        'show' => null,
        'title' => '',
        'tags' => [],
        'route' => route('home'),
        'description' => null,
        'extra' => null,
        'footer' => null
    ])

<div class="rounded shadow-md h-full w-full">
    {{$image}}
    <div class="p-3">
        <div class="flex flex-col space-y-4">
            <div class="flex flex-col">
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-row overflow-hidden items-center">
                        {{$icon}}
                        @foreach(collect($tags)->take(3) as $tag)
                            <a href="{{route('tags.index', ['name' => data_get($tag, 'name')])}}"
                               class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                                #{{ data_get($tag, 'name') }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-xl leading-7 font-semibold">
                    @if($show)
                        <a href="{{$show}}">
                            {{ $title }}
                        </a>
                    @else
                        {{ $title }}
                    @endif
                </div>
            </div>
            {{$description}}
            {{$extra}}
        </div>
    </div>
    {{$footer}}
</div>
