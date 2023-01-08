@props(['isHomePage', 'isColoredNavigation'])

<section class="hidden lg:block bg-gray-900 text-white py-2 z-10">
    <div class="container">
        <div class="flex flex-row justify-content-between">
            <div class="flex flex-row rtl:flex-row-reverse space-x-9 rtl:space-x-reverse">
                @foreach(translate('navigation.top') as $item)
                    <a href="{{data_get($item, 'link')}}">{{data_get($item, 'text')}}</a>
                @endforeach
            </div>
            <div class="col-5 space-x-4 d-flex justify-content-end rtl:space-x-reverse">
                @include('partials.components.social-media-links')
            </div>
        </div>
    </div>
</section>

@php
    $backgroundColor = isset($backgroundColor) ? 'bg-blue-900' : 'bg-gradient-to-r from-blue-700 to-cyan-700'
@endphp
@php
    $lightLogo = app()->getLocale() === 'en' ? 'logo-light.svg' : 'logo-light-ar.svg';
    $desktopLogo = $isHomePage ? $lightLogo : 'logo-dark.svg';
    $mobileLogo = $isColoredNavigation ? $lightLogo : 'logo-dark.svg';
@endphp

<section id="mainMenu"
         class="
          {{$isColoredNavigation ? 'border-none lg:bg-white lg:border-b-2 lg:border-solid ' . $backgroundColor : 'border-b-2'}}
          lg:bg-none {{$isHomePage ? 'text-white' : ''}}">
    <nav class="relative container mx-auto py-6">
        <div class="flex space-x-10 justify-between items-center rtl:space-x-reverse">
            <div class="flex">
                <a
                    href="{{route('home')}}"
                    class="bg-[url('/images/{{$mobileLogo}}')] lg:bg-[url('/images/{{$desktopLogo}}')]
                    h-6 bg-auto
                     bg-no-repeat"
                    style="width: 170px; height: 21px;">
                    &nbsp;
                </a>
            </div>
            <div class="hidden lg:flex container items-center justify-between">
                <div class="flex flex-row rtl:flex-row-reverse space-x-8 rtl:space-x-reverse">
                    <x-navigation-links :isHomePage="$isHomePage"/>
                </div>

                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    @include('partials.components.language-switcher')
                    @if(auth()->check())
                        <a href="{{route('dashboard')}}" class="{{$isHomePage ? 'text-white' : 'text-blue-700'}}">
                            {{translate('navigation.main.welcome.text')}}, {{auth()->user()?->name}}
                        </a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <em class="fa fa-sign-out {{$isHomePage ? 'text-white' : 'text-gray-500'}} cursor-pointer"
                               onclick="event.preventDefault();this.closest('form').submit();">
                            </em>
                        </form>
                    @else
                        <a href="{{route('login')}}" class="{{$isHomePage ? 'bg-white text-gray-500' : 'bg-blue-600 text-white'}} py-2 px-8 rounded hover:bg-blue-800">
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
        <x-navigation-links :isHomePage="$isHomePage"/>
        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
            @include('partials.components.language-switcher')
        </div>
        <a href="{{route('login')}}" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">
            {{translate('navigation.main.login.text')}}
        </a>
    </div>
</section>
