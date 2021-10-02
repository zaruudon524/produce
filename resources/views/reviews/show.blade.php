@extends('layouts.app')

@section('content')
   
        <h1>投稿</h1>
        
        @if(Auth::user()->id === $review->user_id )
        <p class="edit">[<a href="/reviews/{{ $review->id }}/edit">編集</a>]</p>
        
        
        <form action="/reviews/{{ $review->id }}"  id="form_{{ $review->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button><br>
            <!--<input type="submit" style="display:none">-->
            <!--<p class='delete'>[<span onclick="return deletePost);">delete</span>]</p>-->
        </form>
        @endif
        
            <div class='review'>
                <a href="/public/{{ $review->museum_id }}">{{ $review->museum_name }}</a><br>
                <h2 class='title'>{{ $review->title }}</h2>
                <p class='body'>{{ $review->body }}</p>
                <p class='updated_at'>{{ $review->updated_at }}</p>
                <!--<input type="hidden" name="userid" value="" />-->
            </div>
            <div class="back">[<a href="/reviews/{{ $review->id }}/history">back</a>]</div>
            <script>
                function deletePost(e) {
                    'use strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
            
    @include("layouts.footer" )
    @endsection

