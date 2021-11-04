@extends('layouts.app')

@section('content')

        <h1>アンケート</h1></br>
        <form action="/question" method="GET">
            <!--<input type=”radio”>-->
            @csrf
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
        <!--    <div class="form-group row">-->
        <!--   <label for="radio01" class="col-md-4 col-form-label text-md-right">この館に来たことはありますか？</label>-->
        <!--   <div class="col-md-6">-->
        <!--      <div class="form-check form-check-inline">-->
        <!--         <input class="form-check-input" type="radio" id="inlineRadio01" name="radioGrp01" value="1">-->
        <!--         <label class="form-check-label" for="inlineRadio01">はい</label>-->
        <!--      </div>-->
        <!--      <div class="form-check form-check-inline">-->
        <!--         <input class="form-check-input" type="radio" id="inlineRadio02"  name="radioGrp01" value="2" checked="checked">-->
        <!--         <label class="form-check-label" for="inlineRadio02">いいえ</label>-->
        <!--      </div>-->
              
        <!--   </div>-->
        <!--</div>-->
            <div class="confirm">[<a href="/question/confirm">確認画面へ</a>]</div>
            <!--<input type="submit" value="確認画面へ"/>-->
        </form>
@include("layouts.footer" )
@endsection