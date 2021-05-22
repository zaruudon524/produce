@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Museum</title>
    </head>
    
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
             <form action="/reviews/{{ $review->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__name'>
                    <h2>名前</h2>
                    <input type='text' name='review[name]' value="{{ $review->name }}">
                </div>
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='review[title]' value="{{ $review->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='review[body]' value="{{ $review->body }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
 @endsection