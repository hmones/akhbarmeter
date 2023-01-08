@props(['score' => 100])

@php
    $halfCircles = (int)(($score % 20) !== 0);
    $fullCircles = (int)($score / 20);
    $emptyCircles = 5 - $fullCircles - $halfCircles;
    $color = ($score <= 30) ? '#EF4444' : ($score <= 80 ? '#FBBF24' : '#10B981');
@endphp

<div {{$attributes->merge(['class' => 'flex flex-row space-x-1 items-center rtl:space-x-reverse'])}}>
    <span class="leading-4 font-normal">{{$score}}%</span>
    @if($fullCircles > 0)
        @foreach(range(1, $fullCircles) as $count)
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="8" r="7" stroke="{{$color}}" stroke-width="2"/>
                <circle cx="8" cy="8" r="4" fill="{{$color}}"/>
            </svg>
        @endforeach
    @endif
    @if($halfCircles > 0)
        @foreach(range(1, $halfCircles) as $count)
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="8" r="7" stroke="{{$color}}" stroke-width="2"/>
                <path
                    d="M8 12C6.93913 12 5.92172 11.5786 5.17157 10.8284C4.42143 10.0783 4 9.06087 4 8C4 6.93913 4.42143 5.92172 5.17157 5.17157C5.92172 4.42143 6.93913 4 8 4V8L8 12Z"
                    fill="{{$color}}"/>
            </svg>
        @endforeach
    @endif
    @if($emptyCircles > 0)
        @foreach(range(1, $emptyCircles) as $count)
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="8" r="7" stroke="{{$color}}" stroke-width="2"/>
            </svg>
        @endforeach
    @endif
</div>

