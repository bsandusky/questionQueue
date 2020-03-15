<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div class="container">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
            Question show
        </div>
    </body>
</html>
