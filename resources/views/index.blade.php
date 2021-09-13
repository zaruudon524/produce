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
        
        
       
        <h1>投稿</h1>
        <div class='museums'>
           @if(Auth::user()->id === 1)
            <p class='create'>[<a href='/museums/create'>投稿作成</a>]</p>
           @endif 
        
        
            <!--博物館登録件数-->
             @if (count($museums) >0) 
                <p class='number'>全{{ $museums->total() }}件中</p>
                <!--データ領域にある、条件に一致するアイテムの総数-->
                {{  ($museums->currentPage() -1) * $museums->perPage() + 1}} - 
                {{ (($museums->currentPage() -1) * $museums->perPage() + 1) + (count($museums) -1)  }}件のデータが表示されています。</p>
                <!--現在の頁数*ページごとに表示するアイテム数-->
                @else
                <p>データがありません。</p>
            @endif
        
           @foreach($museums as $museum)
            <div class='museum'>
                <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
            </div>
            @endforeach
            {{ $museums->links() }}
        <div class="back">[<a href="/">back</a>]</div>
           
        </div>   
       </div>
       

    </body>
</html>
@include("layouts.footer" )
@endsection