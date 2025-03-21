@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.awards.title')" :description="translate('pages.awards.description')" keywords="مهنية، احترافية، حقوق الإنسان، أخلاقيات الصحافة، معايير الصحافة، المعايير الاحترافية للصحافة، الصحافة النزيهة، المسائلة، مرصد صحفي، Professionalism, Credibility, Human Rights, Media Ethics, Media Standards, Ethical Media, Media Accountability, Media Observatory"/>
@endsection

@section('content')
    <x-page-header :headline="translate('pages.awards.header')"
                   :description="translate('pages.awards.description')"/>

    <div class="container mx-auto flex flex-col space-y-2 md:space-y-10 px-2 py-10">
        <div class="text-lg space-y-4 pt-2 pb-6 editor-content">
            {!! $description !!}
        </div>
    </div>
@endsection
