@extends('layouts.default')
@section('content')
    <div class="">
        <div class="container mt-20 flex flex-row justify-between">
            <h3 class="text-3xl">
                <a href="{{route('admin.index')}}">Dashboard</a>
                <span class="text-gray-400"> > </span>
                <a href="javascript:void(0)">Videos</a>
            </h3>
            <a href="{{route('admin.videos.create')}}">
                <h3 class="text-3xl">New <em class="fa fa-plus-circle text-gray-400"></em></h3>
            </a>
        </div>
        <div class="container mb-20 mt-10">
            <table class="table-auto border-y-2 border-gray-100 mx-auto w-full">
                <thead class="bg-gray-900 text-white p-2">
                <tr class="border-y-2 border-gray-100">
                    <th class="p-2">Title</th>
                    <th class="p-2">Link</th>
                    <th class="p-2 px-4">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr class="border-y-2 border-gray-100 space-y-2">
                        <td class="p-2">{{$video->title}}</td>
                        <td class="p-2">{{$video->url}}</td>
                        <td class="flex flex-row space-x-1.5 p-2 px-4">
                            <a href="{{route('admin.videos.edit', $video->id)}}"><em class="fa fa-pencil"></em></a>
                            <form action="{{route('admin.videos.destroy', $video->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit"><em class="fa fa-trash"></em></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="container my-20">
            {{$videos->links()}}
        </div>
    </div>
@endsection
