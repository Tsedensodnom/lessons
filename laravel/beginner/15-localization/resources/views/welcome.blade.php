<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <ul>
            <li>{{ trans('messages.welcome') }}</li>
            <li>{{ trans('messages.about') }}</li>
            <li>{{ trans('messages.services') }}</li>
            <li>{{ trans('messages.contact') }}</li>
        </ul>
        <hr>
        <a href="{{ url('setlocale/mn') }}">Mongolian</a> | 
        <a href="{{ url('setlocale/en') }}">English</a>
    </body>
</html>
