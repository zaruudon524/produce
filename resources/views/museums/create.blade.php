
@extends('layouts.app')

@section('content')
        <h1>投稿</h1>
       <form action="/museums" method="POST">
           @csrf
           <div class="tag">
               <h3>タグ</h3>
               <input type="text" name="museum[tag]" placeholder="タグ"/>
           </div>
           <div class="name">
               <h2>名前</h2>
               <input type="text" name="museum[name]" placeholder="名前" value="{{ old('museum.name') }}"/><br>
               <p class="name__error" style="color:red">{{ $errors->first('museum.name') }}</p>
           </div>
           <div class="place">
                <h3>場所</h3>
                <input type="text" name="museum[place]" placeholder="場所" value="{{ old('museum.place') }}"/><br>
                <p class="place__error" style="color:red">{{ $errors->first('museum.place') }}</p>
            </div>
            <div class="body">
                <h3>属性</h3>
                <input type="text" name="museum[body]" placeholder="属性" value="{{ old('museum.body') }}"/><br>
                <p class="body__error" style="color:red">{{ $errors->first('museum.body') }}</p>
            </div>
            
            <div class="address">
                <h2>住所</h2>
                <textarea name="museum[address]" placeholder="住所"></textarea>
            </div>
            <div class="time">
                <h2>開館時間</h2>
                <textarea name="museum[time]" placeholder="時間"></textarea>
            </div>
            <div class="day">
                <h2>開館日</h2>
                <textarea name="museum[day]" placeholder="開館日"></textarea>
            </div>
            <div class="money">
                <h2>入館料</h2>
                <textarea name="museum[money]" placeholder="入館料"></textarea>
            </div>
            <div class="traffic">
                <h2>交通手段</h2>
                <textarea name="museum[traffic]" placeholder="交通手段"></textarea>
            </div>
            <div class="sns">
                <h2>公式アカウント</h2>
                <textarea name="museum[sns]" placeholder="公式アカウント"></textarea>
            </div>
            <div class="tel">
                <h2>問い合わせ</h2>
                <textarea name="museum[tel]" placeholder="問い合わせ"></textarea>
            </div>
            <div class="homepage">
                <h2>HP</h2>
                <textarea name="museum[homepage]" placeholder="HP"></textarea>
            </div>
            <div class="other">
                <h2>備考</h2>
                <textarea name="museum[other]" placeholder="備考"></textarea>
            </div>
        <input type="submit" value="保存"/>
                </form>
         <div class="back">[<a href="/">back</a>]</div>
 @endsection