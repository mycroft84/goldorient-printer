<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="/icon.png" type="image/png">

        @vite(['resources/css/app.css'])

        @livewireStyles
    </head>
    <body>

        @yield('content')

        @vite(['resources/js/app.js'])

        @livewireScripts

    </body>
</html>
