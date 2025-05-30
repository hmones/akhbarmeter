@props(['fakeNews', 'articles'])
<section id="topSection" class="bg-gradient-to-r from-blue-700 to-cyan-700 px-2 py-6">
    <div class="container mx-auto flex flex-col space-y-8 z-10">
        <div class="flex flex-col-reverse lg:flex-row w-full lg:space-x-6 rtl:space-x-reverse">
            <div class="flex flex-col space-y-4 lg:w-1/3">
                <div class="text-white text-xl leading-7 font-bold lg:text-4xl lg:leading-10 lg:font-extrabold mt-6 lg:mt-0">
                    {{ translate('pages.home.top-section.ranking.header') }}
                </div>
                <div class="flex flex-col space-y-4 w-full">
                    <div class="flex flex-col bg-white rounded-lg p-3 w-full">
                        <x-home.sections.topic-card :title="translate('components.home.top.factSheet')" :type="'factSheet'" />
                    </div>
                    <div class="flex flex-col bg-white rounded-lg p-3 w-full">
                        <x-home.sections.topic-card :title="translate('components.home.top.explainer')" :type="'explainer'" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-4 lg:w-2/3">
                <div class="text-white text-xl leading-7 font-bold lg:text-4xl lg:leading-10 lg:font-extrabold">
                    {{translate('pages.home.top-section.fake.header')}}
                </div>
                @if($fakeNews->first())
                    <x-cards.fake :article="$fakeNews->first()"/>
                @endif
            </div>
        </div>
        <div class="flex flex-col-reverse lg:flex-row w-full lg:space-x-6 rtl:space-x-reverse">
            <img src="{{asset('images/ifcn_badge.png')}}" class="hidden lg:flex flex-wrap w-[110px] mx-auto" alt="AkhbarMeter IFCN badge"/>
            <div class="flex flex-col text-base leading-6 font-normal lg:w-1/3 text-white mt-6 lg:mt-0">
                {{translate('pages.home.top-section.about-akhbarmeter')}}
            </div>
            <img src="{{asset('images/ifcn_badge.png')}}" class="flex lg:hidden flex-wrap w-[110px] mx-auto mt-4" alt="AkhbarMeter IFCN badge"/>
            <div class="flex flex-col space-y-4 lg:w-2/3">
                <div class="text-white text-xl leading-7 font-bold lg:text-4xl lg:leading-10 lg:font-extrabold">
                    {{translate('pages.home.top-section.search.header')}}
                </div>
                <form class="flex flex-col lg:flex-row items-start lg:space-x-4 rtl:space-x-reverse" action="{{route('articles.index')}}" method="GET">
                    <div class="w-full lg:w-1/2">
                        <x-input.text id="urlField" name="query" :placeholder="translate('pages.home.top-section.search.placeholder')"/>
                    </div>
                    <button
                        class="mt-1 bg-blue-500 hover:bg-blue-400 w-full lg:w-fit h-12 px-16 text-white cursor-pointer rounded text-center">
                        {{translate('pages.home.top-section.search.button')}}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll Down Top News Section -->
    <div class="hidden container mx-auto mt-24 lg:flex flex-row space-x-8 text-white items-center z-10 rtl:space-x-reverse">
        <a class="text-base leading-6 font-semibold tracking-wide uppercase hover:text-white" href="#latestNews">
            {{translate('pages.home.top-section.scroll')}}
        </a>
        <div class="flex flex-row space-x-4 items-center rtl:space-x-reverse">
            <em class="fa fa-circle text-cyan-500 text-xs"></em>
            <span class="text-base leading-6 font-semibold tracking-wide uppercase">
                    {{translate('pages.home.top-section.latest')}}
                </span>
            @if($articles->first())
                <span class="text-base leading-none font-normal">{{$articles->first()?->title}}</span>
            @endif
        </div>
    </div>
</section>
