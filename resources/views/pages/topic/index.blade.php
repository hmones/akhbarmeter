@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.topics.header')" :description="translate('pages.topics.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.topics.header')" :description="translate('pages.topics.description')"/>
        <div class="container">
            <div class="flex flex-row mb-10 overflow-scroll h-fit" style="overflow-y:hidden">
                @if(request()->has('tag'))
                    <a href="{{route('topics.index')}}" class="flex flex-row mx-2 px-2 h-fit rounded-5 text-sm mt-1.5">
                        <i class="fa fa-close"></i>
                    </a>
                @endif
                @foreach($tags as $tag)
                    <div class="flex flex-col min-w-fit">
                        <a href="{{route('topics.index', compact('tag'))}}"
                           class="flex flex-row mx-1 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                            #{{$tag}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mb-10 space-y-10">
            @foreach($topics as $type => $topicsList)
                @if($topicsList->count() > 0)
                    <div class="font-extrabold">{{translate('pages.topics.' . $type)}}</div>
                @endif
                @foreach($topicsList->chunk(3) as $rowTopics)
                    <div
                            class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                        @foreach($rowTopics as $record)
                            <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                                <x-cards.topic :topic="$record" />
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endforeach
        </div>
        @if($paginationTopic)
            <div class="container my-20 space-y-10" dir="ltr">
                {{$topics[$paginationTopic]->appends(request()->except('page'))->links()}}
            </div>
        @endif
    </div>
@endsection
