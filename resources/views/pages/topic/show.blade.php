@extends('layouts.default')

@section('seo')
    @php($image = data_get($topic, 'image') ? Storage::url(data_get($topic, 'image')) : '')
    <x-seo :title="data_get($topic, 'title')" :description="str(strip_tags(data_get($topic, 'description')))->limit(250)" :keywords="str(data_get($topic, 'title'))->replace(' ', ' , ')" :image="$image"/>
@endsection

@section('content')
    <style>
        #topic_content a{
            color: rgb(37, 99, 235);
        }
        #topic_content a:hover{
            color: gray;
        }
        .greyContent {
            background-color: #D3D3D3;
        }
        .blueColour {
            color: #1d4ed8;
        }
    </style>
    <div class="container mx-auto py-4 px-4">
        <div class="grid grid-cols-1 md:grid-cols-[70%,30%] gap-8 ">
            <div>
                <div class="relative w-full h-[250px] overflow-hidden">
                    <img src="{{ Storage::url(data_get($topic, 'image')) }}" alt="Property Image" class="object-center object-cover w-full h-full filter blur-sm">
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-4xl font-bold leading-tight p-4">{{ data_get($topic, 'title') }}</h1>
                        @if(data_get($topic, 'sub_title'))
                            <p class="text-lg p-4 leading-6 font-normal">{{ data_get($topic, 'sub_title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap justify-between items-center mt-5">
                    <span class="text-gray-500">{{ translate('pages.topic.publishedAt') }} : {{ data_get($topic, 'published_at')?->format('d/m/Y') }}&nbsp; {{ translate('pages.topic.updatedAt') }}: {{ data_get($topic, 'updated_at')?->format('d/m/Y H:m:s') }}&nbsp; {{ translate('pages.topic.topicType') }}: {{ translate("pages.topics.type." . data_get($topic, 'type')) }}&nbsp;</span>
                    <div class="flex flex-wrap gap-4 justify-end text-right">
                        @include('partials.social-media')
                    </div>
                </div>
                @if(data_get($topic, 'brief_description_summary'))
                    <div class="greyContent pl-4 pr-4 mt-4 rounded-md shadow">
                        <div class="p-4">
                            {!! data_get($topic, 'brief_description_summary') !!}
                        </div>
                    </div>
                @endif
                <div class="text-lg space-y-4 pt-2 pb-6 editor-content">
                    <style>
                        .editor-content a {
                            color: #1d4ed8;
                            text-decoration: underline;
                        }
                        p[style*="text-align:center"] img {
                            display: block;
                            margin: 0 auto;
                        }
                    </style>
                    {!! data_get($topic, 'description') !!}
                </div>
                @if(data_get($topic, 'legal_statement'))
                    <div class="greyContent p-4 rounded-md shadow mb-3">
                        <h3 class="mb-5">{{ translate('pages.topic.legalStatement') }}</h3>
                        <p class="text-[#000000]">
                            {!! data_get($topic, 'legal_statement') !!}
                        </p>
                    </div>
                @endif
                @if(data_get($topic, 'claim_reference'))
                    <div class="space-y-4 py-2">
                        <h3 class="text-lg font-bold">{{ translate('pages.topic.checkResource') }}</h3>
                        <div class="flex space-x-4 flex-wrap">
                            @foreach(data_get($topic, 'claim_reference') as $reference)
                                <a href="{{ data_get($reference, 'url') }}" target="_blank" class="p-2">
                                    <div class="flex items-center justify-center p-2 border rounded-md cursor-pointer max-w-xs">
                                        <span class="text-gray-700 font-medium">{{ data_get($reference, 'name') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(data_get($topic, 'fact_check_reference'))
                    <div class="space-y-4 mt-5">
                        <h3 class="text-lg font-bold">{{ translate('pages.topic.fakeNewsSource') }}</h3>
                        <div class="flex space-x-4 flex-wra">
                            @foreach(data_get($topic, 'fact_check_reference') as $reference)
                                <a href="{{ data_get($reference, 'url') }}" target="_blank" class="p-2">
                                    <div class="flex items-center justify-center p-2 border rounded-md cursor-pointer max-w-xs">
                                        <span class="text-gray-700 font-medium">{{ data_get($reference, 'name') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="flex flex-wrap justify-between items-start gap-4 mt-5">
                    @if(data_get($topic, 'tags'))
                        <div class="flex flex-col">
                            <p class="text-gray-800">{{ translate('pages.topic.tags') }}</p>
                            <div class="flex flex-wrap gap-2">
                                <div class="flex space-x-1">
                                    @foreach(data_get($topic, 'tags') as $tag)
                                        <a href="{{ route('tags.index', ['name' => data_get($tag, 'name')]) }}" target="_blank">
                                            <div class="flex items-center justify-center p-2 cursor-pointer">
                                                <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 rounded-md cursor-pointer hover:bg-gray-200">#{{ data_get($tag, 'name') }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex gap-4 items-center pt-6">
                        @include('partials.social-media')
                    </div>
                </div>
                <div class="flex flex-wrap gap-4 greyContent p-6 mt-8 rounded-md shadow-md">
                    <div class="w-full">
                        <div class="flex items-center">
                            <img src="{{ Storage::url(data_get($topic, 'teamMember.image')) }}"
                                 alt="Profile Picture"
                                 class="w-10 h-10 rounded-full mr-4"
                            />
                            <div>
                                <p class="text-sm font-medium blueColour p-4">{{ data_get($topic, 'teamMember.fullName') }} ({{ data_get($topic, 'teamMember.jobTitle') }})</p>
                                <p class="text-xs text-gray-500">{{ data_get($topic, 'teamMember.created_at')?->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <div id="bio-container">
                                <div id="bio-preview" class="inline">
                                    {!! Str::limit(data_get($topic, 'teamMember.bio'), 100, '...') !!}
                                </div>
                                <div id="bio-full" class="hidden inline">
                                    {!! data_get($topic, 'teamMember.bio') !!}
                                </div>
                            </div>

                            <button id="toggleBio" class="blueColour font-medium text-sm rtl:inline-block"
                                    dir="auto"
                                    data-read-more="{{ translate('pages.topic.factChecker.readMore') }}"
                                    data-read-less="{{ translate('pages.topic.factChecker.readLess') }}">
                                {{ translate('pages.topic.factChecker.readMore') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-8 mt-8">
                    <div class="greyContent p-4 rounded-md shadow">
                        <h3 class="text-[#111827] mb-5">{{ translate('pages.topic.correctionStatement.label') }}</h3>
                        <p class="text-[#6B7280]">
                            {{ translate('pages.topic.correctionStatement.message') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">{{ translate('pages.topic.requestToFactCheckHeader') }}</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ translate('pages.topic.requestToFactCheckMessage') }}
                    </p>
                    <a href="{{ route('contact.index') }}" class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        <span class="text-lg">📱</span> {{ translate('pages.topic.contactUs') }}
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">{{ translate('pages.topic.joinWhatsAppChatBot.heading') }}</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ translate('pages.topic.joinWhatsAppChatBot.bodyText') }}
                    </p>
                    <a href="https://web.whatsapp.com/send?phone={{ config('topic-page.whatsapp.chatbot') }}" class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                        <span dir="ltr">
                            {{ translate('pages.topic.joinWhatsAppChatBot.buttonText') }}
                        </span>
                    </a>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">{{ translate('pages.topic.joinWhatsAppChatChannel.heading') }}</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ translate('pages.topic.joinWhatsAppChatChannel.bodyText') }}
                    </p>
                    <a href="https://web.whatsapp.com/send?phone={{ config('topic-page.whatsapp.channel') }}" class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                        <span dir="ltr">
                            {{ translate('pages.topic.joinWhatsAppChatChannel.buttonText') }}
                        </span>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900">{{ translate('pages.topic.requestCorrectionHeader') }}</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ translate('pages.topic.requestCorrectionText') }}
                        <a href="{{ route('contact.index') }}" class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            <span class="text-lg">📱</span> {{ translate('pages.topic.contactUs') }}
                        </a>
                    </p>
                </div>

                <div class="bg-white shadow-md rounded-lg p-1">
                    @foreach($related as $topic)
                        <div class="flex flex-col xl:flex-row w-full px-2 mb-4">
                            <x-cards.topic :topic="$topic" />
                        </div>
                    @endforeach
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
        @foreach($readMore->chunk(3) as $rowTopics)
            <div class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($rowTopics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                        <x-cards.topic :topic="$record" />
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    @include('partials.newsletter')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bioPreview = document.getElementById("bio-preview");
            const bioFull = document.getElementById("bio-full");
            const toggleBtn = document.getElementById("toggleBio");

            toggleBtn.addEventListener("click", function() {
                if (bioFull.classList.contains("hidden")) {
                    bioFull.classList.remove("hidden");
                    bioPreview.classList.add("hidden");
                    toggleBtn.textContent = toggleBtn.getAttribute("data-read-less");
                } else {
                    bioFull.classList.add("hidden");
                    bioPreview.classList.remove("hidden");
                    toggleBtn.textContent = toggleBtn.getAttribute("data-read-more");
                }
            });
        });
    </script>
@endsection
