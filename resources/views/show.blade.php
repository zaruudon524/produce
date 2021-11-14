@extends('layouts.app')

@section('content')
        <section class="bg-light p-3">
        <h1>博物館</h1>
        <!--ブックマーク-->
            @if($isBookmarked)
             <div>
                <form action="/public/{{ $museum->id }}/deletebookmark" method="POST">
                    @method('POST')
                    @csrf
                    <input type="submit" value="&#xf164;いいね取り消し" class="fas btn btn-danger">
                </form>
            </div>
            @else
            <div>
                <form action="/public/{{ $museum->id }}/bookmark" method="POST">
                    @method('PUT')
                    @csrf
                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                </form>
            </div>
            @endif
            
            
            <div class='museums'>
                <h2 class='name'>{{ $museum->name }}</h2>
                <h2 class='place'>{{ $museum->placeName }}</h2>
                <h2 class='body'>{{ $museum->bodyName }}</h2>
                <!--アンケート-->
            <div class="form-group row">
            <!--<div class="col-sm-12">-->
                <a type="button" class="btn btn-info" href='/survey/{{ $museum->id }}'>アンケート回答</a></br>
                @if(Auth::user()->id === 1)
                    <a type="button" class="btn btn-info" href='/survey/{{ $museum->id }}/result'>アンケート結果</a></br>
                @endif
                <!--口コミ-->
                <a type="button" class="btn btn-primary" href='/reviews/create/{{ $museum->id }}'>口コミ作成</a></br>
            <!--</div>-->
            </div>
                
                
                @foreach($reviews as $review)
                    <div class='review'>
                        <p class='user_name'>{{ $review->user_name }}</p>
                        <a href="/reviews/{{ $review->id }}/">{{ $review->title }}</a>
                        <p class='body'>{{ $review->body }}</p>
                     <!--画像表示-->
                    <div class="img-responsive img-rounded ml-6" alt="参考画像" width="200" height="200">
                        @if(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpg'))
                            <img src="/storage/post_img/{{ $review->id }}.jpg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpeg'))
                            <img src="/storage/post_img/{{ $review->id }}.jpeg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.png'))
                            <img src="/storage/post_img/{{ $review->id }}.png">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.gif'))
                            <img src="/storage/post_img/{{ $review->id }}.gif">
                        @endif<br>
                    </div>
                @endforeach
                
                <h2 class='address'>{{ $museum->address }}</p>
                <p class='time'>{{ $museum->time }}</p>
                <p class='day'>{{ $museum->day }}</p>
                <p class='money'>{{ $museum->money }}</p>
                <p class='traffic'>{{ $museum->traffic }}</p>
                <p class='sns'>{{ $museum->sns }}</p>
                <p class='tel'>{{ $museum->tel }}</p>
                <p class='homepage'>{{ $museum->homepage }}</p>
                <p class='other'>{{ $museum->other }}</p>
                
                <!--googlemap api-->
                <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key= {{ config("services.google-map.apikey") }}&q={{ $museum->address }}'
                width='50%' height='300' frameborder='0'></iframe>
                <!--AIzaSyCzIo_zYkdzG7ttnjn_o1HE7SLlzPZabwo-->
                
            <div class="form-group row">
                <!--編集-->
	            @if(Auth::user()->id === 1)
	            <a href="/public/{{ $museum->id }}/edit" class="btn btn-primary">編集</a>
	            @endif
	            
	            <!--削除-->
                @if(Auth::user()->id === 1)
                <form action="/public/{{ $museum->id }}" id="form_{{ $museum->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                    <input type="submit" name="delete" class="btn btn-danger" value="削除" span onclick="return deleteMuseum(this);" >
                </form>
                @endif
            </div>
            
            <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
        </section>
@include("layouts.footer" )
@endsection
