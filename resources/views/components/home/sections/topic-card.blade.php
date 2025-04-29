@props(['title', 'type'])
<div class="flex flex-col items-center space-y-3 w-full">
    <a href="{{ route('topics.index', ['type' => $type]) }}" class="w-full flex justify-center">
        @if($type == 'factSheet')
            <img class="w-[70%] h-24 object-cover" src="{{ asset('images/topic/badges/Factsheet.png') }}" alt="Lorem"/>
        @else
            <img class="w-[70%] h-24 object-cover" src="{{ asset('images/topic/badges/Explainer.png') }}" alt="Lorem"/>
        @endif
    </a>
</div>
