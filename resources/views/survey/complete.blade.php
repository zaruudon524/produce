@extends('layouts.app')

@section('content')

        <h1 class="text-center">回答ありがとうございました。</h1>
        <button type="button" class="btn btn-info" onclick="location.href='/public/{{ $museum->id }}/'">戻る</button>
        <!--<button type="button" class="btn btn-info" onClick="history.back()">戻る</button>-->
    </body>
@include("layouts.footer" )
@endsection