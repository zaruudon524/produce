@extends('layouts.app')

@section('content')
        <h1>ホーム</h1>

        <!--検索-->
        
           
            {{!! Form::open(['method' => 'get', 'url' => '/']) !!}}
            {{!! Form::token() !!}}
            <div>
            {{!! Form::select('place', config('place'), null) !!}}
            </div>
            <div>
            {{!! Form::select('body', config('body'), null) !!}}
            </div>
            {{!! Form::submit('検索') !!}}
            {{!! Form::close() !!}}
           
           
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
                    <p class='place'>{{ $museum->place }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museum->body }}</p>
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