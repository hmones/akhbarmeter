@props(['publisher'])
<div class="flex flex-row space-x-2">
    <img class="w-16 h-16"
         src="{{$publisher->image ? Storage::url($publisher->image) : asset('images/placeholders/publisher.png')}}"
         alt="{{$publisher->name}}"/>
    <div class="flex flex-col space-y-1">
        <div>No. {{$publisher->rank}}</div>
        <x-trend :score="$publisher->score" :isTrending="$publisher->is_trending" percentageClasses="text-xl leading-7 font-semibold"/>
        <div class="text-xs leading-4 font-normal">Accuracy rank</div>
    </div>
</div>
