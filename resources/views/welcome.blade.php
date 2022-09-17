<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AkhbarMeter</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="flex flex-col h-screen justify-between">
    @include('partials.navigation')
    <main class="mb-auto">
        @yield('content')
    </main>
    @include('partials.footer')
</div>
</body>
</html>
