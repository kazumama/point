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
        <a href='/points/charge'>ポイントの追加</a>
        <div>
            @foreach($cards as $card)
            
                <div style='border:solid 1px; width: 400px; margin: 0 auto; margin-bottom: 10px;  text-align:center;  padding:20px 0; background-color: #00FF00; '>
                    <div>
                        <a href="/cards/{{$card->id}}">{{$card->name}}</a>
                        {{$card->point}}
                        
                    </div>
                </div>    
            @endforeach    
        </div>
    </body>
</html>