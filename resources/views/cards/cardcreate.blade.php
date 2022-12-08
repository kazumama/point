<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Cardcreate</title>
    </head>
    <body>
        <h1>カードの作成</h1>
        <form action="/cards" method="POST" enctype="multipart/form-date">
            @csrf
            <div class="text">
                <input type="text" name="card[name]" value="{{old('card.name')}}"/>
            </div>
            <div>
                   <input type="file" name="image_path">
            </div>    
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>