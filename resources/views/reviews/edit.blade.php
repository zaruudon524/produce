@extends('layouts.app')

@section('content')
        <section class="bg-light p-3">
        <h1 class="title">編集画面</h1>
             <form action="/reviews/{{ $review->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='form-group'>
                    <h2>タイトル</h2>
                    <input type='text' name='review[title]' class="form-control" value="{{ $review->title }}">
                </div>
                <div class='form-group'>
                    <h2>本文</h2>
                    <input type='text' name='review[body]' class="form-control" value="{{ $review->body }}">
                </div>
                
                <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <input type="submit" class="btn btn-info" value="保存">
                    <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
                </div>
                </div>
            </form>
        </section>
@include("layouts.footer" )        
@endsection