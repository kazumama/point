<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>charge</title>
    </head>
    <body>
        <form action="/points" method="POST">
            @csrf
            <h2>カード選択</h2>
                <select name="point[card_id]">
                    @foreach($cards as $card)
                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                    @endforeach
                </select>
            <div>
                <input type="text" name="point[point_charge]" placeholder="0"/>Point
            </div>    
            <input type="submit" value="pointcharge"/>
        </form>
        <div class="footer">
            <a href="/index">戻る</a>
        </div>
    </body>
</html>