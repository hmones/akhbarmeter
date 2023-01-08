@props(['publisher'])
<div class="flex flex-row bg-gray-50 p-3 rounded-lg space-x-4 rtl:space-x-reverse">
    <img class="w-1/3 rounded-lg" src="{{Storage::url($publisher->image)}}" alt="{{$publisher->name}}" />
    <div class="flex flex-col space-y-2">
        <div class="text-xs leading-4 font-medium overflow-hidden">{{str($publisher->hashtags)->limit(50)}}</div>
        <div class="text-xl leading-8 font-semibold">Rank: No. {{$publisher->scores()->lastMonth()->first()?->rank ?? 1}}</div>
        <div class="text-base leading-6 font-normal">Last month Rating: {{$publisher->scores()->lastMonth()->first()?->score ?? 100}}%</div>
        <div class="text-base leading-6 font-normal">Last week Rating: {{$publisher->scores()->lastWeek()->first()?->score ??100}}%</div>
        <x-learn-more href="{{route('publishers.show', $publisher)}}" />
    </div>
</div>
