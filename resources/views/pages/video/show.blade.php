@extends('layouts.default')

@section('seo')
    <x-seo :title="$video->title" :description="$video->description" />
@endsection

@section('content')
    <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-5xl leading-10 font-extrabold tracking-tight">
                {{translate('pages.video.header')}}
            </h1>
        </div>
        <div class="flex-initial w-1/3 flex-col">
            <p class="text-lg text-center leading-6 font-normal text-gray-500">
                {{ $video->title }}
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <iframe class="w-full h-[60vh]" src="{{$video->url}}" title="{{$video->title}}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </iframe>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-center mx-auto space-y-10 my-16">
            {!! $video->description !!}
        </div>
    </div>
@endsection
