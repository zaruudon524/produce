@extends('layouts.app')

@section('content')

    <h1>アンケート内容確認</h1></br>
    
    <!--<section class="bg-light p-5">-->
        <form action="/survey/{{ $museum->id }}/complete" method="POST" class="needs-validation" novalidate>
        @csrf
        <table class="table">
            <tr>
                <th scope="row">①あなたのお住まいを教えてください</th>
                <td>{{ $request->living }}</td>
            </tr>
            <input type="hidden" name="living" value="{{ $request->living }}" />
            
            <tr>
                <th scope="row">②県内の方は市町村名、県外の方は都道府県名をご入力ください</th>
                <td>{{ $request->livingplace }}</td>
            </tr>
            <input type="hidden" name="livingplace" value="{{ $request->livingplace }}" />
            
            <tr>
                <th scope="row">③	あなたの性別をお教え下さい</th>
                <td>{{ $request->gender }}</td>
            </tr>
            <input type="hidden" name="gender" value="{{ $request->gender }}" />
            
            
            <tr>
                <th scope="row">④	あなたの年齢をお教え下さい</th>
                <td>{{ $request->age }}</td>
            </tr>
            <input type="hidden" name="age" value="{{ $request->age }}" />
            
            <tr>
                <th scope="row">⑤	この館をご存じですか？来館したことがない方は⑪へ</th>
                <td>{{ $request->havecome }}</td>
            </tr>
            <input type="hidden" name="havecome" value="{{ $request->havecome }}" />
            
            <?php
            if (isset($_POST['reasoncoming']) && is_array($_POST['reasoncoming'])) {
                $reasoncoming = implode("、", $_REQUEST["reasoncoming"]);
            }?>
            <tr>
                <th scope="row">⑥	知っていて来館したことがあると答えた方に質問です。来場のきっかけは何でしょうか。（複数回答可）</th>
                <td>{{ $reasoncoming }}</td>
            </tr>
            <input type="hidden" name="reasoncoming" value="{{ $reasoncoming }}" />
            
            <tr>
                <th scope="row">⑦	来館時の交通手段等をお教えください</th>
                <td>{{ $request->transportation }}</td>
            </tr>
            <input type="hidden" name="transportation" value="{{ $request->transportation }}" />
            
            <tr>
                <th scope="row">⑧	当館を知ったきっかけをお教え下さい</th>
                <td>{{ $request->howknow }}</td>
            </tr>
            <input type="hidden" name="howknow" value="{{ $request->howknow }}" />
            
            <tr>
                <th scope="row">⑨	当館をまた利用したいと思いますか。</th>
                <td>{{ $request->comeagain }}</td>
            </tr>
            <input type="hidden" name="comeagain" value="{{ $request->comeagain }}" />
            
            <tr>
                <th scope="row">⑩	理由をお聞かせください</th>
                <td>{{ $request->comeagainform }}</td>
            </tr>
            <input type="hidden" name="comeagainform" value="{{ $request->comeagainform }}" />
            
            <tr>
                <th scope="row">>⑪	来館したことがない、知らなかったと答えた方に質問です。この館のイメージや何を行っているかお教え下さい。</th>
                <td>{{ $request->image }}</td>
            </tr>
            <input type="hidden" name="image" value="{{ $request->image }}" />
            
            <?php
            if (isset($_POST['reasonnotcoming']) && is_array($_POST['reasonnotcoming'])) {
                $reasonnotcoming = implode("、", $_REQUEST["reasonnotcoming"]);
            }?>
            <tr>
                <th scope="row">⑫	これまで訪れなかった要因は何ですか。または博物館に訪れる際に何を重要視しますか。（複数回答可）</th>
                <td>{{ $reasonnotcoming }}</td>
            </tr>
            <input type="hidden" name="reasonnotcoming" value="{{ $reasonnotcoming }}" />
            
            <tr>
                <th scope="row">その他の場合は以下にご入力ください</th>
                <td>{{ $request->reasonnotcomingform }}</td>
            </tr>
            <input type="hidden" name="reasonnotcomingform" value="{{ $request->reasonnotcomingform }}" />
            
            <tr>
                <th scope="row">⑬	その他、ご意見・ご提案等ございましたらご自由に入力してください</th>
                <td>{{ $request->option }}</td>
            </tr>
            <input type="hidden" name="option" value="{{ $request->option }}" />
        </table>
        
        <div class="form-group row">
            <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
                <button type="submit" class="btn btn-info">送信</button>
            </div>
        </div>
        
        </form>
    <!--</section>    -->
@include("layouts.footer" )
@endsection