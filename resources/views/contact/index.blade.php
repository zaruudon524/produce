@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 <title>Museum</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>お問い合わせ</h1></br>
        <form action="/mail" method="POST">
            <div class="name">
                <h2>お名前 必須</h2>
                <input type="text" name="user[name]"  value="{{ old('user.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
            </div>
            <div class="mail">
                <h2>メールアドレス　必須</h2>
                <input type="text" name="user[mail]"  value="{{ old('user.mail') }}"/>
                <p class="mail__error" style="color:red">{{ $errors->first('user.mail') }}</p>
            </div>
            <div class="mail">
                <h2>お問い合わせ内容　必須</h2>
                <textarea name="contents">{{ old('contents') }}</textarea>
                <p class="contents__error" style="color:red">{{ $errors->first('contents') }}</p>
            </div>
            <div class="confirm">[<a href="/confirm">確認画面へ</a>]</div>
        <!--<input type="submit" value="確認画面へ"/>-->
        </form>
    </body>
</html>
 @endsection