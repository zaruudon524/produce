@extends('layouts.app')

@section('content')
        <h1>投稿</h1>
       <form action="/reviews/{{ $museum->id }}" method="POST" enctype="multipart/form-data">
           @csrf
            <h2 class='name'>{{ $museum->name }}</h2>
            <div class="title">
                <h3>タイトル</h3>
                <input type="text" name="review[title]" placeholder="場所" value="{{ old('review.title') }}"/><br>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h3>本文</h3>
                <input type="text" name="review[body]" placeholder="本文" value="{{ old('review.body') }}"/><br>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            
            <p>画像をアップロード</p>
            <input type="file" name="post_img" value="{{ old('post_img')}}"/>
            <p class="body__error" style="color:red">{{ $errors->first('post_img') }}</p>

            
        <input type="submit" value="保存"/>
                </form>
         <div class="back">[<a href="/">back</a>]</div>
 @endsection