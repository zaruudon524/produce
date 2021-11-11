@extends('layouts.app')

@section('content')
        <!--<h1>ホーム</h1>-->

        <!--検索-->
        
            <form action="/" method="GET">
                @csrf
                <h2>博物館を探す</h2>
                <input type="text" name="searchWord" value="{{ $searchWord }}" placeholder="博物館名" class="form-group"></br>
                
                <div style="display:inline-flex">
                <select id="place" name="placeId" class="form-group">
                        @foreach($places as $place)
                            <option value=""hidden>都道府県</option>
                            <option value={{ $place->place_id }}>{{$place->name}}</option>
                        @endforeach
                </select><br>
                
                <select id="body" name="bodyId" class="form-group">
                        @foreach($bodies as $body)
                            <option value=""hidden>館種</option>
                            <option value={{ $body->body_id }}>{{$body->index}}</option>
                        @endforeach
                </select><br>
                </div>
                <input type="submit" class='btn btn-primary', value="検索"/>
            </form>
            
           <!--管理者作成の博物館データ-->
            @if(Auth::user()->id === 1)
                <p class='create'>[<a href='/museums/create'>投稿作成</a>]</p>
            @endif 
            
            <!--検索があった時の件数-->
            @if(!Empty($museumsearches))
                    
                <!--検索結果-->
                @if (count($museumsearches) >0)
                    <p class='number'>全{{ $museumsearches->total() }}件中</p>
                    <!--データ領域にある、条件に一致するアイテムの総数-->
                    {{  ($museumsearches->currentPage() -1) * $museumsearches->perPage() + 1}} - 
                    {{ (($museumsearches->currentPage() -1) * $museumsearches->perPage() + 1) + (count($museumsearches) -1)  }}件のデータが表示されています。</p>
                    <!--現在の頁数*ページごとに表示するアイテム数-->
                @else
                    <p>データがありません。</p>
                @endif      
                
                @foreach($museumsearches as $museumsearch)
                <div class='museum'>
                    <a href="/public/{{ $museumsearch->id }}">{{ $museumsearch->name }}</a></br>
                    <p class='place'>場所</p>
                    <p class='place'>{{ $museumsearch->placeName }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museumsearch->bodyName }}</p>
                </div>
                @endforeach
    
                {{ $museumsearches->appends(request()->input())->links() }}

            @else
            <!--検索がなかった時の件数-->
                @if(Empty($museumsearch))
                <div class='museum'>
                    <div class='allnumber'>
                    @if (count($museums) >0) 
                    <p class='number'>全{{ $museums->total() }}件中
                    データ領域にある、条件に一致するアイテムの総数
                    {{  ($museums->currentPage() -1) * $museums->perPage() + 1}} - 
                    {{ (($museums->currentPage() -1) * $museums->perPage() + 1) + (count($museums) -1)  }}件のデータが表示されています。</p>
                    現在の頁数*ページごとに表示するアイテム数
                    </div>
                    @else
                    <p>データがありません。</p>
                    @endif      
                </div>
                @endif
                <!--<div class="show">[<a href="/public">もっと見る</a>]</div><br>-->
        <!--検索がない時の一覧-->
               @foreach($museums as $museum)
                <div class='museum'>
                    <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                    <p class='place'>場所</p>
                    <p class='place'>{{ $museum->placeName }}</p>
                    <p class='body'>属性</p>
                    <p class='body'>{{ $museum->bodyName }}</p>
                </div>
                @endforeach
            
                {{ $museums->links() }}
               <!--<div class="show">[<a href="/public">もっと見る</a>]</div>-->
            @endif
        </div>   
        
           <!--<div class="show">[<a href="/public">もっと見る</a>]</div>-->
        
   
       @include("layouts.footer" )
@endsection