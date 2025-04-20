@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.methodology.title')" :description="translate('pages.methodology.description')" keywords="مهنية، احترافية، حقوق الإنسان، أخلاقيات الصحافة، معايير الصحافة، المعايير الاحترافية للصحافة، الصحافة النزيهة، المسائلة، مرصد صحفي، Professionalism, Credibility, Human Rights, Media Ethics, Media Standards, Ethical Media, Media Accountability, Media Observatory"/>
@endsection

@section('content')
    <x-page-header :headline="translate('pages.methodology.header')"
                   :description="translate('pages.methodology.description')"/>
    <div class="container mx-auto flex flex-col px-2">
        <div class="flex flex-col leading-5 font-normal text-gray-500 md:leading-6">
            {!! translate('pages.methodology.how.details') !!}
        </div>
    </div>
    <div class="p-4 bg-indigo-50 md:container md:mx-auto md:rounded-xl md:flex items-center justify-between">
        <div class="flex flex-col space-y-4 md:space-y-0 md:p-10">
            <div class="flex flex-col">
                <div class="text-xl leading-10 font-extrabold md:text-4xl">
                    {{translate('pages.methodology.top.header1')}}
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-blue-600 text-xl font-extrabold leading-10 md:text-4xl">
                    {{translate('pages.methodology.top.header2')}}
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-sm leading-5 font-normal text-gray-500 md:text-xl md:leading-7">
                    {{translate('pages.methodology.top.description')}}
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-4">
            <a href="{{translate('pages.methodology.top.button.link')}}" class="bg-blue-600 shadow-sm py-2 px-4 rounded text-white w-fit mt-2">
                {{translate('pages.methodology.top.button.text')}}
            </a>
        </div>
    </div>

    <div
        class="flex flex-col md:flex-row items-center justify-center text-center px-8 my-6 space-y-6 md:space-y-0 md:container md:mx-auto md:items-start md:mt-20">
        <div class="flex flex-col md:w-1/3 ltr:md:text-left rtl:text-right md:px-10 md:space-y-4">
            <div class="flex flex-col">
                <div class="font-extrabold text-xl leading-10 md:text-3xl md:leading-9">
                    {{translate('pages.methodology.faq.header')}}
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-lg leading-7 font-normal text-gray-500">
                    {!! translate('pages.methodology.faq.description') !!}
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-6 md:w-2/3">
            <div class="flex flex-col ltr:text-left rtl:text-right space-y-2">
                <div class="flex flex-row text-lg leading-6 font-semibold">
                    {{translate('pages.methodology.how.header')}}
                </div>
                <div class="text-base leading-6 font-normal text-gray-500">
                    {!! translate('pages.methodology.how.description') !!}
                </div>
            </div>
            <div class="flex flex-col ltr:text-left rtl:text-right space-y-2">
                <div class="flex flex-row text-lg leading-6 font-semibold">
                    {{translate('pages.methodology.explain.header')}}
                </div>
                <div class="text-base leading-6 font-normal text-gray-500">
                    {!!translate('pages.methodology.explain.description')!!}
                </div>
            </div>
            <div class="flex flex-col ltr:text-left rtl:text-right space-y-2">
                <div class="flex flex-row text-lg leading-6 font-semibold">
                    {{translate('pages.methodology.fact-checking.header')}}
                </div>
                <div class="text-base leading-6 font-normal text-gray-500">
                    {!! translate('pages.methodology.fact-checking.description') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center md:mt-20">
        <x-page-header headline="{{translate('pages.methodology.category.header')}}"
                       description="{{translate('pages.methodology.category.description')}}"/>
    </div>

    <div class="container mx-auto px-4 flex flex-col space-y-8 md:flex-row md:space-y-0 md:space-x-4 rtl:space-x-reverse">
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path
                        d="M33.2441 24C33.2441 28.9706 29.2147 33 24.2441 33M33.2441 24C33.2441 19.0294 29.2147 15 24.2441 15M33.2441 24H15.2441M24.2441 33C19.2736 33 15.2441 28.9706 15.2441 24M24.2441 33C25.901 33 27.2441 28.9706 27.2441 24C27.2441 19.0294 25.901 15 24.2441 15M24.2441 33C22.5873 33 21.2441 28.9706 21.2441 24C21.2441 19.0294 22.5873 15 24.2441 15M15.2441 24C15.2441 19.0294 19.2736 15 24.2441 15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                {{translate('general.professionalism')}}
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                {{translate('pages.methodology.professionalism')}}
            </div>
        </div>
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path
                        d="M15.2441 18L18.2441 19M18.2441 19L15.2441 28C17.0167 29.3334 19.4728 29.3334 21.2453 28M18.2441 19L21.2442 28M18.2441 19L24.2441 17M30.2441 19L33.2441 18M30.2441 19L27.2441 28C29.0167 29.3334 31.4728 29.3334 33.2453 28M30.2441 19L33.2442 28M30.2441 19L24.2441 17M24.2441 15V17M24.2441 33V17M24.2441 33H21.2441M24.2441 33H27.2441"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                {{translate('general.credibility')}}
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                {{translate('pages.methodology.credibility')}}
            </div>
        </div>
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path d="M25.2441 22V15L16.2441 26H23.2441L23.2441 33L32.2441 22L25.2441 22Z" stroke="white"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                {{translate('general.human-rights')}}
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                {{translate('pages.methodology.human-rights')}}
            </div>
        </div>
    </div>
    <div class="bg-gray-50 p-4 my-6 space-y-4 md:space-y-8 md:container md:rounded-xl md:mx-auto">
        <div class="text-xl font-extrabold leading-10 mb-8 md:p-8 md:text-3xl md:leading-8 md:tracking-tight">
            {{translate('pages.methodology.questions.header')}}
        </div>
        @foreach(\App\Models\Question::whereActive(1)->orderBy('order', 'asc')->get() as $question)
            <x-accordion :headline="$question->title" :description="$question->description"/>
        @endforeach
        <script>
            $('div.accordion-button').unbind('click').on('click', function () {
                $(this).parent().siblings('.content').toggle('hidden')
            })
        </script>
    </div>
@endsection
