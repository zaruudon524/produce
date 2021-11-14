@extends('layouts.app')

@section('content')
        <section class="bg-light p-3">
        <h1>投稿</h1>
       <form action="/reviews/{{ $museum->id }}" method="POST" enctype="multipart/form-data">
           @csrf
            <h2 class='name'>{{ $museum->name }}</h2>
            <div class="form-group">
                <h3>タイトル</h3>
                <input type="text" name="review[title]" class="form-control" placeholder="タイトル" value="{{ old('review.title') }}"/><br>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="form-group">
                <h3>本文</h3>
                <textarea name="review[body]" class="form-control" placeholder="本文" value="{{ old('review.body') }}"></textarea><br>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            
            <p>画像をアップロード</p>
            <input type="file" name="post_img" class="form-control-file" value="{{ old('post_img')}}"/>
            <p class="body__error" style="color:red">{{ $errors->first('post_img') }}</p>
            
        <div class="form-group row">
            <div class="col-sm-12 text-center">
                <input type="submit" class="btn btn-info" value="保存"/>
                <!--<button type="submit" class="btn btn-info">保存</button>-->
                <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
            </div>
        </div>
        </section>
        </form>
 @endsection