@extends('layouts.default')
@section('title')
    Publications
@endsection
@section('content')
    <div class="container max-h-full">
        <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
            <div class="flex flex-col">
                <h1 class="text-5xl leading-10 font-extrabold tracking-tight">Publications</h1>
            </div>
            <div class="flex-initial w-1/3 flex-col">
                <p class="text-lg text-center leading-6 font-normal text-gray-500">
                    Simple text saying what the user should excpect by clicking on any of the news outlets.
                </p>
            </div>
        </div>

        <div class="container">
            <div class="flex flex-row mb-10">
                @if(request()->has('tag'))
                    <a href="{{route('publications.index')}}" class="flex flex-row mx-2 px-2 h-fit rounded-5 text-sm mt-1.5">
                        <i class="fa fa-close"></i>
                    </a>
                @endif
                @foreach($publications as $publicationList)
                    @foreach($publicationList->pluck('tags')->flatten()->take(18) as $tag)
                        <a href="{{route('publications.index', compact('tag'))}}" class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                            #{{$tag}}
                        </a>
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="container mb-10 space-y-10">
            @foreach($publications->chunk(3) as $rowPublications)
                <div class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowPublications as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            @include('partials.file-card', [
                                'title' => $record->title,
                                'description' => $record->descroption,
                                'time'  => $record->created_at->diffForHumans(),
                                'route' => 'publications.index',
                                'image' => Storage::url($record->image),
                                'author' => $record->author_name,
                                'avatar' => Storage::url($record->author_avatar),
                                'file' => Storage::url($record->file),
                                'tags'  => $record->tags
                            ])
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="container my-20 space-y-10">
            {{$publications->links()}}
        </div>
    </div>
@endsection
