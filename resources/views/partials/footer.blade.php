<section id="footer" class="bg-gray-900 ">
    <div class="container flex flex-col mx-auto space-y-10 py-10 text-white">
        <div class="flex flex-col lg:flex-row lg:justify-center items-center space-y-4 lg:space-y-0 rtl:space-x-reverse">
            @foreach(translate('footer.menu') as $item)
                <div class="px-0 lg:px-8">
                    <a href="{{data_get($item, 'link')}}">{{data_get($item, 'text')}}</a>
                </div>
            @endforeach
        </div>
        <img src="{{asset('images/ifcn_badge.png')}}" class="flex flex-wrap w-[110px] mx-auto" alt="AkhbarMeter IFCN badge"/>
        <div class="flex justify-center space-x-4 rtl:space-x-reverse">
            @include('partials.components.social-media-links')
        </div>
        <div class="flex justify-center">
            <p>&copy; {{now()->year}} {{translate('footer.copyrights')}}</p>
        </div>
    </div>
</section>
