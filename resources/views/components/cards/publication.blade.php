@props(['publication'])
<x-card :title="$publication->title" :time="$publication->created_at->diffForHumans()" :tags="$publication->tags"
        route="publications.index">
    <x-slot:image>
        <div
            class="w-full h-[266px] bg-[url('{{$publication->image ? Storage::url($publication->image) : asset('images/placeholders/article.png')}}')] bg-cover bg-center bg-no-repeat"></div>
    </x-slot:image>
    <x-slot:description>
        <div class="my-2 text-base leading-6 font-normal text-gray-500 align-self-stretch">
            {!! $publication->description !!}
        </div>
    </x-slot:description>
    <x-slot:extra>
        <div class="flex space-x-10 justify-between items-center">
            <div class="flex">
                @if($publication->author_avatar)
                    <img src="{{Storage::url($publication->author_avatar)}}" alt="{{$publication->author_name}} avatar"
                         class="rounded-circle w-12"/>
                @else
                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d52?d=mp"
                         alt="{{$publication->author_name}} avatar" class="rounded-circle w-12"/>
                @endif
            </div>
            <div class="flex container mx-0 items-left justify-between">
                <div>
                    <div class="flex flex-row text-sm leading-5 font-medium">
                        {{$publication->author_name}}
                    </div>
                    <div class="flex flex-row text-sm leading-5 font-normal text-gray-500">
                        {{$publication->created_at->format("F d, Y")}} . {{$publication->min_to_read}} {{translate('pages.topic.mins')}}
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <a href="{{Storage::url($publication->file)}}">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.54492 27.1992C5.54492 26.3156 6.26127 25.5992 7.14492 25.5992H26.3449C27.2286 25.5992 27.9449 26.3156 27.9449 27.1992C27.9449 28.0829 27.2286 28.7992 26.3449 28.7992H7.14492C6.26127 28.7992 5.54492 28.0829 5.54492 27.1992ZM10.8136 14.8678C11.4384 14.243 12.4515 14.243 13.0763 14.8678L15.1449 16.9365L15.1449 4.79922C15.1449 3.91556 15.8613 3.19922 16.7449 3.19922C17.6286 3.19922 18.3449 3.91556 18.3449 4.79922V16.9365L20.4136 14.8678C21.0384 14.243 22.0515 14.243 22.6763 14.8678C23.3011 15.4927 23.3011 16.5057 22.6763 17.1306L17.8763 21.9306C17.5762 22.2306 17.1693 22.3992 16.7449 22.3992C16.3206 22.3992 15.9136 22.2306 15.6136 21.9306L10.8136 17.1306C10.1887 16.5058 10.1887 15.4927 10.8136 14.8678Z"
                                  fill="#2563EB"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </x-slot:extra>
</x-card>
