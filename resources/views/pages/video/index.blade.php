@extends('layouts.default')
@section('title')
    Videos
@endsection
@section('content')
    <div class="container max-h-full">
        <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
            <div class="flex flex-col">
                <h1 class="text-5xl leading-10 font-extrabold tracking-tight">Videos</h1>
            </div>
            <div class="flex-initial w-1/3 flex-col">
                <p class="text-lg text-center leading-6 font-normal text-gray-500">
                    Simple text saying what the user should excpect by clicking on any of the news outlets.
                </p>
            </div>
        </div>

        <div class="container mb-10 space-y-10">
            @foreach($videos->chunk(3) as $rowVideos)
                <div class="flex flex-row w-full items-start items-stretch justify-center mx-auto">
                    @foreach($rowVideos as $record)
                        <div class="flex flex-row w-full md:w-1/3 mx-2">
                            @include('partials.components.card', compact('record'))
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="container my-20 space-y-10">
            {{$videos->links()}}
        </div>
    </div>
@endsection
