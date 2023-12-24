@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.articles.header')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full">
        <x-page-header :headline="translate('pages.articles.header')"/>
        <div class="flex flex-col w-4/5 justify-center mx-auto">
            <div class="w-full -mt-8 md:-mt-16 mx-auto">
                <x-input.text id="searchQuery" name="query" value="{{request()->get('query')}}"/>
            </div>
            <div class="align-self-end w-fit mt-2 mb-16">
                <x-learn-more href="#" text="{{translate('pages.articles.search.button')}}"/>
            </div>
        </div>

        <div class="container mx-auto mb-10 space-y-10">
            @foreach($articles->chunk(3) as $rowArticles)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowArticles as $article)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                            <x-cards.article :article="$article" />
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="container mx-auto my-20 space-y-10"  dir="ltr">
            {{$articles->links()}}
        </div>
    </div>
    <script>
        $('#searchQuery').bind('keypress', {}, function (element) {
            var code = (element.keyCode ? element.keyCode : element.which);
            console.log(code)
            console.log(code===13)
            if (code === 13) {
                element.preventDefault();
                $('#queryField').val($(this).val())
                $('#newsFilterForm').submit();
            }
        });
    </script>
    <form id="newsFilterForm" action="{{route('articles.index')}}" method="GET">
        @csrf
        <input type="hidden" id="queryField" name="query" value="">
    </form>
@endsection
