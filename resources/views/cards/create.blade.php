<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Cardcreate</title>
    </head>
    <body>
        <h1>カードの追加</h1>
        <form action="/cards" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>カード選択</h2>
                <select name="barcode[card_id]">
                    @foreach($cards as $card)
                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="file" name="barcode_path">
            </div>    
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/index">戻る</a>
        </div>
    </body>
</html>