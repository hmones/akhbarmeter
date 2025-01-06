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
    <div class="container mx-auto py-4">
        <div class="grid grid-cols-1 md:grid-cols-[70%,30%] gap-8 ">
            <div>
                <h1 class="text-4xl font-bold leading-tight">{{$topic->title}}</h1>
                @if($topic->sub_title)
                    <p class="pt-2 pb-2 font-bold leading-tight">{{ $topic->sub_title }}</p>
                @endif
                <span>{{ translate('pages.topic.publishedAt') }} : {{ $topic->published_at->format('d/m/Y') }}&nbsp; {{ translate('pages.topic.updatedAt') }}: {{ $topic->updated_at->format('d/m/Y') }}&nbsp;</span>
                <div class="text-lg text-gray-500 space-y-4 py-2">
                    {!! $topic->description !!}
                </div>
            </div>
            <div class="space-y-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">Requests to fact check</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                    <form action="#" method="POST" class="mt-4">
                        <div class="flex items-center gap-2">
                            <input
                                type="email"
                                name="email"
                                placeholder="Enter your Email"
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                required>
                            <button
                                type="submit"
                                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                                Notify Me
                            </button>
                        </div>
                    </form>
                    <p class="mt-2 text-xs text-gray-500">
                        Your data is in safe hands. Check out our <a href="#" class="text-blue-500 hover:underline">Privacy policy</a> for more info.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">LOREM IPSUM</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui arcu sodales ullamcorper mauris eget eleifend proin semper odio. Convallis sit imperdiet egestas at sed duis donec at amet.
                    </p>
                    <button
                        class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                        <span class="text-lg">📱</span> +20100xxxxxxx
                    </button>
                    <p class="mt-2 text-xs text-gray-500">
                        Your data is in safe hands. Check out our <a href="#" class="text-blue-500 hover:underline">Privacy policy</a> for more info.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">Request correction</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Fill in the information for article correction.
                    </p>
                    <form action="#" method="POST" class="mt-4 space-y-3">
                    <textarea
                        name="message"
                        placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                        rows="4" required></textarea>
                        <input
                            type="email"
                            name="email"
                            placeholder="Enter your Email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                        <button
                            type="submit"
                            class="w-full px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            Submit
                        </button>
                    </form>
                    <p class="mt-2 text-xs text-gray-500">
                        Your data is in safe hands. Check out our <a href="#" class="text-blue-500 hover:underline">Privacy policy</a> for more info.
                    </p>
                </div>
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
