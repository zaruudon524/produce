@extends('layouts.app')

@section('content')
        <h1>博物館</h1>
            @if($isBookmarked)
             <div>
                <form action="/public/{{ $museum->id }}/deletebookmark" method="POST">
                    @method('POST')
                    @csrf
                    <input type="submit" value="&#xf164;いいね取り消し" class="fas btn btn-danger">
                </form>
            </div>
            @else
            <div>
                <form action="/public/{{ $museum->id }}/bookmark" method="POST">
                    @method('PUT')
                    @csrf
                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                </form>
            </div>
            @endif
            
            
            <div class='museums'>
                <h3 class='tag'>{{ $museum->tag }}</h3>
                <h2 class='name'>{{ $museum->name }}</h2>
                <h2 class='place'>{{ $museum->place }}</h2>
                <h2 class='body'>{{ $museum->body }}</h2>
                <p class='create'>[<a href='/reviews/create/{{ $museum->id }}'>口コミ作成</a>]</p></br>
                
                @foreach($reviews as $review)
                    <div class='review'>
                        <!--<p class='title'>タイトル</p>-->
                        <p class='title'>{{ $review->title }}</p>
                        <!--<p class='body'>本文</p>-->
                        <p class='body'>{{ $review->body }}</p>
                    </div>
                @endforeach
                
                <p class='time'>{{ $museum->time }}</p>
                <p class='day'>{{ $museum->day }}</p>
                <p class='money'>{{ $museum->money }}</p>
                <p class='traffic'>{{ $museum->traffic }}</p>
                <p class='sns'>{{ $museum->sns }}</p>
                <p class='tel'>{{ $museum->tel }}</p>
                <p class='homepage'>{{ $museum->homepage }}</p>
                <p class='other'>{{ $museum->other }}</p>
                <p class='updated_at'>{{ $museum->updated_at }}</p>
            </div>
             @if(Auth::user()->id === 1)
            <form action="/public/{{ $museum->id }}" id="form_{{ $museum->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
                <button type="submit">削除</button> 
            </form>
            @endif
            <div class="back">[<a href="/public">back</a>]</div>
            <script>
                function deleteMuseum(e) {
                    'use strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
@include("layouts.footer" )
@endsection
