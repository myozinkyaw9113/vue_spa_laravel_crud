<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel + Vue (SPA)</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            .line-right {
                border-right: 1px solid #ccc;
            }
            .line-bottom {
                border-bottom: 1px solid #ccc;
            }
        </style>
    </head>
    <body>

        <div id="app" class="container"></div>

    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
