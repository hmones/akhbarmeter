<section id="topMenu" class="hidden md:block bg-gray-900">
    <nav class="relative container mx-auto bg-gray-900 py-2 text-white">
        <div class="flex items-center justify-between">
            <div class="flex space-x-10">
                <a href="#">Advertisement</a>
                <a href="#">Partnership</a>
                <a href="#">Contact us</a>
            </div>
            <div class="flex space-x-4">
                <a href="https://www.twitter.com/akhbarmeter" target="_blank">
                    <img src="{{asset('images/icons/twitter.svg')}}" alt="twitter icon">
                </a>
                <a href="https://www.reddit.com/akhbarmeter" target="_blank">
                    <img src="{{asset('images/icons/reddit.svg')}}" alt="reddit icon">
                </a>
                <a href="https://www.facebook.com/akhbarmeter" target="_blank">
                    <img src="{{asset('images/icons/facebook.svg')}}" alt="facebook icon">
                </a>
                <a href="mailto:info@akhbarmeter.org" target="_blank">
                    <img src="{{asset('images/icons/mail.svg')}}" alt="mail icon">
                </a>
            </div>
        </div>
    </nav>
</section>
<section id="mainMenu" class="border-b-2">
    <nav class="relative container mx-auto py-6">
        <div class="flex space-x-10 justify-between">
            <div class="flex">
                <img class="" src="{{asset('images/logo-dark.svg')}}" alt="AkhbarMeter"/>
            </div>
            <div class="hidden lg:flex container items-center justify-between">
                <div class="space-x-8">
                    <a href="#" class="hover:text-blue-600">Home</a>
                    <a href="#" class="hover:text-blue-600">About</a>
                    <a href="#" class="hover:text-blue-600">How it works</a>
                    <a href="#" class="hover:text-blue-600">Ranking</a>
                    <a href="#" class="hover:text-blue-600">News</a>
                    <a href="#" class="hover:text-blue-600">Academy</a>
                </div>

                <div class="flex items-center space-x-6">
                    <a href="#">عربي</a>
                    <img src="{{asset('images/icons/eg-flag.png')}}" class="w-auto h-6" alt="Egyptian Flag"/>
                    <a href="#" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">Login</a>
                </div>
            </div>
            <div id="mobileMenuButton" class="flex lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"/>
                </svg>
            </div>
        </div>
    </nav>
</section>
<section id="mobileMenu" class="hidden border-b-2 shadow-2xl lg:hidden">
    <div class="container flex flex-col justify-center items-center mx-auto space-y-6 py-6">
        <a href="#" class="hover:text-blue-600">Home</a>
        <a href="#" class="hover:text-blue-600">About</a>
        <a href="#" class="hover:text-blue-600">How it works</a>
        <a href="#" class="hover:text-blue-600">Ranking</a>
        <a href="#" class="hover:text-blue-600">News</a>
        <a href="#" class="hover:text-blue-600">Academy</a>
        <div class="flex flex-row space-x-4">
            <a href="#">عربي</a>
            <img src="{{asset('images/icons/eg-flag.png')}}" class="w-auto h-6" alt="Egyptian Flag"/>
        </div>
        <a href="#" class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800">Login</a>
    </div>
</section>

