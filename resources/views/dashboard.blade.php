<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl text-gray-500 mt-4 mb-8">
                        Articles pending review:
                    </div>
                    <div class="flex flex-col space-y-6">
                        @forelse($unReviewedArticles as $article)
                            <div class="flex flex-row justify-between items-center">
                                <div class="flex flex-col">
                                    <div class="flex flex-row items-center space-x-4">
                                        <span class="px-4 py-4"> <em class="fa fa-check-circle text-gray-400 text-2xl"></em></span>
                                        <span>{{$article->title}}</span>
                                        <span
                                            class="text-gray-500 text-sm">{{$article->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <a href="{{route('reviews.edit', $article)}}"
                                       class="bg-blue-700 px-4 py-2 hover:bg-blue-600 text-white">
                                        Review
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-800 mx-4">
                                No articles are currently assigned to you, please inform your manager to assign new articles to you
                            </div>
                        @endforelse
                    </div>

                    <div class="text-xl text-gray-500 mt-8 mb-4">
                        Reviewed articles:
                    </div>
                    <div class="flex flex-col space-y-6">
                        @forelse($reviewedArticles as $article)
                            <div class="flex flex-row justify-between items-center">
                                <div class="flex flex-col">
                                    <div class="flex flex-row items-center space-x-4">
                                        <span class="px-4 py-4"> <em class="fa fa-check-circle text-green-600 text-2xl"></em></span>
                                        <a href="#">{{$article->title}}</a>
                                        <span
                                            class="text-gray-500 text-sm">{{$article->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <a href="{{route('reviews.edit', $article)}}"
                                       class="bg-blue-700 px-4 py-2 hover:bg-blue-600 text-white">
                                        Edit Review
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-800">
                                No articles are currently assigned to you, please inform your manager to assign new articles to you
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
