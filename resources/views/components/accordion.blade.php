@props(['headline' => '', 'description' => ''])
<div class="bg-white md:mx-8 md:border md:border-gray-200 rounded-lg md:px-6">
    <div class="flex flex-row px-2 py-4 rounded items-center">
        <div class="flex flex-col w-4/5">
            <div class="text-lg leading-8 font-semibold md:text-xl md:leading-7 md:font-bold">
                {{$headline}}
            </div>
        </div>
        <div class="flex flex-col w-1/5 cursor-pointer accordion-button md:items-end">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2441 2V20M2.24414 11H20.2441" stroke="#14142B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
    <div class="flex flex-col content px-2 pb-4 text-sm leading-5 font-normal text-gray-500 md:text-base md:leading-6" style="display: none;">
        {{$description}}
    </div>
</div>

