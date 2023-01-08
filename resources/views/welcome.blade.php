@extends('layouts.default', ['isColoredNavigation' => true, 'isHomePage' => true])

@section('content')
    <x-home.sections.top :best="$best" :worst="$worst" :fakeNews="$fakeNews" :articles="$articles"/>

    <!-- Trending hashtags -->
    <section id="trends" class="border-b-2 border-solid border-gray-200">
        <div class="container py-4 flex flex-row overflow-hidden">
            @foreach($trendingHashtags as $hashtag)
                <a href="#" class="mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                    {{$hashtag}}
                </a>
            @endforeach
        </div>
    </section>

    <!-- Monthly Ranking -->
    <x-home.sections.rank :best="$best" :worst="$worst" :bestThree="$bestThree" :worstThree="$worstThree"/>

    <!-- Latest News Section -->
    <section id="latestNews">
        <x-page-header headline="Latest news"
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

        <div class="container mb-10 space-y-10">
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
    </section>

    @include('partials.check-news')

    <!-- Fake News section -->
    <section class="py-16">
        <x-page-header headline="Fake news!"
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
        <div class="container flex flex-col space-y-4">
            @foreach($fakeNews as $article)
                <x-cards.fake :article="$article"/>
            @endforeach
        </div>
        <div class="container flex flex-col">
            <x-view-all class="mt-16" href="{{route('articles.index')}}"/>
        </div>
    </section>


    <!--- The weekly summary Section -->
    <section class="py-16 bg-gray-50">
        <x-page-header headline="The weekly summary..."
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
        <div class="container">
            <iframe class="w-full h-[70vh]" src="{{$video->url}}" title="{{$video->title}}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>
        <x-view-all class="mt-16" href="{{route('videos.index')}}"/>
    </section>

    <!-- Latest Topics Section -->
    <section class="py-16">
        <x-page-header headline="Topics"
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
        <div class="container mb-10 space-y-10">
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($topics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        <x-cards.topic :topic="$record"/>
                    </div>
                @endforeach
            </div>
            <x-view-all href="{{route('topics.index')}}"/>
        </div>
    </section>

    <!-- Insights and Partners Section -->
    <section class="py-16">
        <x-page-header headline="Insights & Partners"
                       description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
        <div class="container">
            <div class="shadow-lg bg-white border-1 border-solid border-gray-200 py-8 px-8 lg:px-24 rounded-4">
                <div class="flex flex-row justify-between mx-auto text-center">
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            10
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">Publishers</div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            1000+
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">Topics</div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            19000+
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">Review</div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            3
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">Reviewers</div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:space-y-16 px-8 lg:px-24 py-16">
                <div class="flex flex-row justify-between items-center">
                    <img src="{{asset('images/partners/1.png')}}" class="w-20 lg:w-32" alt="Partner 1"/>
                    <img src="{{asset('images/partners/2.png')}}" class="w-20 lg:w-32" alt="Partner 2"/>
                    <img src="{{asset('images/partners/3.png')}}" class="w-20 lg:w-32" alt="Partner 3"/>
                </div>
                <div class="flex flex-row justify-between items-center">
                    <img src="{{asset('images/partners/4.png')}}" class="w-20 lg:w-32" alt="Partner 4"/>
                    <img src="{{asset('images/partners/5.png')}}" class="w-20 lg:w-32" alt="Partner 5"/>
                    <img src="{{asset('images/partners/6.png')}}" class="w-20 lg:w-32" alt="Partner 6"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Publications Section -->
    <x-page-header headline="Publications"
                   description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

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

    <!-- Testimonials Section -->
    <x-home.sections.testimonials/>

    <!-- Download Report Now Section -->
    <div class="bg-gray-50 p-10 lg:p-16">
        <div class="container flex flex-col space-y-6 lg:space-y-0 lg:flex-row justify-between items-center">
            <div class="flex flex-col text-xl text-center lg:text-4xl leading-10 font-extrabold">
                <div class="ltr:lg:text-left rtl:lg:text-right">
                    Ready to dive in?
                </div>
                <div class="text-blue-600 ltr:lg:text-left rtl:lg:text-right">
                    Download our news report today.
                </div>
            </div>
            <a href="#" class="text-white bg-blue-600 py-2 px-4 rounded hover:bg-blue-700">Download now</a>
        </div>
    </div>
    @include('partials.newsletter')
@endsection
