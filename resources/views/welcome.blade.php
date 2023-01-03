@extends('layouts.default')

@section('content')
    <!-- Latest News Section -->
    <x-page-header headline="Latest news" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
    <div class="container mb-10 space-y-10">
        <div
            class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
            @foreach($articles->chunk(3) as $rowArticles)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowArticles as $article)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            <x-cards.article :article="$article" showTotalScore="false"/>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <x-view-all href="{{route('articles.index')}}"/>
    </div>

    @include('partials.check-news')

    <!-- Latest Topics Section -->
    <x-page-header headline="Topics" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
    <div class="container mb-10 space-y-10">
        <div
            class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
            @foreach($topics as $record)
                <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                    <x-cards.topic :topic="$record" />
                </div>
            @endforeach
        </div>
        <x-view-all href="{{route('topics.index')}}"/>
    </div>

    <!-- Latest Publications Section -->
    <x-page-header headline="Publications" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

    <div class="container mb-10 space-y-10">
        @foreach($publications->chunk(3) as $rowPublications)
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                @foreach($rowPublications as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        <x-cards.publication :publication="$record"/>
                    </div>
                @endforeach
            </div>
        @endforeach
        <x-view-all href="{{route('publications.index')}}"/>
    </div>
    @include('partials.newsletter')
@endsection
