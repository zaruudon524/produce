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
        <h1>投稿</h1>
        @if(Auth::user()->id === 1)
            <p class='create'>[<a href='/reviews/create'>口コミ作成</a>]</p>
        @endif
       <div class='museums'>
          
           @foreach($museums as $museum)
            <div class='museum'>
                @if(isset($museum))
                <h2><a href="/review/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
                @endif
            </div>
            @endforeach
        
       </div>
    </body>
</html>
 @endsection