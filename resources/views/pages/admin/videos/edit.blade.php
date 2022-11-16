@extends('layouts.default')
@section('content')
    <div class="">
        <div class="container mt-20">
            <h3 class="text-3xl">
                <a href="{{route('admin.index')}}">Dashboard</a>
                <span class="text-gray-400"> > </span>
                <a href="{{route('admin.videos.index')}}">Videos</a>
                <span class="text-gray-400"> > </span>
                <a href="javascript:void(0)">{{$model->id}}</a>
            </h3>
        </div>
        <div class="container my-20">
            <form action="{{route('admin.videos.update', $model->id)}}" method="post"
                  class="flex flex-col space-y-4 items-start align-top">
                @csrf
                @method('patch')
                @foreach($model->editableFields as $field => $type)
                    <div class="flex-flex-col items-start">
                        <label for="{{$field}}">
                            {{$field}}
                        </label>
                        @switch($type)
                            @case('rich')
                                <textarea name="{{$field}}" id="{{$field}}" cols="30"
                                          rows="10">{{$model->$field}}</textarea>
                                @break
                            @case('tags')
                                <p>{{json_encode($model->$field)}}</p>
                                @break
                            @default
                                <input type="text" id="{{$field}}" name="{{$field}}" value="{{$model->$field}}"/>
                        @endswitch
                    </div>
                @endforeach
                <div class="pt-10">
                    <button class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
