<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('asset/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <title>Students</title>

        <script src="{{ asset('asset/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('asset/js/popper.min.js') }}"></script>
        <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <App></App>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
