@extends('layouts.app')

@section('content')
        <h1>ホーム</h1>

        <!--検索-->
        
           
            
            <form action="/" method="GET">
                @csrf
            <select id="place" name="museum[place]" value="{{ old('museum.place') }}">
                    @foreach($places as $place)
                        <option value=""hidden>都道府県</option>
                        <option value={{ $place->place_id }}>{{$place->name}}</option>
                    @endforeach
            </select><br>
            
            <select id="body" name="museum[body]" value="{{ old('museum.body') }}">
                    @foreach($bodies as $body)
                        <option value=""hidden>館種</option>
                        <option value={{ $body->body_id }}>{{$body->index}}</option>
                    @endforeach
            </select><br>
            
            <input type="submit" value="検索"/>
            
            </form>
            
            <div>
            
            </div>
            
           
           
           <!--museumcreate-->
            @if(Auth::user()->id === 1)
                <p class='create'>[<a href='/museums/create'>投稿作成</a>]</p>
            @endif 
            
            <!--検索があった時の件数-->
            @if(!Empty($museumsearch))
                    
                
                <!--検索結果-->
                
                
                
                @foreach($museums as $museum)
                    <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                    <p class='place'>場所</p>
                    <p class='place'>{{ $museum->placeName }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museum->bodyName }}</p>
                @endforeach
    
                {{ $museumsearch->appends(request()->input())->links() }}

            
                
            @else
            <!--検索がなかった時の件数-->
                
                <!--<div class="show">[<a href="/public">もっと見る</a>]</div><br>-->
        <!--検索がなかった時の一覧-->
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
               <!--<div class="show">[<a href="/public">もっと見る</a>]</div>-->
            @endif
        </div>   
        
        
        
           <!--<div class="show">[<a href="/public">もっと見る</a>]</div>-->
        
           
            
           
       <!--<div class='mail'>-->
       <!--    <a href="/mail">お問い合わせ</a>-->
       <!-- </div>-->
       @include("layouts.footer" )
@endsection