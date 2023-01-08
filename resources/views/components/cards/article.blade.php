@props(['article', 'showTotalScore' => true])

<x-card :title="$article->title" :time="$article->created_at->diffForHumans()"
        :show="route('articles.show', $article->id)"
        :tags="array_filter(preg_split('/[#\s]/', $article->publisher->hashtags))"
        route="articles.index">
    <x-slot:image>
        <a href="{{route('articles.show', $article->id)}}">
            <div
                class="w-full h-[266px] bg-[url('{{$article->image ? Storage::url($article->image) : asset('images/placeholders/article.png')}}')] bg-cover bg-center bg-no-repeat rounded-t-lg">
            </div>
        </a>
    </x-slot:image>
    <x-slot:icon>
        <img class="w-[32px] rounded-circle"
             src="{{$article->publisher->image ? Storage::url($article->publisher->image) : asset('images/placeholders/publisher.png')}}"
             alt="{{$article->title}}">
    </x-slot:icon>
    <x-slot:footer>
        <x-cards.article-footer :article="$article" :show="route('articles.show', $article->id)" :showTotalScore="$showTotalScore"/>
    </x-slot:footer>
</x-card>
