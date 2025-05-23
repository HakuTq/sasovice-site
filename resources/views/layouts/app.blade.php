<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Šašovice'))</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @hasSection('header')
                <header>
                    <div>
                        @yield('header')
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <x-navbar/>
                @yield('content')
            </main>
        </div>
    </body>
</html>
