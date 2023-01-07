@props(['title' => 'Best last month', 'publisher'])
<div class="flex flex-col items-center space-y-3">
    <div class="text-xs leading-4 font-semibold uppercase">{{$title}}</div>
    <img class="w-28"
         src="{{$publisher?->image ? Storage::url($publisher->image) : asset('images/placeholders/publisher.png')}}"
         alt="{{$publisher->name}}"/>
    <x-trend :score="$publisher->score" :isTrending="$publisher->is_trending"/>
    <div class="text-xs leading-4 font-normal text-center">Accuracy rank last month</div>
</div>
