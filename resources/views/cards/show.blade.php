<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cards</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $card->name }}
        </h1>
        <h2 class="title">
            {{ $card->barcode_path }}    
        </h2>
        <div>
            {{ $card->name }}
        </div>
        <a href='/points/charge'>ポイントの追加</a>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>