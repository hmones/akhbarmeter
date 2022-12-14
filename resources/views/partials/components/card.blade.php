<div class="rounded shadow-md h-full w-full">
    @yield('image')
    <div class="p-3">
        <div class="flex flex-col space-y-4">

                <div class="flex flex-col">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-row">
                            @yield('tags-icon')
                            @foreach(collect($tags ?? [])->take(3) as $tag)
                                <a href="{{route($route, ['tag' => $tag['value']])}}" class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                                    #{{data_get($tag, 'value')}}
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
                <div class="text-xl leading-7 font-semibold">{{$title}}</div>
            </div>
            @yield('description')
            @yield('extra')
        </div>
    </div>

</div>
