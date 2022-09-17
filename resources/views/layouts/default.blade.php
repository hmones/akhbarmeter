<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AkhbarMeter</title>
    <base href=".">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}" type="application/javascript"></script>
    <script src="{{asset('js/app.js')}}" type="application/javascript"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="flex flex-col h-screen justify-between">
    @include('partials.navigation')
    <main class="container mb-auto mx-auto py-6">
        @yield('content')
    </main>
    @include('partials.footer')
</div>
</body>
</html>
