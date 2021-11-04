@extends('layouts.app')

@section('content')

        <h1>アンケート内容確認</h1></br>
        <div class="form-group row">
               <label for="radioGrp01" class="col-md-4 col-form-label text-md-right">この館に来たことはありますか？</label>
               <div class="col-md-6">
                  @foreach($rg01Datas as $rkey => $rval)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="radioGrp01" name="radioGrp01" value="{{$rkey}}"
                       @if(empty(old()) and $rkey == $rg01Checked) checked="checked"
                       @elseif($rkey == old('radioGrp01'))) checked="checked"
                       @endif
                     >
                     <label class="form-check-label" for="{{$rkey}}">{{$rval}}</label>
                  </div>
                  @endforeach
              </div>
            </div>
        <!--<form action="/question/confirm" method="GET">-->

        <!--</form>-->
        </div>
        <button type="button" onClick="history.back()" class="btn btn-primary">入力画面に戻る</button>
            <!--<button name="action" type="submit" value="return" class="btn btn-dark">入力画面に戻る</button>-->
            <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
        </div>
@include("layouts.footer" )
@endsection