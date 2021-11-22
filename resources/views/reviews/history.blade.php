@extends('layouts.app')

@section('content')
<section class="bg-light p-3">
    <h5 class="lead">投稿履歴</h5></br>
   
   @if(empty($reviews))
        <h3 class="text-center">口コミを投稿してみよう！</h3>
   @endif
   
   @if (count($reviews) >0) 
        <p class='number'>全{{ $reviews->total() }}件中
        <!--データ領域にある、条件に一致するアイテムの総数-->
        {{  ($reviews->currentPage() -1) * $reviews->perPage() + 1}} - 
        {{ (($reviews->currentPage() -1) * $reviews->perPage() + 1) + (count($reviews) -1)  }}件のデータが表示されています。</p>
        <!--現在の頁数*ページごとに表示するアイテム数-->
    @endif    
   
   <!--博物館名表示-->
    @foreach($reviews as $review)
        <h5 class="lead">
            <a href="/public/{{ $review->museum_id }}">{{ $review->museum_name }}</a><br>
            <a href="/reviews/{{ $review->id }}/">{{ $review->title }}</a>
            <p class='body'>{{ $review->body }}</p>
        </h5>
    
    <!--//画像表示-->
    <div class="img-responsive img-rounded ml-6" width="50" height="50">
        @if(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpg'))
            <img src="/storage/post_img/{{ $review->id }}.jpg">
        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpeg'))
            <img src="/storage/post_img/{{ $review->id }}.jpeg">
        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.png'))
            <img src="/storage/post_img/{{ $review->id }}.png">
        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.gif'))
            <img src="/storage/post_img/{{ $review->id }}.gif">
        @endif</br>
    </div>
    @endforeach
    
    {{ $reviews->links() }}
    
        
    <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
</section>
    
@include("layouts.footer" )
@endsection
