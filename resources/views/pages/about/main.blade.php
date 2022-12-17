@extends('layouts.default', ['isColoredNavigation' => true, 'backgroundColor' => true])
@section('title')
    About
@endsection
@section('content')
    <style>
        .radial-blue-background {
            background: radial-gradient(at 80% 50%, rgb(6, 182, 212) 10%, rgb(30, 58, 138) 70%);
            background-position: right !important;
        }
    </style>
    <div class="h-fit bg-blue-900 py-10 md:py-20 radial-blue-background text-white">
        <div class="container">
            <div class="flex flex-col space-y-4">
                <div class="flex flex-row">
                    <div class="text-lg leading-7 font-bold md:text-4xl md:leading-10 md:font-extrabold">
                        Who we are
                    </div>
                </div>
                <div class="flex flex-row text-sm leading-8 font-normal md:text-xl">
                    This text can be a short text that would explain what the brand will be like and how to show people who we are but without any explansions.
                </div>
            </div>
        </div>

        <div class="container my-10 md:my-20">
            <div class="flex flex-col md:flex-row justify-between space-y-6 md:space-y-0 md:space-x-6">
                <div class="flex flex-col md:w-1/3 bg-gray-100 text-black rounded p-4 space-y-2 md:space-y-4">
                    <div class="flex flex-row">
                        <svg viewBox="0 0 97 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 md:w-[97px]">
                            <rect x="0.244141" width="96" height="96" rx="48" fill="#DBEAFE"/>
                            <path d="M61.5833 37.3293L66.9315 37.342C69.8733 37.349 72.2544 39.7358 72.2544 42.6776V66.6749C72.2544 69.6216 69.8656 72.0104 66.9188 72.0104V72.0104C63.9721 72.0104 61.5833 69.6216 61.5833 66.6749V31.9938C61.5833 29.047 59.1945 26.6582 56.2477 26.6582H29.5699C26.6232 26.6582 24.2344 29.047 24.2344 31.9938V66.6749C24.2344 69.6216 26.6232 72.0104 29.5699 72.0104H66.9188" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M52.2448 61.3378H33.5703" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M52.2448 53.3358H33.5703" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="33.5703" y="37.3281" width="18.6744" height="8.00333" rx="0.5" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                        Media Meter
                    </div>
                    <div class="flex flex-row text-sm md:text-xl leading-7 font-normal text-gray-500">
                        AkhbarMeter (MediaMeter) is one of the first dynamic digital media observatories in Egypt and...
                    </div>
                    <a href="{{route('akhbarmeter')}}" class="flex flex-row text-sm md:text-base leading-6 font-medium text-blue-600">
                        Learn more ⟶
                    </a>

                </div>
                <div class="flex flex-col md:w-1/3 bg-gray-100 text-black rounded p-4 space-y-2 md:space-y-4">
                    <div class="flex flex-row">
                        <svg viewBox="0 0 97 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 md:w-[97px]">
                            <rect x="0.244141" width="96" height="96" rx="48" fill="#DBEAFE"/>
                            <path d="M44.525 51.7944C45.8837 53.153 45.8837 55.3558 44.525 56.7145C43.1664 58.0731 40.9636 58.0731 39.6049 56.7145C38.2463 55.3558 38.2463 53.153 39.6049 51.7944C40.9636 50.4357 43.1664 50.4357 44.525 51.7944" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M46.5901 39.9002L48.9376 40.6835C49.4752 40.8627 49.8387 41.367 49.8387 41.9328V44.183C49.8387 45.4605 50.8602 46.505 52.1376 46.5331L54.2675 46.5792C54.7565 46.5894 55.1968 46.8685 55.417 47.3062L56.5229 49.5181C56.7763 50.025 56.6765 50.6368 56.2771 51.0387L54.6848 52.6285C53.7811 53.5322 53.7658 54.9939 54.649 55.9155L56.121 57.4541C56.4589 57.8074 56.5741 58.3168 56.4179 58.7802L55.6346 61.1277C55.4554 61.6653 54.9511 62.0288 54.3853 62.0288H52.1351C50.8576 62.0288 49.8131 63.0502 49.785 64.3277L49.7389 66.4576C49.7287 66.9466 49.4496 67.3869 49.0119 67.607L46.8 68.713C46.2931 68.9664 45.6813 68.8666 45.2794 68.4672L43.6896 66.8749C42.7859 65.9712 41.3242 65.9558 40.4026 66.839L38.864 68.311C38.5107 68.649 38.0013 68.7642 37.5379 68.608L35.1904 67.8246C34.6528 67.6454 34.2893 67.1411 34.2893 66.5754V64.3251C34.2893 63.0477 33.2679 62.0032 31.9904 61.975L29.8631 61.929C29.3741 61.9187 28.9338 61.6397 28.7136 61.2019L27.6077 58.9901C27.3543 58.4832 27.4541 57.8714 27.8535 57.4694L29.4458 55.8797C30.3495 54.976 30.3648 53.5142 29.4816 52.5926L28.0096 51.0541C27.6717 50.7008 27.5565 50.1914 27.7127 49.728L28.496 47.3805C28.6752 46.8429 29.1795 46.4794 29.7453 46.4794H31.9955C33.273 46.4794 34.3175 45.4579 34.3456 44.1805L34.3917 42.0506C34.4019 41.5616 34.681 41.1213 35.1187 40.9011L37.3306 39.7952C37.8375 39.5418 38.4493 39.6416 38.8512 40.041L40.441 41.6333C41.3447 42.537 42.8064 42.5523 43.728 41.6691L45.2666 40.1971C45.6147 39.8618 46.1267 39.7466 46.5901 39.9002Z" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M65.1524 42.6442L67.1902 42.0963C67.6023 41.9863 67.9121 41.6432 67.9812 41.2208L68.3678 38.8426C68.4804 38.1539 69.0206 37.6138 69.7092 37.5011L72.0849 37.1146C72.5073 37.0455 72.8503 36.7357 72.9604 36.3235L73.5082 34.2858C73.6183 33.8711 73.4775 33.4333 73.1447 33.1619L71.2785 31.6362C70.7383 31.1933 70.5412 30.456 70.787 29.8032L71.6446 27.5453C71.7956 27.1459 71.7009 26.6928 71.3962 26.3907L69.9038 24.9008C69.6017 24.5987 69.1486 24.5015 68.7492 24.6525L65.4007 25.9223L63.1377 23.1523C62.8663 22.8195 62.426 22.6787 62.0138 22.7888L59.9761 23.3367C59.5639 23.4467 59.2542 23.7898 59.185 24.2122L58.7985 26.5904C58.6858 27.2791 58.1457 27.8192 57.457 27.9319L55.0814 28.3184C54.659 28.3875 54.3159 28.6973 54.2058 29.1095L53.658 31.1472C53.5479 31.5594 53.6887 31.9997 54.019 32.2711L55.8826 33.7943C56.4228 34.2371 56.6199 34.9744 56.3716 35.6272L55.514 37.8851C55.363 38.2845 55.4577 38.7376 55.7623 39.0397L57.2548 40.5322C57.5569 40.8343 58.01 40.9315 58.4094 40.7805L60.6698 39.9229C61.3226 39.6746 62.0599 39.8743 62.5002 40.4144L64.026 42.2807C64.2999 42.6135 64.7402 42.7543 65.1524 42.6442V42.6442Z" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                        How it works?
                    </div>
                    <div class="flex flex-row text-sm md:text-xl leading-7 font-normal text-gray-500">
                        The team evaluate news articles by answering a series of questions (19 questions) that are availa...
                    </div>
                    <a href="{{route('methodology')}}" class="flex flex-row text-sm md:text-base leading-6 font-medium text-blue-600">
                        Learn more ⟶
                    </a>
                </div>
                <div class="flex flex-col md:w-1/3 space-y-6">
                    <div class="flex flex-row bg-gray-100 text-black rounded p-4">
                        <div class="flex flex-col space-y-2 md:space-y-12">
                            <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                                Our Partners
                            </div>
                            <a href="{{route('akhbarmeter')}}#partners" class="flex flex-row text-sm md:text-base leading-6 font-medium text-blue-600">
                                Learn more ⟶
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-row bg-gray-100 text-black rounded p-4">
                        <div class="flex flex-col space-y-2 md:space-y-12">
                            <div class="flex flex-row text-lg leading-8 font-semibold md:text-4xl md:leading-10 md:font-extrabold">
                                Contact Us
                            </div>
                            <a href="{{route('contact.index')}}" class="flex flex-row text-sm md:text-base leading-6 font-medium text-blue-600">
                                Learn more ⟶
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
