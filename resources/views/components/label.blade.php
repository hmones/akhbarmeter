@props(['label'])

<div class="flex flex-row rounded-lg items-center justify-center text-center">
    <div class="bg-{{$label->color}}-500 p-2 rounded-l-lg border-2 border-solid border-{{$label->color}}-500">
        @if($label->color === 'red')
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle r="9" transform="matrix(-1 0 0 1 12.2441 12)" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <circle r="1.5" transform="matrix(-1 0 0 1 12.2441 12)" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.31902 10.0762C6.12202 10.6822 6.01302 11.3282 6.01302 12.0002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.3216 6.07653C10.9276 5.87953 11.5736 5.76953 12.2456 5.76953C15.6866 5.76953 18.4766 8.55953 18.4766 12.0005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.1855 10.9398L7.83555 7.58984" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        @elseif($label->color === 'orange' || $label->color === 'yellow')
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle r="9" transform="matrix(-1 0 0 1 12.2441 12)" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <circle r="1.5" transform="matrix(-1 0 0 1 12.2441 12)" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.5216 6.1875C16.613 6.95226 18.5954 9.30886 18.4753 12.0008" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.96666 6.1875C7.87529 6.95226 5.89287 9.30886 6.01299 12.0008" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.2441 10.4998V5.75977" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        @else
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12.2441" cy="12" r="9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12.2441" cy="12" r="1.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.1673 10.0762C18.3643 10.6822 18.4733 11.3282 18.4733 12.0002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.1687 6.07653C13.5627 5.87953 12.9167 5.76953 12.2447 5.76953C8.80367 5.76953 6.01367 8.55953 6.01367 12.0005" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.3047 10.9398L16.6547 7.58984" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        @endif
    </div>
    <div class="p-2 rounded-r-lg border-2 border-solid border-{{$label->color}}-500">
        {{$label->title}}
    </div>
</div>

