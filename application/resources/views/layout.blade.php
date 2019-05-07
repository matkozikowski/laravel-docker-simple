<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Application</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

    </head>
    <body>
        <div class="flex-center position-ref ">

            <div class="container">

                @yield('content')

            </div>

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="{{ asset('js/application.js') }}"></script>
    </body>
</html>
