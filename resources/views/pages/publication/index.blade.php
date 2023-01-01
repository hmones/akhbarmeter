@extends('layouts.default')
@section('title')
    Publications
@endsection
@section('content')
    <div class="container max-h-full">
        <x-page-header headline="Publications" description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>

        <div class="container">
            <div class="flex flex-row mb-10">
                @if(request()->has('tag'))
                    <a href="{{route('publications.index')}}"
                       class="flex flex-row mx-2 px-2 h-fit rounded-5 text-sm mt-1.5">
                        <i class="fa fa-close"></i>
                    </a>
                @endif
                @foreach($publications->pluck('tags')->whereNotNull()->flatten()->take(18) as $tag)
                    <a href="{{route('publications.index', compact('tag'))}}"
                       class="flex flex-row mx-2 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                        #{{$tag}}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="container mb-10 space-y-10">
            @foreach($publications->chunk(3) as $rowPublications)
                <div
                        class="flex flex-col xl:flex-row w-full items-start items-stretch justify-center mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowPublications as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                            @include('partials.file-card', [
                                'title' => $record->title,
                                'description' => $record->description,
                                'time'  => $record->created_at->diffForHumans(),
                                'route' => 'publications.index',
                                'image' => Storage::url($record->image),
                                'author' => $record->author_name,
                                'avatar' => Storage::url($record->author_avatar),
                                'file' => Storage::url($record->file),
                                'tags'  => $record->tags,
                                'created' => $record->created_at,
                                'read' => $record->min_to_read
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
