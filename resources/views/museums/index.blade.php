@extends('layouts.app')

@section('content')
        <h1>投稿</h1>
        @if(Auth::user()->id === 1)
            <p class='create'>[<a href='/museums/create'>create</a>]</p>
        @endif
       <div class='museums'>
          
           @foreach($museums as $museum)
            <div class='museum'>
                 @if(isset($museum))
                <h2><a href="/museums/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
                <p class='place'>{{ $museum->place }}</p>
                <p class='body'>属性</p>
                <p class='body'>{{ $museum->body }}</p>
                @endif
            </div>
             @endforeach

       </div>
 @endsection