@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.methodology.title')" :description="translate('pages.methodology.description')" keywords="مهنية، احترافية، حقوق الإنسان، أخلاقيات الصحافة، معايير الصحافة، المعايير الاحترافية للصحافة، الصحافة النزيهة، المسائلة، مرصد صحفي، Professionalism, Credibility, Human Rights, Media Ethics, Media Standards, Ethical Media, Media Accountability, Media Observatory"/>
@endsection

@section('content')
    <x-page-header :headline="translate('pages.factCheckingMethodology.header')"
                   :description="translate('pages.factCheckingMethodology.description')"/>

    <div class="container mx-auto flex flex-col space-y-2 md:space-y-10 px-2 py-10">
        <div id="fact_checking" class="flex flex-col text-lg leading-6 font-semibold md:text-3xl md:leading-9 md:font-bold">
            {{translate('pages.methodology.fact-checking.header')}}
        </div>
        <div
            class="flex flex-col leading-5 font-normal text-gray-500 md:leading-6 space-y-6">
            {!! translate('pages.methodology.fact-checking.details') !!}
        </div>
    </div>
@endsection
