<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>charge</title>
    </head>
    <body>
        <form action="/points" method="POST">
            @csrf
            <div>
                <input type="text" point_charge="points[point_charge]" placeholder="0円"/>
            </div>    
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>