<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('title')
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="shortcut icon" href="/storage/assets/dnsc_logo.png" type="image/x-icon">
        @yield('css')
        @yield('css-page')
    </head>
    <body>
        @yield('content')
        @yield('js')
        @yield('js-page')
        <div id="loading">
            <div class="spinner"></div>
        </div>
    </body>
</html>