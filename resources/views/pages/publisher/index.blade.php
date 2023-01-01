@extends('layouts.default')
@section('title', 'Articles')

@section('content')
    <div class="container max-h-full">
        <x-page-header headline="News Outlets" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

        <div class="container mb-10 space-y-10">
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($publishers as $publisher)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        <x-publisher.card :publisher="$publisher" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

