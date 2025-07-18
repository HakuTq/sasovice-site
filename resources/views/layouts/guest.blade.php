<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Šašovice</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <script src="https://unpkg.com/@panzoom/panzoom@4.5.1/dist/panzoom.min.js"></script>
</head>
<body>
    <x-navbar/>
    
    <main class="main-content">
        @yield('content')
    </main>
    
    <x-footer/>
</body>
</html>