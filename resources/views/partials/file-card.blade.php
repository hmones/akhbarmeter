@extends('partials.components.card')
@section('image')
    <div  class="w-full h-[266px] bg-[url('{{$image}}')] bg-cover bg-center bg-no-repeat"></div>
@endsection
@section('description')
    {{$description}}
@endsection
@section('extra')
    {{$file}}
@endsection
