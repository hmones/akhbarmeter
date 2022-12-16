@extends('partials.components.card')
@section('image')
    <a href="{{$show}}">
        <div  class="w-full h-[266px] bg-[url('{{$avatar}}')] bg-cover bg-center bg-no-repeat"></div>
    </a>
@endsection
@section('tags-icon')
    <i class="fa fa-file-text-o fa-2x text-red-700 me-2" aria-hidden="true"></i>
@endsection
