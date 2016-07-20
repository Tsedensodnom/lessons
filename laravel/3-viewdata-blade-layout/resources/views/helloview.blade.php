<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
                font-weight: 400;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ $title }}</div>
                <div class="content">{{ $content }}</div>
                <p>
                    Random count: {{ $count }}
                </p>
            </div>
        </div>
    </body>
</html>
