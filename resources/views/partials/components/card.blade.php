<div class="rounded shadow-md h-full w-full">
    <iframe class="w-full" height="266" src="https://www.youtube.com/embed/lJIrF4YjHfQ" title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
    <div class="p-3">
        <div class="flex flex-col space-y-2">
            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row">
                        <i class="fa fa-youtube-play fa-2x text-red-700 me-2" aria-hidden="true"></i>
                        @foreach(collect($record->tags)->take(3) as $tag)
                            <a href="{{route($route, ['tag' => $tag])}}" class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                                #{{$tag}}
                            </a>
                        @endforeach
                    </div>
                    <div class="flex flex-row space-x-1.5 text-gray-400">
                        <div class="flex flex-row h-fit pt-1">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="flex flex-row h-fit">
                            {{$time}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                {{$title}}
            </div>
        </div>
    </div>

</div>
