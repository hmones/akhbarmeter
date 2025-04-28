@props(['title', 'type'])
<div class="flex flex-col items-center space-y-3">
    <div class="text-xs leading-4 font-semibold uppercase">{{$title}}</div>
    <a href="{{ route('topics.index', ['type' => $type]) }}">
        @if($type == 'explainer')
            <img class="w-28" src="{{ asset('images/topic/badges/Explainer.png') }}" alt="Lorem"/>
        @else
            <img class="w-28" src="{{ asset('images/topic/badges/Factsheet.png') }}" alt="Lorem"/>
        @endif
    </a>
    <div class="text-xs leading-4 font-normal text-center">
        {{translate('components.home.rank.hint')}}
    </div>
</div>
