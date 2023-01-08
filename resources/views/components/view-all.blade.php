@props(['href' => '#'])
<div {{$attributes->merge(['class' => 'justify-center w-fit mx-auto'])}}>
    <a class="py-3 px-16 bg-blue-100 rounded text-blue-700 hover:bg-blue-200" href="{{$href}}">
        {{translate('general.view-all')}}
    </a>
</div>
