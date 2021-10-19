@extends('layouts.app')

@section('content')
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
                @foreach($museums as $museum)
                <option value={{ $museum->place_id }}>{{$museum->placeName}}</option>
                <h2 class='place'>{{ $museum->placeName }}</h2>
                @endforeach
                <h2 class='body'>{{ $museum->BodyName }}</h2>
                <p class='create'>[<a href='/reviews/create/{{ $museum->id }}'>口コミ作成</a>]</p></br>
                
                
                
                @foreach($reviews as $review)
                    <div class='review'>
                        <p class='user_name'>{{ $review->user_name }}</p>
                        
                            <a href="/reviews/{{ $review->id }}/">{{ $review->title }}</a>
                       
                        <p class='body'>{{ $review->body }}</p>
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
                <p class='updated_at'>{{ $museum->updated_at }}</p>
                
                <!--googlemap api-->
                <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key= {{ config("services.google-map.apikey") }}&q={{ $museum->address }}'
                width='50%' height='300' frameborder='0'></iframe>
                <!--AIzaSyCzIo_zYkdzG7ttnjn_o1HE7SLlzPZabwo-->
                
                
	           <!--画像表示-->
	            @foreach($reviews as $review)
                @if(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpg'))
                    <img src="/storage/post_img/{{ $review->id }}.jpg">
                @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.jpeg'))
                    <img src="/storage/post_img/{{ $review->id }}.jpeg">
                @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.png'))
                    <img src="/storage/post_img/{{ $review->id }}.png">
                @elseif(file_exists(public_path().'/storage/post_img/'. $review->id .'.gif'))
                    <img src="/storage/post_img/{{ $review->id }}.gif">
                @endif<br>
                @endforeach
                
                <!--編集-->
	            @if(Auth::user()->id === 1)
	            <p class="edit">[<a href="/public/{{ $museum->id }}/edit">edit</a>]</p>
	            @endif
	            
	            <!--削除-->
                @if(Auth::user()->id === 1)
                <form action="/public/{{ $museum->id }}" id="form_{{ $museum->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                    <button type="submit">削除</button><br>
                </form>
                @endif
            
            
            <div class="back">[<a href="/public">back</a>]</div>
            
            <script>
                function deleteMuseum(e) {
                    'use strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
@include("layouts.footer" )
@endsection
