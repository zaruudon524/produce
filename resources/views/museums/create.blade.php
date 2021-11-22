
@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">
        <h5 class="lead">投稿</h5>
        <form action="/museums" method="POST">
           @csrf
           
           <div class="form-group">
               <h5>名前</h5>
               <input type="text" name="museum[name]" class="form-control" placeholder="名前" value="{{ old('museum.name') }}"/><br>
               <p class="name__error" style="color:red">{{ $errors->first('museum.name') }}</p>
           </div>
           
            <div class="form-group">
                <h5>場所</h5>
                <select id="place" name="museum[place]" class="form-control" value="{{ old('museum.place') }}">
                    @foreach($places as $place)
                        <option value=""hidden>都道府県</option>
                        <option value={{ $place->place_id }}>{{$place->name}}</option>
                    @endforeach
                </select><br>
                <p class="place__error" style="color:red">{{ $errors->first('museum.place') }}</p>
            </div>
            
            <div class="form-group">
                <h5>属性</h5>
                <!--<input type="text" name="museum[body]" placeholder="属性" value=" }}"/>-->
                <select id="body" name="museum[body]" class="form-control" value="{{ old('museum.body') }}">
                    @foreach($bodies as $body)
                        <option value=""hidden>館種</option>
                        <option value={{ $body->body_id }}>{{$body->index}}</option>
                    @endforeach
                </select><br>
                <p class="body__error" style="color:red">{{ $errors->first('museum.body') }}</p>
            </div>
            <!--</div>-->
            
            <div class="form-group">
                <h5>住所</h5>
                <textarea name="museum[address]" class="form-control" placeholder="住所"></textarea>
            </div>
            <div class="form-group">
                <h5>開館時間</h5>
                <textarea name="museum[time]" class="form-control" placeholder="時間"></textarea>
            </div>
            <div class="form-group">
                <h5>開館日</h5>
                <textarea name="museum[day]" class="form-control" placeholder="開館日"></textarea>
            </div>
            <div class="form-group">
                <h5>入館料</h5>
                <textarea name="museum[money]" class="form-control" placeholder="入館料"></textarea>
            </div>
            <div class="form-group">
                <h5>交通手段</h5>
                <textarea name="museum[traffic]" class="form-control" placeholder="交通手段"></textarea>
            </div>
            <div class="form-group">
                <h5>公式アカウント</h5>
                <textarea name="museum[sns]" class="form-control" placeholder="公式アカウント"></textarea>
            </div>
            <div class="form-group">
                <h5>問い合わせ</h5>
                <textarea name="museum[tel]" class="form-control" placeholder="問い合わせ"></textarea>
            </div>
            <div class="form-group">
                <h5>ホームページ</h5>
                <textarea name="museum[homepage]" class="form-control" placeholder="HP"></textarea>
            </div>
            <div class="form-group">
                <h5>備考</h5>
                <textarea name="museum[other]" class="form-control" placeholder="備考"></textarea>
            </div>
            
            <div class="form-group row">
            <div class="col-sm-12 text-center">
                <input type="submit" class="btn btn-info" value="保存"/>
                <a href="/" type="button" class="btn btn-info">戻る</a>
            </div>
            </div>
        </form>
    </section>
 @endsection