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
        <h1>
            @isset
            <img src="{{ $card->image_path }}" alt="">
            @endisset
        </h1>
        <h2>
            @isset($barcode)
            <img src="{{ $barcode->barcode_path }}" alt="">     
            @endisset
        </h2>
        <div>
            {{ $card->name }} {{$point->charge}}
        </div>
        <a href='/points/charge'>ポイントの追加</a>
        <div>近くの店を探す</div>
        <div class="footer">
            <a href="/index">戻る</a>
        </div>
    </body>
</html>