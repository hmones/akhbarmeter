@props(['article'])

<div class="flex flex-col lg:flex-row justify-center w-full px-2">
    <div class="flex flex-col rounded-t-lg lg:rounded-none lg:ltr:rounded-l-lg rtl:lg:rounded-r-lg lg:w-1/3 bg-cover items-center justify-center h-[260px] lg:w-[470px]"
         style="background-image: url('{{$article?->image ? Storage::url($article->image) : asset('images/placeholders/article.png')}}')"
    >
        <img src="{{asset('images/icons/fake.svg')}}" alt="Fake article icon">
    </div>
    <div class="flex flex-col rounded-b-lg lg:rounded-none lg:ltr:rounded-r-lg lg:rtl:rounded-l-lg p-8 space-y-4 bg-gray-50 justify-content-start w-full">
        <div class="flex flex-row overflow-hidden items-center justify-between">
            <div class="flex flex-row">
                @foreach(collect($article?->tags)->take(3) ?? [] as $tag)
                    <a href="#"
                       class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                        @if(is_array($tag))
                            #{{data_get($tag, 'value', '')}}
                        @endif
                        @if($tag instanceof string)
                            #{{$tag}}
                        @endif
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
        <a href="{{route('topics.show', $article)}}" class="text-xl leading-7 font-semibold text-gray-700">
            {{$article?->title}}
        </a>
        <div class="hidden lg:flex text-base leading-6 font-normal text-gray-700">
            {{str($article?->description)->stripTags()->limit(250)}}
        </div>
    </div>
</div>
