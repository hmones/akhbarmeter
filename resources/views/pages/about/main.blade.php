@extends('layouts.default', ['isColoredNavigation' => false])

@section('seo')
    <x-seo :title="translate('pages.about.header')" :description="translate('pages.about.description')"  />
@endsection

@section('content')
    <style>
        .radial-blue-background {
            background: radial-gradient(at 80% 50%, rgb(6, 182, 212) 10%, rgb(30, 58, 138) 70%);
            background-position: right !important;
        }
    </style>
    <div class="h-fit bg-blue-900 px-2 py-10 md:py-20 radial-blue-background text-white">
        <div class="container mx-auto">
            <div class="flex flex-col space-y-4">
                <div class="flex flex-row">
                    <div class="text-lg leading-7 font-bold md:text-4xl md:leading-10 md:font-extrabold">
                        {{translate('pages.about.header')}}
                    </div>
                </div>
                <div class="flex flex-row text-sm leading-8 font-normal md:text-xl">
                    {{translate('pages.about.description')}}
                </div>
            </div>
        </div>

        <div class="container mx-auto my-10 md:my-20">
            <div class="flex flex-col md:flex-row justify-between space-y-6 md:space-y-0 md:space-x-6 rtl:space-x-reverse">
                <div class="flex flex-col md:w-1/3 bg-gray-100 text-black rounded p-4 space-y-2 md:space-y-4">
                    <div class="flex flex-row">
                        <svg viewBox="0 0 97 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 md:w-[97px]">
                            <rect x="0.244141" width="96" height="96" rx="48" fill="#DBEAFE"/>
                            <path d="M61.5833 37.3293L66.9315 37.342C69.8733 37.349 72.2544 39.7358 72.2544 42.6776V66.6749C72.2544 69.6216 69.8656 72.0104 66.9188 72.0104V72.0104C63.9721 72.0104 61.5833 69.6216 61.5833 66.6749V31.9938C61.5833 29.047 59.1945 26.6582 56.2477 26.6582H29.5699C26.6232 26.6582 24.2344 29.047 24.2344 31.9938V66.6749C24.2344 69.6216 26.6232 72.0104 29.5699 72.0104H66.9188" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M52.2448 61.3378H33.5703" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M52.2448 53.3358H33.5703" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="33.5703" y="37.3281" width="18.6744" height="8.00333" rx="0.5" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                        {{translate('pages.about.mediameter.header')}}
                    </div>
                    <div class="flex flex-row text-sm md:text-xl leading-7 font-normal text-gray-500">
                        {{translate('pages.about.mediameter.description')}}
                    </div>
                    <x-learn-more href="{{route('akhbarmeter')}}" />
                </div>
                <div class="flex flex-col md:w-1/3 bg-gray-100 text-black rounded p-4 space-y-2 md:space-y-4">
                    <div class="flex flex-row">
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="#DBEAFE"/>
                            <circle cx="50" cy="35" r="7" stroke="#2563EB" stroke-width="2"/>
                            <path d="M60 55c0-5-6-7-10-7s-10 2-10 7" stroke="#2563EB" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="30" cy="65" r="5" stroke="#2563EB" stroke-width="2"/>
                            <path d="M37 75c0-3-3.5-5-7-5s-7 2-7 5" stroke="#2563EB" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="70" cy="65" r="5" stroke="#2563EB" stroke-width="2"/>
                            <path d="M77 75c0-3-3.5-5-7-5s-7 2-7 5" stroke="#2563EB" stroke-width="2" stroke-linecap="round"/>
                            <path d="M37 45c-8 3-12 8-12 14" stroke="#2563EB" stroke-width="2" stroke-linecap="round"/>
                            <path d="M63 45c8 3 12 8 12 14" stroke="#2563EB" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                        {{translate('pages.about.ourTeam.header')}}
                    </div>
                    <div class="flex flex-row text-sm md:text-xl leading-7 font-normal text-gray-500">
                        {{translate('pages.about.ourTeam.description')}}
                    </div>
                    <x-learn-more href="{{route('team-member.index')}}" />
                </div>
                <div class="flex flex-col md:w-1/3 space-y-6">
                    <div class="flex flex-row bg-gray-100 text-black rounded p-4">
                        <div class="flex flex-col space-y-2 md:space-y-12">
                            <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                                {{translate('pages.about.partners')}}
                            </div>
                            <x-learn-more href="{{route('akhbarmeter')}}#partners" />
                        </div>
                    </div>
                    <div class="flex flex-row bg-gray-100 text-black rounded p-4">
                        <div class="flex flex-col space-y-2 md:space-y-12">
                            <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                                {{translate('pages.about.contact')}}
                            </div>
                            <x-learn-more href="{{route('contact.index')}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
