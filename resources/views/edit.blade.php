@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">
        <h1 class="title">編集</h1>
        <div class="content">
             <form action="/public/{{ $museum->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='form-group'>
                    <h2>名前</h2>
                    <input type='text' name='museum[name]' class="form-control" value="{{ $museum->name }}">
                </div>
                <div class='form-group'>
                    <h2>場所</h2>
                    <input type='text' name='museum[place]' class="form-control" value="{{ $museum->place }}">
                </div>
                <div class='form-group'>
                    <h2>属性</h2>
                    <input type='text' name='museum[body]' class="form-control" value="{{ $museum->body }}">
                </div>
                <div class='form-group'>
                    <h2>住所</h2>
                    <input type='text' name='museum[address]' class="form-control" value="{{ $museum->address }}">
                </div>
                
                <div class='form-group'>
                    <h2>開館時間</h2>
                    <input type='text' name='museum[time]' class="form-control" value="{{ $museum->time }}">
                </div>
                <div class='form-group'>
                    <h2>開館日</h2>
                    <input type='text' name='museum[day]' class="form-control" value="{{ $museum->day }}">
                </div>
                <div class='form-group'>
                    <h2>入館料</h2>
                    <input type='text' name='museum[money]' class="form-control" value="{{ $museum->money }}">
                </div>
                <div class='form-group'>
                    <h2>交通手段</h2>
                    <input type='text' name='museum[traffic]' class="form-control" value="{{ $museum->traffic }}">
                </div>
                <div class='form-group'>
                    <h2>公式アカウント</h2>
                    <input type='text' name='museum[sns]' class="form-control" value="{{ $museum->sns }}">
                </div>
                <div class='form-group'>
                    <h2>問い合わせ</h2>
                    <input type='text' name='museum[tel]' class="form-control" value="{{ $museum->tel }}">
                </div>
                <div class='form-group'>
                    <h2>HP</h2>
                    <input type='text' name='museum[homepage]' class="form-control" value="{{ $museum->homepage }}">
                </div>
                <div class='form-group'>
                    <h2>備考</h2>
                    <textarea class="form-control" name='museum[other]' class="form-control" value="{{ $museum->other }}"></textarea>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <input type="submit" class="btn btn-info" value="保存"/>
                    <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
                </div>
                </div>
            </form>
       </section>
        
 @endsection