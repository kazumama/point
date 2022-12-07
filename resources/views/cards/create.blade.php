<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Cardcreate</title>
    </head>
    <body>
        <h1>カードの追加</h1>
        <form action="/cards" method="POST" enctype="multipart/form-date">
            @csrf
            <div>
                <h2>カード選択</h2>
                <select name="card[card_id]">
                    @foreach($cards as $card)
                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
               
                   <input type="file" name="barcode_path">
                   <button>画像をアップロード</button>
               
            </div>    
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>