@props(['title' => 'Best last month', 'score'])
<div class="flex flex-col items-center space-y-3">
    <div class="text-xs leading-4 font-semibold uppercase">{{$title}}</div>
    <img class="w-28"
         src="{{empty($score?->publisher?->image) ? asset('images/placeholders/publisher.png') : Storage::url($score->publisher->image)}}"
         alt="{{$score?->publisher?->name}}"/>
    <x-trend :score="$score?->score ?? 100" :isTrending="$score?->is_trending ?? 1"/>
    <div class="text-xs leading-4 font-normal text-center">
        {{translate('components.home.rank.hint')}}
    </div>
</div>
