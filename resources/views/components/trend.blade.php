@props(['score', 'isTrending', 'percentageClasses' => 'text-3xl leading-9 font-bold'])

<div class="flex flex-row items-center space-x-2">
    @if($isTrending)
        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.4395 10V10C19.4395 14.971 15.4105 19 10.4395 19V19C5.46845 19 1.43945 14.971 1.43945 10V10C1.43945 5.029 5.46845 1 10.4395 1V1C15.4105 1 19.4395 5.029 19.4395 10Z" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10.4395 6V14" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.43945 9L10.4395 6L13.4395 9" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div class="{{$percentageClasses}} text-green-500">{{$score}}%</div>
    @else
        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43945 10V10C1.43945 5.029 5.46845 1 10.4395 1V1C15.4105 1 19.4395 5.029 19.4395 10V10C19.4395 14.971 15.4105 19 10.4395 19V19C5.46845 19 1.43945 14.971 1.43945 10Z" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10.4395 14V6" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13.4395 11L10.4395 14L7.43945 11" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div class="{{$percentageClasses}} text-red-500">{{$score}}%</div>
    @endif
</div>
