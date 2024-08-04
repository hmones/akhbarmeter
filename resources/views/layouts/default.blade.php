<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ?? 'ar') }}" dir="{{app()->getLocale() !== 'en' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property='og:site_name' content='AkhbarMeter | أخبارميتر' />
    <meta name="application-name" content="AkhbarMeter | أخبارميتر">
    @yield('seo')
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.bunny.net/css2?family=Inter:400;600;700;800" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Cairo:400;600;700;800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <script src="{{asset('js/jquery.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/app.js')}}" type="application/javascript"></script>
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @if(app()->getLocale() !== 'en')
        <link rel="stylesheet" href="{{asset('css/app.rtl.css')}}">
    @endif
    @vite('resources/css/app.css')
    @stack('scripts')

    <!-- Browser and App icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('images/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    @if(request()->cookie('cookie_consent'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3DV4V13KYR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3DV4V13KYR');
    </script>
    @else
    {{--    Google tags are removed due to consent not approved    --}}
    @endif
</head>
<body>
<div class="flex flex-col h-full justify-between">
    <x-navigation :isColoredNavigation="$isColoredNavigation ?? false"/>
    <div class="mx-auto h-full w-full">
        @yield('content')
    </div>
    @include('cookie-consent::index')
    @include('partials.footer')
</div>
</body>
</html>
