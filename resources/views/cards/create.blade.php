<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/cards" method="POST">
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
               <form action="/cloudinary" method="POST" enctype="multipart/form-date">
                   @csrf
                   <input type="file" name="barcode_path">
                   <button>画像をアップロード</button>
               </form>
            </div>    
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>