@extends('partials.components.card')
@section('image')
    <iframe class="w-full" height="266" src="{{$avatar}}" title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
@endsection
@section('tags-icon')
    <i class="fa fa-youtube-play fa-2x text-red-700 me-2" aria-hidden="true"></i>
@endsection
