@extends('layouts.default')
@section('title', 'Articles')

@section('content')
    <div class="container max-h-full">
        <x-page-header headline="News Outlets" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
        <div class="container mb-10 space-y-6">
            @foreach($publishers->chunk(3) as $rowPublishers)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowPublishers as $publisher)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            <div class="w-full">
                                <x-publisher.card :publisher="$publisher" />
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection

