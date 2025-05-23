@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.careers.header')" :description="translate('pages.careers.description')" />
@endsection

@section('content')
    <div class="container mx-auto px-4 py-10">
        <div class="text-center mb-8 max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">{{ translate('pages.careers.jobs.header') }}</h1>
            <p class="text-gray-600">
                @if(count($careers) > 0)
                    {{ translate('pages.careers.description') }}
                @else
                    {!! translate('pages.careers.noJobs.description') !!}
                @endif
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($careers as $career)
                <div class="bg-white shadow-md rounded-lg p-6 max-w-sm mx-auto">
                    <h2 class="text-xl font-bold mb-2"> {{ data_get($career, 'title') }}</h2>
                    <p class="text-gray-600 mb-4">
                        {{ data_get($career, 'sub_title') }}
                    </p>
                    <a href="{{route('careers.show', data_get($career, 'id'))}}" class="text-[#4F46E5] font-semibold mb-4 inline-block">{{ translate('pages.careers.viewMore') }}</a>
                    <a href="{{route('career.apply.index', data_get($career, 'id'))}}" class="w-full bg-[#4F46E5] text-white font-medium py-2 px-4 rounded">{{ translate('pages.careers.apply') }}</a>
                </div>
            @endforeach
    </div>
@endsection
