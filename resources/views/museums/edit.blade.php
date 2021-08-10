@extends('layouts.app')

@section('content')
        <h1 class="title">編集</h1>
        <div class="content">
             <form action="/museums/{{ $museum->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__name'>
                    <h2>名前</h2>
                    <input type='text' name='museum[name]' value="{{ $museum->name }}">
                </div>
                <div class='content__place'>
                    <h2>場所</h2>
                    <input type='text' name='museum[place]' value="{{ $museum->place }}">
                </div>
                <div class='content__body'>
                    <h2>属性</h2>
                    <input type='text' name='museum[body]' value="{{ $museum->body }}">
                </div>
                <div class='content__time'>
                    <h2>開館時間</h2>
                    <input type='text' name='museum[address]' value="{{ $museum->address }}">
                </div>
                <div class='content__time'>
                    <h2>会館時間</h2>
                    <input type='text' name='museum[time]' value="{{ $museum->time }}">
                </div>
                <div class='content__day'>
                    <h2>開館日</h2>
                    <input type='text' name='museum[day]' value="{{ $museum->day }}">
                </div>
                <div class='content__money'>
                    <h2>入館料</h2>
                    <input type='text' name='museum[money]' value="{{ $museum->money }}">
                </div>
                <div class='content__traffic'>
                    <h2>交通手段</h2>
                    <input type='text' name='museum[traffic]' value="{{ $museum->traffic }}">
                </div>
                <div class='content__sns'>
                    <h2>公式アカウント</h2>
                    <input type='text' name='museum[sns]' value="{{ $museum->sns }}">
                </div>
                <div class='content__tel'>
                    <h2>問い合わせ</h2>
                    <input type='text' name='museum[tel]' value="{{ $museum->tel }}">
                </div>
                <div class='content__homepage'>
                    <h2>HP</h2>
                    <input type='text' name='museum[homepage]' value="{{ $museum->homepage }}">
                </div>
                <div class='content__other'>
                    <h2>備考</h2>
                    <input type='text' name='museum[other]' value="{{ $museum->other }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
 @endsection