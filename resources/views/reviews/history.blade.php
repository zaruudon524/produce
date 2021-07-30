@extends('layouts.app')

@section('content')
    <h1>投稿履歴</h1>
   
    <!--<h2 class='name'></h2>-->
    
    @foreach($reviews as $review)
        <div class='review'>
            <p class='title'>{{ $review->title }}</p>
            <p class='body'>{{ $review->body }}</p>
        </div>
    @endforeach
    
    <div class="back">[<a href="/">back</a>]</div>
    
@include("layouts.footer" )
@endsection
