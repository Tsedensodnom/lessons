<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
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
                font-size: 96px;
            }
            
            .post {
                margin-bottom: 60px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Welcome to Ebulan Laravel lessons</div>
                @foreach ($posts as $post)
                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->excerpt }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
