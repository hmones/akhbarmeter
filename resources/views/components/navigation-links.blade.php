@props(['isHomePage' => false])

<a href="{{route('home')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">Home</a>
<a href="{{route('about')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">About</a>
<a href="{{route('methodology')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">How it works</a>
<a href="{{route('publishers.index')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">Ranking</a>
<a href="{{route('articles.index')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">News</a>
<a href="{{route('topics.index')}}" class="{{$isHomePage ? 'hover:text-gray-200' : 'hover:text-blue-600'}}">Academy</a>
