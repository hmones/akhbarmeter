<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
        @if(!empty($errors->all()))
            <div class="mt-4">
                <h3 class="text-red-600 font-bold">There were some issues in the data you entered:</h3>
                <ul class="ps-4">
                    @foreach($errors->all() as $message)
                        <li class="text-red-600"> &#8226; {{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex flex-col lg:flex-row" action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div dir="rtl" class="flex flex-col lg:w-1/2">
                            @include('partials.review.article', compact('article'))
                        </div>
                        <div dir="rtl" class="flex flex-col lg:w-1/2 px-8 h-screen overflow-scroll">
                            @include('partials.review.questions', compact('article'))
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
