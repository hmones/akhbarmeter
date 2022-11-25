@extends('layouts.default')
@section('title')
    Manage {{Str::title($modelPlural)}}
@endsection
@section('content')
    <div class="">
        <div class="container mt-20 flex flex-row justify-between">
            <h3 class="text-3xl">
                <a href="{{route('admin.index')}}">Dashboard</a>
                <span class="text-gray-400"> > </span>
                <a href="javascript:void(0)">{{Str::title($modelPlural)}}</a>
            </h3>
            <a class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800"
               href="{{route('admin.' . $modelPlural . '.create')}}">
                <em class="fa fa-plus text-white"></em>
                New
            </a>
        </div>
        <div class="container mb-20 mt-10">
            <table class="table-auto border-y-2 border-gray-100 mx-auto w-full" >
                <caption>Table for {{$modelPlural}} saved in the backend</caption>
                <thead class="bg-gray-900 text-white p-2">
                <tr class="border-y-2 border-gray-100">
                    @foreach($displayedFields as $field)
                        <th class="p-2">{{Str::of($field)->ucfirst()->replace('_', ' ')}}</th>
                    @endforeach
                    <th class="p-2 px-4">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <tr class="border-y-2 border-gray-100 space-y-2">
                        @foreach($displayedFields as $field)
                            <td class="p-2">{{$record->$field}}</td>
                        @endforeach
                        <td class="flex flex-row space-x-1.5 p-2 px-4">
                            <a href="{{route('admin.'. $modelPlural . '.edit', $record->id)}}"><em class="fa fa-pencil"></em></a>
                            <form action="{{route('admin.' . $modelPlural . '.destroy', $record->id)}}" method="POST">
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
            {{$records->links()}}
        </div>
    </div>
@endsection
