<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ポイント管理</h1>
        <h2>カード一覧</h2>
        <div>
            @foreach ($cards as $card)
            <p>
                <a href="/cards/{{$card->id}}">{{$card->name}}</a>
            </p>
            @endforeach
        </div>
    </body>
</html>