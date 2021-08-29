@extends('layouts.app')

@section('content')
    <h1>投稿履歴</h1>
   
   <!--博物館名表示-->
    @foreach($reviews as $review)
        <div class='review'>
            @foreach($museumnames as $museumname)
            @endforeach
            <a href="/public/{{ $museumname->id }}">{{ $museumname->name }}</a>
            <p class='title'>{{ $review->title }}</p>
            <p class='body'>{{ $review->body }}</p>
        </div>
    @endforeach
    
    <!--//画像表示-->
    @if(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpg'))
        <img src="/storage/post_img/{{ $review->id }}.jpg">
    @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpeg'))
        <img src="/storage/post_img/{{ $review->id }}.jpeg">
    @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.png'))
        <img src="/storage/post_img/{{ $review->id }}.png">
    @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.gif'))
        <img src="/storage/post_img/{{ $review->id }}.gif">
    @endif
    
    <div class="back">[<a href="/">back</a>]</div>
    
@include("layouts.footer" )
@endsection
