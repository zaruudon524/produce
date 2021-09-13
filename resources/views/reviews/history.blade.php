@extends('layouts.app')

@section('content')
    <h1>投稿履歴</h1>
   
   @if (count($reviews) >0) 
        <p class='number'>全{{ $reviews->total() }}件中
        <!--データ領域にある、条件に一致するアイテムの総数-->
        {{  ($reviews->currentPage() -1) * $reviews->perPage() + 1}} - 
        {{ (($reviews->currentPage() -1) * $reviews->perPage() + 1) + (count($reviews) -1)  }}件のデータが表示されています。</p>
        <!--現在の頁数*ページごとに表示するアイテム数-->
    @endif    
   
   <!--博物館名表示-->
    @foreach($reviews as $review)
        <div class='review'>
            <a href="/public/{{ $review->museum_id }}">{{ $review->museum_name }}</a>
            <p class='title'>{{ $review->title }}</p>
            <p class='body'>{{ $review->body }}</p>
        </div>
    
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
    @endforeach
    
    {{ $reviews->links() }}
    
    
    <div class="back">[<a href="/">back</a>]</div>
    
    
@include("layouts.footer" )
@endsection
