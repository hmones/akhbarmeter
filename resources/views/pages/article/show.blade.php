@extends('layouts.default')
@section('content')
    <div style="background: linear-gradient(to right,#6dd5ed,#1850eb);">
        <div class="container mx-auto flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16 text-white">
            <div class="flex flex-col">
                <div class="flex flex-row items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{empty($article->publisher->image) ? asset("images/placeholders/publisher.png") : Storage::url($article->publisher->image)}}" alt="{{$article->publisher->name}}" class="h-[52px] rounded"/>
                    <div class="flex flex-col space-y-1">
                        <div class="flex flex-row items-center space-x-1.5 rtl:space-x-reverse">
                            <span class="text-white text-xl leading-7 font-semibold rounded-2 bg-{{getColorForScore($article->review->score)}} px-2 py-1">
                                {{$article->review->score ?? 100}}%
                            </span>
                        </div>
                        <span class="text-xs leading-4 font-normal">{{translate('components.home.rank.hint')}}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="text-base lg:text-3xl leading-9 font-bold text-center">{{$article->title}}</h1>
            </div>
            <div class="hidden lg:flex flex-row w-4/5 text-lg text-center leading-6 font-normal mx-auto justify-center space-x-1.5 rtl:space-x-reverse">
                <span>{{$article->created_at->format('F d, Y')}} |
                    @if(!empty($article->author))
                        <span> {{translate('pages.article.author')}}: {{$article->author}} </span>
                    @endif
                    @if(!empty($article->user?->name))
                        <span>| {{translate('pages.article.reviewed')}}: {{$article->user?->name}} </span>
                    @endif
                    @if(!empty($article->topic?->title))
                        <span>| {{translate('pages.article.category')}}: {{$article->topic?->title}} </span>
                    @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row justify-center mx-auto my-16">
            <!-- Content -->
            <div class="lg:w-2/3 flex flex-col space-y-4">
                <!-- Article Content -->
                <div class="px-3 lg:px-0 mb-5">
                    <img src="{{Storage::url($article->image)}}" alt="{{$article->title}}" class="max-h-[400px] rounded float-left" />
                    {!! $article->content !!}
                </div>
                <!-- Reviewers Comments -->
                @if(!empty($article->review->comment))
                    <div class="flex flex-col bg-gray-50 px-4 rounded-lg">
                        <div class="text-center text-base leading-6 font-medium py-4 border-b-2 border-solid border-gray-200">
                            {{translate('pages.article.comment.reviewer')}}
                        </div>
                        <div class="py-4 text-gray-700">
                            {!! $article->review->comment !!}
                        </div>
                        <div class="text-center text-base leading-6 font-medium pb-4 border-b-2 border-solid border-gray-200">
                            {{translate('pages.article.comment.journalist')}}
                        </div>
                        <div class="py-4 text-gray-700">
                            {{$article->review->comment_external ?? 'No Comment'}}
                        </div>
                    </div>
                @endif
                <!-- Question Answers -->
                <div class="flex flex-col bg-gray-50 px-4 rounded-lg pb-4">
                    <div class="text-center text-base leading-6 font-medium py-4">
                        {{translate('pages.article.details.header')}}
                    </div>
                    <div class="flex flex-row justify-center mx-auto pt-4 pb-8 text-xs space-x-8 rtl:space-x-reverse">
                        <button id="profButton" class="cursor-pointer bg-blue-600 text-white shadow-md rounded-lg px-4 py-2">
                            {{translate('general.professionalism')}}
                        </button>
                        <button id="credButton" class="cursor-pointer bg-white shadow-md rounded-lg px-4 py-2">
                            {{translate('general.credibility')}}
                        </button>
                        <button id="hrButton" class="cursor-pointer bg-white shadow-md rounded-lg px-4 py-2">
                            {{translate('general.human-rights')}}
                        </button>
                    </div>
                    <div id="evaluation">
                        <div id="profQuestions">
                            @forelse($article->getResponsesByCategory(\App\Models\Question::PROFESSIONALISM_WEIGHT) as $response)
                                <x-review-question :response="$response" />
                            @empty
                                <div class="py-4 text-sm text-center">{{translate('pages.article.details.nothing')}}</div>
                            @endforelse
                        </div>
                        <div id="credQuestions" style="display: none">
                            @forelse($article->getResponsesByCategory(\App\Models\Question::CREDIBILITY_WEIGHT) as $response)
                                <x-review-question :response="$response" />
                            @empty
                                <div class="py-4 text-sm text-center">{{translate('pages.article.details.nothing')}}</div>
                            @endforelse
                        </div>
                        <div id="hrQuestions" style="display: none">
                            @forelse($article->getResponsesByCategory(\App\Models\Question::HUMAN_RIGHTS_WEIGHT) as $response)
                                <x-review-question :response="$response" />
                            @empty
                                <div class="py-4 text-sm text-center">{{translate('pages.article.details.nothing')}}</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="flex flex-col lg:w-1/3 px-8 space-y-10 mt-0">
                <div class="flex flex-col bg-gray-50 px-3 py-4 space-y-4 text-base leading-6 font-medium">
                    <div>{{translate('pages.article.side.header')}}</div>
                    <div class="text-gray-700">
                        {{translate('pages.article.side.description')}}
                        <a class="text-blue-700" href="{{$article->publisher->url}}">{{$article->publisher->name}}</a>
                        {{$article->fetched_at}}
                        <a class="text-blue-700" href="{{$article->url}}">{{translate('pages.article.side.link')}}</a>
                    </div>
                </div>
                <x-cards.article-footer :article="$article" showTotalScore="false" />
            </div>
        </div>
    </div>

    @include('partials.newsletter')
    <script>
        $('#profButton').on('click', function () {
            toggleTabs(0)
        })
        $('#credButton').on('click', function () {
            toggleTabs(1)
        })
        $('#hrButton').on('click', function () {
            toggleTabs(2)
        })
        function toggleTabs(tabIndex) {
            const buttons = ['#profButton', '#credButton', '#hrButton'];
            const tabs = ['#profQuestions', '#credQuestions', '#hrQuestions'];
            const selectedButton = buttons[tabIndex];
            const selectedTab = tabs[tabIndex];
            buttons.splice(tabIndex, 1)
            tabs.splice(tabIndex, 1)
            $(selectedButton).removeClass('bg-white bg-blue-600 text-white').addClass('bg-blue-600 text-white')
            $(selectedTab).show()
            buttons.forEach(value => $(value).removeClass('bg-white bg-blue-600 text-white').addClass('bg-white'))
            tabs.forEach(value => $(value).hide())
        }
    </script>
@endsection
