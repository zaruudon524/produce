@extends('layouts.app')

@section('content')
        <h1>ブックマーク</h1>
        @foreach($museums as $museum)
            <div class='museum'>
                <a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
            </div>
        @endforeach
               <div class="back">[<a href="/">back</a>]</div>
        
@include("layouts.footer" )
@endsection