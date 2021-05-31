@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 <title>Museum</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿</h1
        <p class="edit">[<a href="/reviews/{{ $review->id }}/edit">edit</a>]</p>
        <form action="/reviews/{{ $review->id }}"  id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <!--<p class='delete'>[<span onclick="return deletePost);">delete</span>]</p>-->
        </form>
            <div class='review'>
                <!--<h2 class='name'>{{ $review->name }}</h2>-->
                <h2 class='title'>{{ $review->title }}</h2>
                <p class='body'>{{ $review->body }}</p>
                <p class='updated_at'>{{ $review->updated_at }}</p>
            </div>
            <div class="back">[<a href="/public/">back</a>]</div>
            <script>
                function deletePost(e) {
                    'use strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
        </body>
</html>
    @endsection

