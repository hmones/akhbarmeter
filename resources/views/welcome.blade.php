@extends('layouts.default', ['isColoredNavigation' => true])

@section('seo')
    <x-seo />
@endsection

@section('content')
    <x-home.sections.new-top :fakeNews="$fakeNews" :articles="$articles"/>

    <!-- Trending hashtags -->
    <section id="trends" class="border-b-2 border-solid border-gray-200">
        <div class="container mx-auto py-4 flex flex-row overflow-x-scroll" style="overflow-y:hidden">
            @foreach($trendingHashtags as $tag)
                <div class="flex flex-col min-w-fit">
                    <a href="{{route('topics.index', compact('tag'))}}" class="mx-2 px-2 py-1 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                        #{{$tag}}
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Fake News section -->
    <section>
        <x-page-header :headline="translate('pages.home.fake.header')"
                       :description="translate('pages.home.fake.description')"/>
        <div class="container mx-auto flex flex-col space-y-4">
            @foreach($fakeNews as $article)
                <x-cards.fake :article="$article"/>
            @endforeach
        </div>
        <div class="container mx-auto flex flex-col">
            <x-view-all class="mt-16" href="{{route('fake.news')}}"/>
        </div>
    </section>

    <!--- The weekly summary Section -->
    <section class="py-5 bg-gray-50">
        <x-page-header :headline="translate('pages.home.video.header')"
                       :description="translate('pages.home.video.description')"/>
        <div class="container mx-auto">
            <iframe class="w-full h-[70vh]" src="{{$video?->url}}" title="{{$video?->title}}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen loading="lazy">
            </iframe>
        </div>
        <x-view-all class="mt-16" href="{{route('videos.index')}}"/>
    </section>

    <!-- Latest Topics Section -->
    <section class="py-5">
        <x-page-header :headline="translate('pages.topics.header')"
                       :description="translate('pages.topics.description')"/>
        <div class="container mx-auto mb-10 space-y-10">
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($topics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                        <x-cards.topic :topic="$record"/>
                    </div>
                @endforeach
            </div>
            <x-view-all href="{{route('topics.index')}}"/>
        </div>
    </section>

    <!-- Monthly Ranking -->
    @if(!empty($best) && !empty($worst) && !empty($bestThree) && !empty($worstThree))
        <x-home.sections.rank :best="$best" :worst="$worst" :bestThree="$bestThree" :worstThree="$worstThree"/>
    @endif


    <!-- Latest News Section -->
    <section id="latestNews">
        <x-page-header :headline="translate('pages.home.news.header')"
                       :description="translate('pages.home.news.description')"/>

        <div class="container mx-auto mb-10 space-y-10">
            @foreach($articles->chunk(3) as $rowArticles)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowArticles as $article)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                            <x-cards.article :article="$article" showTotalScore="false"/>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <x-view-all href="{{route('articles.index')}}"/>
    </section>

    @include('partials.check-news')

    <!-- Latest Publications Section -->
    <x-page-header :headline="translate('pages.home.publications.header')"
                   :description="translate('pages.home.publications.description')"/>

    <div class="container mx-auto mb-10 space-y-10">
        @foreach($publications->chunk(3) as $rowPublications)
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                @foreach($rowPublications as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-0 px-2">
                        <x-cards.publication :publication="$record"/>
                    </div>
                @endforeach
            </div>
        @endforeach
        <x-view-all href="{{route('publications.index')}}"/>
    </div>

    <!-- Testimonials Section -->
    <x-home.sections.testimonials/>

    <!-- Insights and Partners Section -->
    <section class="py-5">
        <x-page-header :headline="translate('pages.home.insights.header')"
                       :description="translate('pages.home.insights.description')"/>
        <div class="container mx-auto">
            <div class="shadow-lg bg-white border-1 border-solid border-gray-200 py-8 px-8 lg:px-24 rounded-4">
                <div class="flex flex-row justify-between mx-auto text-center">
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            10
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">
                            {{translate('pages.home.insights.publishers')}}
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            1000+
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">
                            {{translate('pages.home.insights.topics')}}
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            20k+
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">
                            {{translate('pages.home.insights.review')}}
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div
                            class="text-xl leading-7 font-bold lg:text-5xl lg:leading-none lg:font-extrabold text-blue-500">
                            3
                        </div>
                        <div class="text-sm lg:text-lg leading-6 font-medium text-gray-400">
                            {{translate('pages.home.insights.employees')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:space-y-16 px-8 lg:px-24 py-5">
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
                <div class="flex flex-row justify-between items-center">
                    <img src="{{asset('images/partners/7.png')}}" class="w-20 lg:w-32" alt="Partner 8"/>
                    <img src="{{asset('images/partners/AFCN_Logo.png')}}" class="w-20 lg:w-32" alt="Partner 7"/>
                    <img src="{{asset('images/partners/IFCN.png')}}" class="w-20 lg:w-32" alt="Partner 9"/>
                </div>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
