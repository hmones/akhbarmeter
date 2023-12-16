@props(['isColoredNavigation' => false])

<section class="hidden lg:block bg-gray-900 text-white py-2 z-10">
    <div class="container mx-auto">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row space-x-9 rtl:space-x-reverse">
                @foreach(translate('navigation.top') as $item)
                    <a href="{{data_get($item, 'link')}}">{{data_get($item, 'text')}}</a>
                @endforeach
            </div>
            <div class="flex flex-row space-x-4 rtl:space-x-reverse items-center">
                @include('partials.components.social-media-links')
            </div>
        </div>
    </div>
</section>

@php
    // Navigation is not colored
    $desktopMenuClasses = $isColoredNavigation ? 'px-4 bg-gradient-to-r from-blue-700 to-cyan-700 border-none text-white' : 'px-4 border-b-2 lg:bg-white';
    $backgroundColor = isset($backgroundColor) ? 'bg-blue-900' : '';
    $backgroundColor = $isColoredNavigation ? $backgroundColor : '';
    $logoColor = $isColoredNavigation ? 'light' : 'dark';
    $logoLanguage = app()->getLocale();
    $logo = "logo-$logoColor-$logoLanguage.svg";
@endphp

<section id="mainMenu" class="{{$desktopMenuClasses}}">
    <nav class="relative container mx-auto py-6">
        <div class="flex space-x-10 justify-between items-center rtl:space-x-reverse">
            <div class="flex">
                <a
                    href="{{route('home')}}"
                    class="h-6 bg-auto bg-no-repeat"
                    style="width: 170px; height: 21px; background-image: url('/images/{{$logo}}')">
                    &nbsp;
                </a>
            </div>
            <div class="hidden lg:flex container items-center justify-between">
                <div class="flex flex-row space-x-8 rtl:space-x-reverse">
                    <x-navigation-links :isColoredNavigation="$isColoredNavigation"/>
                </div>

                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    @include('partials.components.language-switcher')
                    @if(auth()->check())
                        <a href="{{route('dashboard')}}" class="{{$isColoredNavigation ? 'text-white' : 'text-blue-700'}}">
                            {{translate('navigation.main.welcome.text')}}, {{auth()->user()?->name}}
                        </a>
                        <form id="logout_form" method="POST" action="{{route('logout')}}">
                            @csrf
                            <em id="logout_button" class="fa fa-sign-out {{$isColoredNavigation ? 'text-white' : 'text-gray-500'}} cursor-pointer">
                            </em>
                            <script>
                                $('#logout_button').on('click', () => {
                                    $('#logout_form').submit();
                                })
                            </script>
                        </form>
                    @else
                        <a href="{{route('login')}}" class="{{$isColoredNavigation ? 'bg-white text-gray-500' : 'bg-blue-600 text-white'}} py-2 px-8 rounded hover:bg-blue-800">
                            {{translate('navigation.main.login.text')}}
                        </a>
                    @endif
                </div>
            </div>
            <div id="mobileMenuButton"
                 class="flex lg:hidden {{ $isColoredNavigation ? 'text-white' : 'text-black' }} cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"/>
                </svg>
            </div>
        </div>
    </nav>
</section>
<section id="mobileMenu" class="hidden border-b-2 shadow-md">
    <div class="container flex flex-col justify-center items-center mx-auto space-y-6 py-6">
        <x-navigation-links :isColoredNavigation="$isColoredNavigation"/>
        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
            @include('partials.components.language-switcher')
        </div>
        <a href="{{route('login')}}" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">
            {{translate('navigation.main.login.text')}}
        </a>
    </div>
</section>

