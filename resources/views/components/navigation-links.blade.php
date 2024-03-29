@props(['isColoredNavigation' => false])

@foreach(translate('navigation.main.menu') ?? [] as $item)
    <a href="{{data_get($item, 'link')}}" class="{{$isColoredNavigation ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">{{data_get($item, 'text')}}</a>
@endforeach
