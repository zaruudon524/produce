@extends('layouts.app')

@section('content')
        <h1>ホーム</h1>
        
        <!--検索-->
        <div class=search>
           <form action="/public/search" method="POST">
               @csrf
               
                <input name="search" type="text" placeholder="キーワードを入力" value={{$search}}>
                <button type="submit">検索</button>
           </form>
           
            
            @if(!Empty($search))
                @if (count($museums) >0) 
                <p class='number'>全{{ $museums->total() }}件中</p>
                <!--データ領域にある、条件に一致するアイテムの総数-->
                {{  ($museums->currentPage() -1) * $museums->perPage() + 1}} - 
                {{ (($museums->currentPage() -1) * $museums->perPage() + 1) + (count($museums) -1)  }}件のデータが表示されています。</p>
                <!--現在の頁数*ページごとに表示するアイテム数-->
                @endif      
                
                @foreach($museums as $museum)
                    <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                    <p class='place'>場所</p>
                    <p class='place'>{{ $museum->place }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museum->body }}</p>
                @endforeach
                
                
                {{ $museums->appends(request()->input())->links() }}

            @else
                <div class='museum'>
                    <div class='allnumber'>
                    @if (count($museums) >0) 
                    <p class='number'>全{{ $museums->total() }}件中
                    <!--データ領域にある、条件に一致するアイテムの総数-->
                    {{  ($museums->currentPage() -1) * $museums->perPage() + 1}} - 
                    {{ (($museums->currentPage() -1) * $museums->perPage() + 1) + (count($museums) -1)  }}件のデータが表示されています。</p>
                    <!--現在の頁数*ページごとに表示するアイテム数-->
                    </div>
                    @else
                    <p>データがありません。</p>
                    @endif      
                </div>
            
                <!--<div class="show">[<a href="/public">もっと見る</a>]</div><br>-->
        
           @foreach($museums as $museum)
            <div class='museum'>
                <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
            </div>
            @endforeach
        </div>
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