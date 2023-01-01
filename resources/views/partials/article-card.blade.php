@extends('partials.components.card')
@section('image')
    <a href="{{$show}}">
        <div  class="w-full h-[266px] bg-[url('{{$avatar}}')] bg-cover bg-center bg-no-repeat rounded-t-lg"></div>
    </a>
@endsection
@section('tags-icon')
    <img class="w-[32px] rounded-circle" src="{{$icon}}" alt="{{$title}}">
@endsection
@section('footer')
    @include('partials.article-card-footer', compact('show', 'article', 'showTotalScore'))
@endsection
