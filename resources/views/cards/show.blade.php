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
            <img src="{{ $card->image_path }}" alt="">
        </h1>
        <h2>
            @isset($barcode)
            <img src="{{ $barcode->barcode_path }}" alt="">     
            @endisset
        </h2>
        <div>
            {{ $card->name }} {{$point->charge}}P {{ $exp->point_expiration->format('Y/m/d') }}
        </div>
        <a href='/points/charge'>ポイントの追加</a>
        <a href='/cards/shop'>近くの店を探す</a>
        <div class="footer">
            <a href="/index">戻る</a>
        </div>
    </body>
</html>