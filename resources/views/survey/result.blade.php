@extends('layouts.app')

@section('content')

    <h1>アンケート結果</h1></br>
    
  
    <a href="/pubic/{{ $museum->id }}/">{{ $survey->museum_name }}</a>
    
    <!--<table class="table ">-->
    @foreach($surveys as $survay)
        
            <!--<div  class="rounded">-->
                <p>①あなたのお住まいを教えてください</p>
                <div>{{ $survey->living }}</div></br>
            
                <p scope="row">②県内の方は市町村名、県外の方は都道府県名をご入力ください</p>
                <div>{{ $survey->livingplace }}</div></br>
            
                <p scope="row">③	あなたの性別をお教え下さい</p>
                <div>{{ $survey->gender }}</div></br>
            
                <p scope="row">④	あなたの年齢をお教え下さい</div>
                <div>{{ $survey->age }}<div></br>
            
                <p scope="row">⑤	この館をご存じですか？来館したことがない方は⑪へ</p>
                <div>{{ $survey->havecome }}</div></br>
            
                <p scope="row">⑥	知っていて来館したことがあると答えた方に質問です。来場のきっかけは何でしょうか。（複数回答可）</p>
                <div>{{ $survey->reasoncoming }}</div></br>
            
                <p scope="row">⑦	来館時の交通手段等をお教えください</p>
                <div>{{ $survey->transportation }}</div></br>
            
                <p scope="row">⑧	当館を知ったきっかけをお教え下さい</p>
                <div>{{ $survey->howknow }}</div></br>
            
                <p scope="row">⑨	当館をまた利用したいと思いますか。</p>
                <div>{{ $survey->comeagain }}</div></br>
            
                <p scope="row">⑩	理由をお聞かせください</p>
                <div>{{ $survey->comeagainform }}</div></br>
            
                <p scope="row">⑪	来館したことがない、知らなかったと答えた方に質問です。この館のイメージや何を行っているかお教え下さい。</p>
                <div>{{ $survey->image }}</div></br>
        
                <p scope="row">⑫	これまで訪れなかった要因は何ですか。または博物館に訪れる際に何を重要視しますか。（複数回答可）</p>
                <div>{{ $survey->reasonnotcoming }}</div></br>
            
                <p scope="row">その他の場合は以下にご入力ください</p>
                <div>{{ $survey->reasonnotcomingform }}</div></br>
            
                <p scope="row">⑬	その他、ご意見・ご提案等ございましたらご自由に入力してください</p>
                <div>{{ $survey->option }}</div></br>
            <p class="border-bottom border-primary"></p></br>
            
            <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
        
    @endforeach
   </table>
    
    {{ $surveys->links() }}
    
@include("layouts.footer" )
@endsection