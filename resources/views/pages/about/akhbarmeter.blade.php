@extends('layouts.default')
@section('title')
    Who we are?
@endsection
@section('content')
    @include('partials.page-header', [
            'headline' => 'Who we are?',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque'
        ])

    <div class="container">
        <div class="flex flex-col-reverse md:flex-row justify-center items-center align-content-center">
            <div class="flex flex-col rounded-lg z-10 md:align-middle -mt-48 md:m-0 shadow-2xl">
                <img class="my-auto h-[177px] md:h-[405px] w-full" src="{{asset('images/about.png')}}" alt="AkhbarMeter Team"/>
            </div>
            <div class="flex flex-col p-10 pb-60 md:p-32 md:pl-[285px] md:-ml-48 bg-blue-600 rounded-lg w-full text-white space-y-6">
                    <div class="text-xl leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                        Our history
                    </div>
                    <div class="text-sm leading-8 font-normal md:text-xl md:leading-7">
                        AkhbarMeter (MediaMeter) is one of the first dynamic digital media observatories in Egypt and the
                        world, which rank news agencies according to their adherence to ethical and processional media
                        standards. AkhbarMeter, is a youth-led initiative developed by Egyptians. The initiative started on
                        a voluntary basis in 2014 and officially in 2018. It is an attempt to response to increasing use of
                        media to manipulate the public and polarize society.
                    </div>
            </div>
        </div>
    </div>


    <div class="bg-gray-50 p-16 md:px-24 my-6">
        <div class="flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-8">
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
                        We monitor
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    AkhbarMeter (MediaMeter) monitors and assesses the truthfulness and professionalism of the top ten
                    online news websites in Egypt based on Similar Web rankings. Our reviewers select and evaluate
                    articles from the political or economic sections of each news outlet based on their importance to
                    the Egyptian readers. Reviewers assess each article based on several methodological questions
                    developed in consultation with various international fact-checking experts that fall under three
                    broad categories of professionalism, manipulation and human rights violations.
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
                        We review
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    Specific questions include whether the article conceals information, contains false information,
                    uses photos to manipulate facts, cites sources representing different views, reflects bias by the
                    author, contains hate speech, negatively profiles members of certain groups, and more. Assessed
                    articles are posted on the website (https://akhbarmeter.org/) along with responses to the questions
                    described above. Each reviewed article is marked with an icon that provides a score out of 100% on
                    how professional and truthful it is. If the article contains false or misinformation, the icon is
                    marked accordingly to warn reader s. Our staff often contact authors of reviewed articles to give
                    them a chance to respond to the evaluation and offer to publish their responses on the article’s
                    page on the website.
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
                        We assess
                    </div>
                </div>
                <div class="flex flex-row text-xl leading-7 text-gray-500">
                    In addition to daily article reviews, AkhbarMeter (MediaMeter) conducts a monthly analysis of each
                    media outlet performance based on the cumulative articles reviewed and a monthly score for each
                    media outlet will be generated automatically. Finally, we publish three one-page articles per month
                    with deeper analysis on critical news items. The assessments are also circulated through its social
                    media networks for a wide range of audience.
                </div>
            </div>
        </div>
    </div>

    <div id="partners" class="container flex flex-col md:flex-row items-center space-y-10 md:space-y-0">
        <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
            Awards Received
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/eya.png')}}" alt="European Youth Award" class="text-center h-auto w-48"/>
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/dpc.png')}}" alt="Digital Participation Summit" class="text-center h-auto w-48"/>
        </div>
        <div class="flex flex-col w-1/4">
            <img src="{{asset('images/portfolio/amf.png')}}" alt="Alexandria Media Forum" class=" text-center h-auto w-48"/>
        </div>
    </div>

    <div class="bg-gray-50 py-20">
        <div class="container flex flex-col md:flex-row items-center space-y-10 md:space-y-0">
            <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
                Partners
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/tlg.jpg')}}" alt="Tahrir Lounge" class="text-center h-auto w-48"/>
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/mk.png')}}" alt="Macedonia Media Fact Checking" class="text-center h-auto w-48" />
            </div>
            <div class="flex flex-col w-1/4">
                <img src="{{asset('images/portfolio/zastone.png')}}" alt="Zastone" class="text-center h-auto w-48" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-col md:flex-row items-center space-y-10 md:space-y-0 py-20">
            <div class="flex flex-col text-4xl leading-10 font-extrabold w-full md:w-1/5 text-center md:text-left">
                Featured in
            </div>
            <div class="flex flex-col items center space-y-20">
                <div class="flex flex-row items-center space-x-16">
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mag1.gif')}}" alt="Ich mag meine uni" class="text-center h-auto w-48"/>
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/wbs.jpg')}}" alt="Willy Brandt School" class="text-center h-auto w-48"/>
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/ca.jpg')}}" alt="Commitment Award" class="text-center h-auto w-48"/>
                    </div>
                </div>
                <div class="flex flex-row space-x-16 items-center">
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mag2.png')}}" alt="Daily News Egypt" class="text-center h-auto w-auto" />
                    </div>
                    <div class="flex flex-col w-1/4">
                        <img src="{{asset('images/portfolio/mk.png')}}" alt="Macedonia Media Fact Checking" class="text-center h-auto w-48" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.support')
@endsection
