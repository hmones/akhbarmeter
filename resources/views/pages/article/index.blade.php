@extends('layouts.default')
@section('title', 'Articles')

@section('content')
    <div class="container max-h-full">
        <x-page-header headline="Search our Reviews"/>

        <div class="container mb-10 space-y-10">
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($articles as $article)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        @include('partials.article-card', [
                            'article' => $article,
                            'title'   => $article->title,
                            'time'    => $article->created_at->diffForHumans(),
                            'route'   => 'articles.index',
                            'tags'    => array_filter(preg_split('/[#\s]/', $article->publisher->hashtags)),
                            'avatar'  => $article->image ? Storage::url($article->image) : asset('images/placeholders/article.png'),
                            'icon'    => $article->publisher->image ? Storage::url($article->publisher->image) : asset('images/placeholders/publisher.png'),
                            'show'    => route('articles.show', $article->id),
                            'showTotalScore' => true,
                        ])
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container my-20 space-y-10">
            {{$articles->links()}}
        </div>

    </div>
@endsection
