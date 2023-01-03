@extends('layouts.default')
@section('content')
    <div style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{Storage::url($article->image)}}'); background-position: center; background-size: cover;">
        <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16 text-white">
            <div class="flex flex-col">
                <div class="flex flex-row items-center space-x-3">
                    <img src="{{Storage::url($article->publisher->image)}}" alt="{{$article->publisher->name}}" class="h-[52px] rounded"/>
                    <div class="flex flex-col space-y-1">
                        <span class="text-xs leading-4 font-semibold">No. {{$article->publisher->scores()->where('period', 'week')->orderBy('created_at', 'desc')->first()?->rank ?? 1}}</span>
                        <div class="flex flex-row">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19 10.5V10.5C19 15.471 14.971 19.5 10 19.5V19.5C5.029 19.5 1 15.471 1 10.5V10.5C1 5.529 5.029 1.5 10 1.5V1.5C14.971 1.5 19 5.529 19 10.5Z" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 6.5V14.5" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 9.5L10 6.5L13 9.5" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-green-500 text-xl leading-7 font-semibold">
                                {{$article->publisher->scores()->where('period', 'week')->orderBy('created_at', 'desc')->first()?->score ?? 38}}%
                            </span>
                        </div>
                        <span class="text-xs leading-4 font-normal">Accuracy Rank</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="text-base lg:text-3xl leading-9 font-bold text-center">{{$article->title}}</h1>
            </div>
            <div class="hidden lg:flex flex-initial w-4/5 flex-col">
                <p class="text-center text-base leading-6 font-medium">
                    {{$article->created_at->format('F d, Y')}}
                    | Article Author: {{$article->author_name}}
                    | Reviewed by: {{$article->user?->name}}
                    @if($article->topic)
                        | Category: {{$article->topic->title}}
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-col lg:flex-row justify-center mx-auto my-16">
            <!-- Content -->
            <div class="lg:w-2/3 flex flex-col space-y-4">
                <!-- Article Content -->
                <div class="px-3 lg:px-0 mb-5">
                    {!! $article->content !!}
                </div>
                <!-- Reviewers Comments -->
                @if(!empty($article->review->comment))
                    <div class="flex flex-col bg-gray-50 px-4 rounded-lg">
                        <div class="text-center text-base leading-6 font-medium py-4 border-b-2 border-solid border-gray-200">
                            Reviewer's Comment
                        </div>
                        <div class="py-4 text-gray-700">
                            {{$article->review->comment}}
                        </div>
                        <div class="text-center text-base leading-6 font-medium pb-4 border-b-2 border-solid border-gray-200">
                            Journalist's Comment
                        </div>
                        <div class="py-4 text-gray-700">
                            {{$article->review->comment_external ?? 'No Comment'}}
                        </div>
                    </div>
                @endif
                <!-- Question Answers -->
                <div class="flex flex-col bg-gray-50 px-4 rounded-lg pb-4">
                    <div class="text-center text-base leading-6 font-medium py-4">
                        Our detailed review
                    </div>
                    <div class="flex flex-row justify-center mx-auto pt-4 pb-8 text-xs space-x-8">
                        <button id="profButton" class="cursor-pointer bg-blue-600 text-white shadow-md rounded-lg px-4 py-2">Professionalism</button>
                        <button id="credButton" class="cursor-pointer bg-white shadow-md rounded-lg px-4 py-2">Credibility</button>
                        <button id="hrButton" class="cursor-pointer bg-white shadow-md rounded-lg px-4 py-2">Human Rights</button>
                    </div>
                    <div id="profQuestions">
                        @forelse($article->getResponsesByCategory(\App\Models\Question::PROFESSIONALISM_WEIGHT) as $response)
                            <x-review-question :response="$response" />
                        @empty
                            <div class="py-4 text-sm text-center">No questions in this category</div>
                        @endforelse
                    </div>
                    <div id="credQuestions" style="display: none">
                        @forelse($article->getResponsesByCategory(\App\Models\Question::CREDIBILITY_WEIGHT) as $response)
                            <x-review-question :response="$response" />
                        @empty
                            <div class="py-4 text-sm text-center">No questions in this category</div>
                        @endforelse
                    </div>
                    <div id="hrQuestions" style="display: none">
                        @forelse($article->getResponsesByCategory(\App\Models\Question::HUMAN_RIGHTS_WEIGHT) as $response)
                            <x-review-question :response="$response" />
                        @empty
                            <div class="py-4 text-sm text-center">No questions in this category</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="flex flex-col lg:w-1/3 px-8 space-y-10 mt-0">
                <div class="flex flex-col bg-gray-50 px-3 py-4 space-y-4 text-base leading-6 font-medium">
                    <div>Resource links</div>
                    <div class="text-gray-700">
                        The article was copied from <a class="text-blue-700" href="{{$article->publisher->url}}">{{$article->publisher->name}}</a> {{$article->fetched_at}}  <a class="text-blue-700" href="{{$article->url}}">View original article</a>
                    </div>
                </div>
                <x-cards.article-footer :article="$article" />
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
            var buttons = ['#profButton', '#credButton', '#hrButton']
            var tabs = ['#profQuestions', '#credQuestions', '#hrQuestions']
            var selectedButton = buttons[tabIndex]
            var selectedTab = tabs[tabIndex]
            buttons.splice(tabIndex, 1)
            tabs.splice(tabIndex, 1)
            $(selectedButton).removeClass('bg-white bg-blue-600 text-white').addClass('bg-blue-600 text-white')
            $(selectedTab).show()
            buttons.forEach(value => $(value).removeClass('bg-white bg-blue-600 text-white').addClass('bg-white'))
            tabs.forEach(value => $(value).hide())
        }
    </script>
@endsection
