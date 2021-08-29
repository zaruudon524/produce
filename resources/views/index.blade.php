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
        <h1>ホーム</h1>
        <!--<p class='create'>[<a href='/reviews/create'>create</a>]</p>-->
        
        
       <div class=search>
           <!--<form action="/reviews" method="POST">-->
           <!--<input name="search" type="text" placeholder="キーワードを入力" value=" ''}}">-->
           <!--<button type="submit">検索</button>-->
           <!--</form>-->
            <h1>投稿</h1>
       <div class='museums'>
           @if(Auth::user()->id === 1)
            <p class='create'>[<a href='/museums/create'>投稿作成</a>]</p>
           @endif 
            
            <!--博物館登録件数-->
            @foreach($allnumbers as $allnumber)
            @endforeach
            <p class='number'>全{{ $allnumbers->id }}件</p>
        
           @foreach($museums as $museum)
            <div class='museum'>
                <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
            </div>
            @endforeach
            
        <div class="back">[<a href="/">back</a>]</div>
           
        </div>   
       </div>
       {{ $museums->links() }}

    </body>
</html>
@include("layouts.footer" )
@endsection