@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">
        <h5 class="lead">ブックマーク</h5>
        
        <!--件数-->
        @if (count($museums) >0) 
            <p class='number'>全{{ $museums->total() }}件中
            <!--データ領域にある、条件に一致するアイテムの総数-->
            {{  ($museums->currentPage() -1) * $museums->perPage() + 1}} - 
            {{ (($museums->currentPage() -1) * $museums->perPage() + 1) + (count($museums) -1)  }}件のデータが表示されています。</p>
            <!--現在の頁数*ページごとに表示するアイテム数-->
        @else
            <p>データがありません。</p>
        @endif
        
        @foreach($museums as $museum)
            <div class='museum'>
                <h6><a href="/public/{{ $museum->id }}">{{ $museum->name }}</a></h6>
                <!--<p class='place'>場所</p>-->
                <h6>{{ $museum->placeName }}</h6>
                <!--<p class='body'>属性</p>-->
                <h6>{{ $museum->bodyName }}</h6>
            </div>
        @endforeach
        
        <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
        
        {{ $museums->links() }}
    </section>   
@include("layouts.footer" )
@endsection