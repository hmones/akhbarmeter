@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.tags.header')" :description="translate('pages.tags.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.tags.header')" :description="translate('pages.tags.description')"/>
        <div class="container mb-10 space-y-10">
            @foreach($topics->chunk(3) as $rowTopics)
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
    </div>
@endsection
