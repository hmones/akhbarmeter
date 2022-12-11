@if(app()->getLocale() == 'ar')
    <a href="{{optional(Route::current())->uri . '?lang=en'}}" class="font-['Inter']">English</a>
    <img src="{{asset('images/icons/us-flag.png')}}" class="w-auto h-6" alt="US Flag"/>
@else
    <a href="{{optional(Route::current())->uri . '?lang=ar'}}" class="font-['Cairo']">عربي</a>
    <img src="{{asset('images/icons/eg-flag.png')}}" class="w-auto h-6" alt="Egyptian Flag"/>
@endif
