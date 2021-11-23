@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">
        <h1>{{$review->user_name}}さんの口コミ投稿</h1>
            <div class='review'>
                <a href="/public/{{ $review->museum_id }}">{{ $review->museum_name }}</a><br>
                <h2 class="lead">{{ $review->title }}</h2>
                <h2 class="lead">{{ $review->body }}</h2>
                <h2 class="lead">{{ $review->updated_at }}</h2>
            </div>
            
            @if(Auth::user()->id === $review->user_id )
            <!--編集-->
                <a href="/reviews/{{ $review->id }}/edit" class="btn btn-info">編集</a>
            <!--削除-->
                
                <form action="/reviews/{{ $review->id }}"  id="form_{{ $review->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" class="btn btn-danger" value="削除" span onclick="return deleteMuseum(this);" >
            </form>
            
        @endif
            
        <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
            
    </section>
    @include("layouts.footer" )
    @endsection

