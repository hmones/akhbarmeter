@props(['href', 'text' => translate('general.learn-more')])

<a href="{{$href}}" class="flex flex-row text-sm md:text-base leading-6 font-medium text-blue-600">
    {{$text}} {{app()->getLocale() === 'en' ? '⟶' : '←'}}
</a>
