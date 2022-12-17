@extends('layouts.default')
@section('title')
    Videos
@endsection
@section('content')
    <div class="container max-h-full">
        @include('partials.page-header', [
            'headline' => 'Videos',
            'description' => 'Simple text saying what the user should excpect by clicking on any of the news outlets.'
        ])

        <div class="container mb-10 space-y-10">
            @foreach($videos->chunk(3) as $rowVideos)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowVideos as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            @include('partials.video-card', [
                                'title' => $record->title,
                                'time'  => $record->created_at->diffForHumans(),
                                'route' => 'videos.index',
                                'avatar' => $record->url,
                                'tags'  => $record->tags,
                                'show'  => route('videos.show', $record->id)
                            ])
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="container my-20 space-y-10">
            {{$videos->links()}}
        </div>
    </div>
@endsection
