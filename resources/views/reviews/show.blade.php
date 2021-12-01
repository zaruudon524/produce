@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">
        <h1>{{$review->user_name}}さんの口コミ投稿</h1>
            <div class='review'>
                <a href="/public/{{ $review->museum_id }}">{{ $review->museum_name }}</a><br>
                <h2 class="lead">{{ $review->title }}</h2>
                <h2 class="lead">{{ $review->body }}</h2>
                
                <!--画像表示-->
                @if (App::environment('local'))
                    <div class="img-responsive img-rounded ml-6" alt="参考画像">
                        @if(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpg'))
                            <img src="/storage/post_img/{{ $review->id }}.jpg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpeg'))
                            <img src="/storage/post_img/{{ $review->id }}.jpeg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.png'))
                            <img src="/storage/post_img/{{ $review->id }}.png">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.gif'))
                            <img src="/storage/post_img/{{ $review->id }}.gif">
                        @endif<br>
                        </div>
                @else
                        @if(file_exists(public_path().'https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.jpg'))
                            <img class="img-rounded" src="https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img/{{ $review->id }}.jpg"></p>
                        @elseif(file_exists(public_path().'https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.jpeg'))
                            <img src="https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img/{{ $review->id }}.jpeg">
                        @elseif(file_exists(public_path().'https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.png'))
                            <img src="https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.png">
                        @elseif(file_exists(public_path().'https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.gif'))
                            <img src="https://imagemuseum.s3.ap-northeast-1.amazonaws.com/storage/post_img'. $review->id .'.gif">
                        @endif<br>
                @endif
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

