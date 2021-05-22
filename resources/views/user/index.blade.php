<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 <title>Museum</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @if (Auth::check())
        <p>USER: {{ $user->name . ' (' . $user->email . ')' }}</p>
        @else
        <p>＊ログインにしていません。(<a href="/login">ログイン</a>
        <a href="/register">登録</a>)</p>
        @endif
    </body>
</html>
