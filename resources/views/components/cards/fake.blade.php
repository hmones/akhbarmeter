@props(['article'])

<div class="flex flex-col lg:flex-row justify-center w-full">
    <div class="flex flex-col rounded-t-lg lg:rounded-none lg:ltr:rounded-l-lg rtl:lg:rounded-r-lg lg:w-1/3 bg-[url('{{$article?->image ? Storage::url($article->image) : asset('images/placeholders/article.png')}}')] bg-cover items-center justify-center h-[260px] lg:w-[470px]">
        <img src="{{asset('images/icons/fake.svg')}}" alt="Fake article icon">
    </div>
    <div class="flex flex-col rounded-b-lg lg:rounded-none lg:ltr:rounded-r-lg lg:rtl:rounded-l-lg p-8 space-y-4 bg-gray-50 justify-content-start w-full">
        <div class="flex flex-row overflow-hidden items-center justify-between">
            <div class="flex flex-row">
                <img class="w-[32px] rounded-circle"
                     src="{{$article?->publisher?->image ? Storage::url($article->publisher->image) : asset('images/placeholders/publisher.png')}}"
                     alt="{{$article?->title}}">
                @foreach(collect(array_filter(preg_split('/[#\s]/', $article?->publisher?->hashtags)))->take(3) ?? [] as $tag)
                    <a href="#"
                       class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                        #{{data_get($tag, 'value', $tag)}}
                    </a>
                @endforeach
            </div>
            <div class="flex flex-row space-x-1.5 text-gray-400 rtl:space-x-reverse">
                <div class="flex flex-row h-fit pt-1">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                </div>
                <div class="flex flex-row h-fit">
                    {{$article?->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
        <a href="{{route('articles.show', $article)}}" class="text-xl leading-7 font-semibold text-gray-700">
            {{$article?->title}}
        </a>
        <div class="hidden lg:flex text-base leading-6 font-normal text-gray-700">
            {{str($article?->content)->stripTags()->limit(150)}}
        </div>
    </div>
</div>
