<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex flex-col lg:flex-row" action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col lg:w-1/2 px-8">
                            @include('partials.review.questions', compact('article'))
                        </div>
                        <div class="flex flex-col lg:w-1/2">
                            @include('partials.review.article', compact('article'))
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
