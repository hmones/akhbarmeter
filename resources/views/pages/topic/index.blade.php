@extends('layouts.default')
@section('title', 'Topics')
@section('content')
    <div class="container max-h-full">
        <x-page-header :headline="translate('pages.topics.header')" :description="translate('pages.topics.description')"/>

        <div class="container">
            <div class="flex flex-row mb-10">
                @if(request()->has('tag'))
                    <a href="{{route('topics.index')}}" class="flex flex-row mx-2 px-2 h-fit rounded-5 text-sm mt-1.5">
                        <i class="fa fa-close"></i>
                    </a>
                @endif
                @foreach($topics as $topicsList)
                    @foreach($topicsList->pluck('tags')->flatten()->take(18) as $tag)
                        <a href="{{route('topics.index', compact('tag'))}}"
                           class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                            #{{$tag}}
                        </a>
                    @endforeach
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
                            <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                                <x-cards.topic :topic="$record" />
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endforeach
        </div>
        @if($paginationTopic)
            <div class="container my-20 space-y-10" dir="ltr">
                {{$topics[$paginationTopic]->links()}}
            </div>
        @endif
    </div>
@endsection
