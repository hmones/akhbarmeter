@extends('layouts.default')

@section('seo')
    @php($image = $topic->image ? Storage::url($topic->image) : '')
    <x-seo :title="$topic->title" :description="str(strip_tags($topic->description))->limit(250)" :keywords="str($topic->title)->replace(' ', ' , ')" :image="$image"/>
@endsection

@section('content')
    <style>
        #topic_content a{
            color: rgb(37, 99, 235);
        }
        #topic_content a:hover{
            color: gray;
        }
    </style>
    <div style="background: linear-gradient(to right,#6dd5ed,#1850eb);">
        <div class="container mx-auto flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16 text-white">
            <div class="flex flex-col">
                <h1 class="text-3xl md:text-5xl leading-relaxed text-center font-extrabold tracking-tight">{{$topic->title}}</h1>
            </div>
            <div class="flex flex-col md:flex-row w-4/5 text-lg text-center leading-6 font-normal mx-auto justify-center space-x-1.5 rtl:space-x-reverse">
                <div class="flex flex-row justify-center">
                    <span>{{$topic->published_at->format('d/m/Y')}}&nbsp;</span>
                    <span class="hidden md:flex"> | </span></div>
                <div class="flex flex-row items-center justify-center space-x-1.5 rtl:space-x-reverse mx-auto">
                    <em class="fa fa-clock-o"></em>
                    <span> 5 {{translate('pages.topic.mins')}}</span>
                    <span class="hidden md:flex"> |</span>
                </div>
                <div class="flex flex-row justify-center">
                    <span> {{translate('pages.topic.author')}}: {{$topic->author_name}}&nbsp;</span>
                    <span class="hidden md:flex"> |</span>
                </div>
                <div> {{translate('pages.topic.category')}}: {{translate('pages.topics.' . $topic->type)}} </div>
            </div>
        </div>
    </div>

    <div class="container max-w-4xl mx-auto px-4 py-10">
        <div class="flex gap-4">
        <!-- Left Column (Text and Description with Rich Text Content) -->
            <div class="flex-1">
                <h1 class="text-4xl font-bold leading-tight">{{$topic->title}}</h1>
                <div class="text-lg text-gray-500">
                    {!! $topic->description !!}
                </div>
            </div>

            <div class="flex-5 bg-white shadow-xl p-8 rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Requests to fact check</h2>
                <p class="text-sm text-gray-500 mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <form action="#" method="POST">
                    <input
                        type="email"
                        class="w-full p-3 border border-gray-300 rounded-md mb-4"
                        placeholder="Enter your Email"
                        required
                    >
                    <button
                        type="submit"
                        class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600"
                    >
                        Notify Me
                    </button>
                </form>
                <p class="text-xs text-gray-400 mt-4">
                    Your data is in the safe hands. Check out our <a href="#" class="text-blue-600">Privacy policy</a> for more info.
                </p>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-center mx-auto space-y-4">
            <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16">
                <div class="flex flex-col">
                    <div class="text-4xl leading-10 font-extrabold tracking-tight">
                        {{translate('pages.topic.related.header')}}
                    </div>
                </div>
                <div class="flex-initial w-4/5 flex-col">
                    <p class="text-lg text-center leading-6 font-normal text-gray-500">
                        {{translate('pages.topic.related.description')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mb-10 space-y-10">
        @foreach($related->chunk(3) as $rowTopics)
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($rowTopics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                        <x-cards.topic :topic="$record" />
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    @include('partials.newsletter')
@endsection
