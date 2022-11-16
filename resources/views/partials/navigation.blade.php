<section class="hidden lg:block bg-gray-900 text-white py-2">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-7 space-x-9">
                <a href="#">Advertisement</a>
                <a href="#">Partnership</a>
                <a href="{{route('contact.index')}}">Contact us</a>
            </div>
            <div class="col-5 space-x-4 d-flex justify-content-end">
                @include('partials.components.social-media-links')
            </div>
        </div>
    </div>
</section>

<section id="mainMenu" class="border-none lg:border-b-2 bg-gradient-to-r from-blue-700 to-cyan-700 lg:bg-none">
    <nav class="relative container mx-auto py-6">
        <div class="flex space-x-10 justify-between items-center">
            <div class="flex">
                <a
                    href="{{route('home')}}"
                    class="bg-[url('/images/logo-light.svg')] lg:bg-[url('/images/logo-dark.svg')] h-6 bg-auto
                     bg-no-repeat"
                    style="width: 170px; height: 19px;">
                    &nbsp;
                </a>
            </div>
            <div class="hidden lg:flex container items-center justify-between">
                <div class="space-x-8">
                    <a href="{{route('home')}}" class="hover:text-blue-600">Home</a>
                    <a href="#" class="hover:text-blue-600">About</a>
                    <a href="#" class="hover:text-blue-600">How it works</a>
                    <a href="#" class="hover:text-blue-600">Ranking</a>
                    <a href="#" class="hover:text-blue-600">News</a>
                    <a href="#" class="hover:text-blue-600">Academy</a>
                </div>

                <div class="flex items-center space-x-6">
                    @include('partials.components.language-switcher')
                    <a href="{{route('login')}}" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">Login</a>
                </div>
            </div>
            <div id="mobileMenuButton" class="flex lg:hidden text-white cursor-pointer">
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
        <a href="{{route('home')}}" class="hover:text-blue-600">Home</a>
        <a href="#" class="hover:text-blue-600">About</a>
        <a href="#" class="hover:text-blue-600">How it works</a>
        <a href="#" class="hover:text-blue-600">Ranking</a>
        <a href="#" class="hover:text-blue-600">News</a>
        <a href="#" class="hover:text-blue-600">Academy</a>
        <div class="flex flex-row space-x-4">
            @include('partials.components.language-switcher')
        </div>
        <a href="{{route('login')}}" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">Login</a>
    </div>
</section>

