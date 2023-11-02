@extends('layouts.default')
@section('content')
    <div style="background: linear-gradient(to right,#6dd5ed,#1850eb);">
        <div class="container mx-auto flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16 text-white">
            <div class="flex flex-col">
                <h1 class="text-3xl md:text-5xl leading-relaxed text-center font-extrabold tracking-tight">{{$topic->title}}</h1>
            </div>
            <div class="flex flex-col md:flex-row w-4/5 text-lg text-center leading-6 font-normal mx-auto justify-center space-x-1.5 rtl:space-x-reverse">
                <div class="flex flex-row justify-center">
                    <span>{{$topic->created_at->format('d/m/Y')}}&nbsp;</span>
                    <span class="hidden md:flex"> | </span></div>
                <div class="flex flex-row items-center justify-center space-x-1.5 rtl:space-x-reverse mx-auto">
                    <em class="fa fa-clock-o"></em>
                    <span> 5 {{translate('pages.topic.mins')}}</span>
                    <span class="hidden md:flex"> |</span>
                </div>
                <div class="flex flex-row justify-center">
                    <span> {{translate('pages.topic.author')}}: {{$topic->author_name}}&nbsp;</span>
                    <span class="hidden md:flex"> |</span>
                </div>
                <div> {{translate('pages.topic.category')}}: {{translate('pages.topics.' . $topic->type)}} </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-center mx-auto space-y-10 my-16">
            <div>
                @if($topic->image)
                    <img src="{{Storage::url($topic->image)}}" alt="{{$topic->title}}" class="rounded w-full lg:w-1/3 float-left mb-8 lg:mr-4" />
                @endif
                <div>
                    {!! $topic->description !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-center mx-auto space-y-4">
            <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16">
                <div class="flex flex-col">
                    <div class="text-4xl leading-10 font-extrabold tracking-tight">
                        {{translate('pages.topic.related.header')}}
                    </div>
                </div>
                <div class="flex-initial w-4/5 flex-col">
                    <p class="text-lg text-center leading-6 font-normal text-gray-500">
                        {{translate('pages.topic.related.description')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mb-10 space-y-10">
        @foreach($related->chunk(3) as $rowTopics)
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($rowTopics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        <x-cards.topic :topic="$record" />
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    @include('partials.newsletter')
@endsection
