@props(['score'])
<div class="flex flex-row space-x-2 rtl:space-x-reverse">
    <img class="w-16 h-16"
         src="{{$score?->publisher?->image ? Storage::url($publisher->image) : asset('images/placeholders/publisher.png')}}"
         alt="{{$score?->publisher?->name}}"/>
    <div class="flex flex-col space-y-1">
        <div>{{translate('components.home.rank.number')}} {{$score?->rank ?: 1}}</div>
        <x-trend :score="$score?->score ?: 100" :isTrending="$score?->is_trending ?: 1" percentageClasses="text-xl leading-7 font-semibold"/>
        <div class="text-xs leading-4 font-normal">{{translate('components.home.rank.hint')}}</div>
    </div>
</div>
