@extends('layouts.default')
@section('title')
    Page not found - 404
@endsection
@section('content')
    <div class="container flex flex-col mx-auto my-auto items-center justify-center py-40 space-y-3">
        <div class="flex flex-col items-center justify-center">
            <img src="{{asset('images/logo-icon.svg')}}" alt="AkhbarMeter Logo" class="h-32">
        </div>
        <div class="flex flex-col items-center justify-center">
            <p class="font-bold text-indigo-600 mt-16">404 ERROR</p>
        </div>
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-5xl font-extrabold tracking-tight">Page not found.</h1>
        </div>
        <div class="flex flex-col items-center justify-center">
            <p class="text-gray-500">
                Sorry, we couldn’t find the page you’re looking for.
            </p>
        </div>
        <div class="flex flex-col items-center justify-center">
            <a class="text-indigo-600 mt-2" href="/">
                Go back home →
            </a>
        </div>
    </div>
@endsection
