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
           <form action="/public/search" method="POST">
               @csrf
                <input name="search" type="text" placeholder="キーワードを入力" value={{$search}}>
                <button type="submit">検索</button>
           </form>
            @if($search)
                @foreach($museums as $museum)
                    <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                    <p class='place'>場所</p>
                    <p class='place'>{{ $museum->place }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museum->body }}</p>
                @endforeach
            @else
                <a href="/public/search"></a>
            @endif
        </div>   
           <div class="show">[<a href="/public">一覧</a>]</div>
        </div>   
         </div>   
       </div>
    </body>
</html>
@endsection