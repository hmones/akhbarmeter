@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.careers.header')" :description="translate('pages.careers.description')" />
@endsection

@section('content')
    <div class="container mx-auto px-4 py-10">
        <div class="text-center mb-8 max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">{{ translate('pages.careers.header') }}</h1>
            <p class="text-gray-600">
                {{ translate('pages.careers.description') }}
            </p>
        </div>
        <!-- Job Title and Apply Button -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">{{ data_get($career, 'title') }}</h1>
            <a href="#" class="bg-[#4F46E5] text-white font-medium py-2 px-4 rounded hover:bg-[#4F46E5]">
                Apply on Email
            </a>
        </div>
        <!-- Job Details -->
        <div class="text-gray-600 space-y-4">
            <p>{{ data_get($career, 'location') }}</p>
            <p>{{ data_get($career, 'type') }}</p>
        </div>

        <!-- About the Job -->
        <div class="mt-6 space-y-4">
            <h2 class="text-xl font-semibold">About the job</h2>
            <p><strong>Department: </strong>{{ data_get($career, 'sub_title') }}</p>
            <p><strong>Location: </strong>{{ data_get($career, 'location') }}</p>

            <p>{!! data_get($career, 'description') !!}</p>
        </div>
    </div>
@endsection
