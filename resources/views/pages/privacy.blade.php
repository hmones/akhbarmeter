@extends('layouts.default')

@section('seo')
    <x-seo title="Privacy Policy" />
@endsection

@section('content')
    <style>
        ul {
            list-style: revert;
        }
    </style>
    <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-4xl md:text-5xl leading-10 font-extrabold tracking-tight">{{ translate('pages.privacy.header') }}</h1>
        </div>
    </div>

    <div class="container mx-auto my-8 px-4">
        {!! $description !!}
    </div>
@endsection
