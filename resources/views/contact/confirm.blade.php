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
        <h1>お問い合わせ内容確認</h1></br>
        <div class='posts'>
            @foreach ($contacts as $contact)
                <div class='contact'>
                    <p class='name'>{{ $contact->name }}</p>
                    <p class='mail'>{{ $contact->mail }}</p>
                    <p class='contents'>{{ $contact->contents }}</p>
                </div>
            @endforeach
        </div>
            <button name="action" type="submit" value="return" class="btn btn-dark">入力画面に戻る</button>
            <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
        </div>
    </body>
</html>
 @endsection