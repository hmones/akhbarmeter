@extends('layouts.default')
@section('title', 'Videos')
@section('content')
    <div class="container max-h-full">
        <x-page-header headline="Videos"
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

        <div class="container mb-10 space-y-10">
            @foreach($videos->chunk(3) as $rowVideos)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowVideos as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            <x-cards.video :video="$record"/>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="container my-20 space-y-10" dir="ltr">
            {{$videos->links()}}
        </div>
    </div>
@endsection
