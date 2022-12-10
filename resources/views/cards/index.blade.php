<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Top</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ポイント管理</h1>
        <h2>カード一覧</h2>
        <a href='/cards/create'>カードの追加</a>
        
        <div>
            @foreach ($cards as $card)
            <p>
                <a href="/cards/{{$card->id}}">{{$card->name}}</a>
                @foreach($card->points as $point)
                    {{ $point->point_charge}}
                @endforeach    
            </p>
            @endforeach
        </div>
    </body>
</html>