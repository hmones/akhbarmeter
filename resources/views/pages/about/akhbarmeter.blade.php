@extends('layouts.default')
@section('title', translate('pages.akhbarmeter.header'))
@section('content')
    <x-page-header :headline="translate('pages.akhbarmeter.header')"
                   :description="translate('pages.akhbarmeter.description')"/>

    <div class="container">
        <div class="flex flex-col-reverse md:flex-row justify-center items-center align-content-center">
            <div class="flex flex-col rounded-lg z-10 md:align-middle -mt-48 md:m-0 shadow-2xl">
                <img class="my-auto h-[177px] md:h-[405px] w-full" src="{{asset('images/about.png')}}"
                     alt="AkhbarMeter Team"/>
            </div>
            <div
                class="flex flex-col p-10 pb-60 md:p-32 ltr:md:pl-[285px] rtl:md:pr-[285px] ltr:md:-ml-48 rtl:md:-mr-48 bg-blue-600 rounded-lg w-full text-white space-y-6">
                <div class="text-xl leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                    {{translate('pages.akhbarmeter.history.header')}}
                </div>
                <div class="text-sm leading-8 font-normal md:text-xl md:leading-7">
                    {{translate('pages.akhbarmeter.history.description')}}
                </div>
            </div>
        </div>
    </div>


    <div class="bg-gray-50 p-16 md:px-24 my-6">
        <div class="flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-8 rtl:space-x-reverse">
            <div class="flex flex-col space-y-4 md:w-1/3">
                <div class="flex flex-row">
                    <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.244141" width="56" height="56" rx="28" fill="#2563EB"/>
                        <path
                            d="M34.9147 22.6656L37.5888 22.672C39.0597 22.6755 40.2502 23.8689 40.2502 25.3398V37.3384C40.2502 38.8118 39.0558 40.0062 37.5825 40.0062V40.0062C36.1091 40.0062 34.9147 38.8118 34.9147 37.3384V19.9979C34.9147 18.5245 33.7203 17.3301 32.2469 17.3301H18.908C17.4346 17.3301 16.2402 18.5245 16.2402 19.9979V37.3384C16.2402 38.8118 17.4346 40.0062 18.908 40.0062H37.5825"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M30.2454 34.6709H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M30.2454 30.6689H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <rect x="20.9082" y="22.666" width="9.33722" height="4.00167" rx="0.5" stroke="white"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="flex flex-row">
                    <div class="text-4xl leading-10 font-extrabold">
                        {{translate('pages.akhbarmeter.monitor.header')}}
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    {{translate('pages.akhbarmeter.monitor.description')}}
                </div>
            </div>
            <div class="flex flex-col space-y-4 md:w-1/3">
                <div class="flex flex-row">
                    <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.244141" width="56" height="56" rx="28" fill="#2563EB"/>
                        <path
                            d="M34.9147 22.6656L37.5888 22.672C39.0597 22.6755 40.2502 23.8689 40.2502 25.3398V37.3384C40.2502 38.8118 39.0558 40.0062 37.5825 40.0062V40.0062C36.1091 40.0062 34.9147 38.8118 34.9147 37.3384V19.9979C34.9147 18.5245 33.7203 17.3301 32.2469 17.3301H18.908C17.4346 17.3301 16.2402 18.5245 16.2402 19.9979V37.3384C16.2402 38.8118 17.4346 40.0062 18.908 40.0062H37.5825"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M30.2454 34.6709H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M30.2454 30.6689H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <rect x="20.9082" y="22.666" width="9.33722" height="4.00167" rx="0.5" stroke="white"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="flex flex-row">
                    <div class="text-4xl leading-10 font-extrabold">
                        {{translate('pages.akhbarmeter.review.header')}}
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    {{translate('pages.akhbarmeter.review.description')}}
                </div>
            </div>
            <div class="flex flex-col space-y-4 md:w-1/3">
                <div class="flex flex-row">
                    <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.244141" width="56" height="56" rx="28" fill="#2563EB"/>
                        <path
                            d="M34.9147 22.6656L37.5888 22.672C39.0597 22.6755 40.2502 23.8689 40.2502 25.3398V37.3384C40.2502 38.8118 39.0558 40.0062 37.5825 40.0062V40.0062C36.1091 40.0062 34.9147 38.8118 34.9147 37.3384V19.9979C34.9147 18.5245 33.7203 17.3301 32.2469 17.3301H18.908C17.4346 17.3301 16.2402 18.5245 16.2402 19.9979V37.3384C16.2402 38.8118 17.4346 40.0062 18.908 40.0062H37.5825"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M30.2454 34.6709H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M30.2454 30.6689H20.9082" stroke="white" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <rect x="20.9082" y="22.666" width="9.33722" height="4.00167" rx="0.5" stroke="white"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="flex flex-row">
                    <div class="text-4xl leading-10 font-extrabold">
                        {{translate('pages.akhbarmeter.assess.header')}}
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    {{translate('pages.akhbarmeter.assess.description')}}
                </div>
            </div>
        </div>
    </div>

    <div id="partners" class="container flex flex-col md:flex-row items-center space-y-10 md:space-y-0">
        <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
            {{translate('pages.akhbarmeter.awards')}}
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/eya.png')}}" alt="European Youth Award"
                 class="text-center h-auto w-48"/>
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/dpc.png')}}" alt="Digital Participation Summit"
                 class="text-center h-auto w-48"/>
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/amf.png')}}" alt="Alexandria Media Forum"
                 class=" text-center h-auto w-48"/>
        </div>
    </div>

    <div class="bg-gray-50 py-20">
        <div class="container flex flex-col md:flex-row items-center space-y-10 md:space-y-0">
            <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
                {{translate('pages.akhbarmeter.partners')}}
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/tlg.jpg')}}" alt="Tahrir Lounge" class="text-center h-auto w-48"/>
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/mk.png')}}" alt="Macedonia Media Fact Checking"
                     class="text-center h-auto w-48"/>
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/zastone.png')}}" alt="Zastone" class="text-center h-auto w-48"/>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-col md:flex-row items-center space-y-10 md:space-y-0 py-20">
            <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
                {{translate('pages.akhbarmeter.featured')}}
            </div>
            <div class="flex flex-col items center space-y-20">
                <div class="flex flex-row items-center space-x-16">
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mag1.gif')}}" alt="Ich mag meine uni"
                             class="text-center h-auto w-48"/>
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/wbs.jpg')}}" alt="Willy Brandt School"
                             class="text-center h-auto w-48"/>
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/ca.jpg')}}" alt="Commitment Award"
                             class="text-center h-auto w-48"/>
                    </div>
                </div>
                <div class="flex flex-row space-x-16 items-center rtl:space-x-reverse">
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mag2.png')}}" alt="Daily News Egypt"
                             class="text-center h-auto w-auto"/>
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mk.png')}}" alt="Macedonia Media Fact Checking"
                             class="text-center h-auto w-48"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.support')
@endsection
