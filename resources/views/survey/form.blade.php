@extends('layouts.app')

@section('content')

    
        <section class="bg-light p-5">
        <h1>アンケート</h1></br>
        <form action="/survey/{{ $museum->id }}/confirm" method="POST" class="needs-validation" novalidate>
        @csrf
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">①  あなたのお住まいを教えてください</legend>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="living" value="県内" id="customRadioInline1" class="custom-control-input @error('living') is-invalid @enderror" @if( old('living')=='県内') checked="checked" @endif >
                        <label class="custom-control-label" for="customRadioInline1">県内</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="living" value="県外" id="customRadioInline2" class="custom-control-input @error('living') is-invalid @enderror" @if( old('living')=='県外') checked="checked" @endif>
                        <label class="custom-control-label" for="customRadioInline2">県外</label>
                    </div>
                    <span class="invalid-feedback" role="alert">
　　                    <strong>必須項目です。</strong>
                    </span>
                </div>
            </div>
            </div>
            
            <div class="form-row mb-4">
            <div class="col-md-6">
                <label for="livingplace">②	県内の方は市町村名、県外の方は都道府県名をご入力ください</label>
                <input type="text" name="livingplace" value="{{ old('livingplace') }}" class="form-control @if($errors->has('livingplace')) is-invalid @endif" id="livingplace"  required>
                @if($errors->has('livingplace'))
                    <div class="invalid-feedback">{{ $errors->first('livingplace') }}</div>
                @else
                    <div class="invalid-feedback">必須項目です</div>
                @endif
            </div>
            </div>
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">③	あなたの性別をお教え下さい</legend>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" value="女性" id="customRadioInline3" class="custom-control-input @error('gender') is-invalid @enderror" @if( old('gender')=='女性') checked="checked" @endif required>
                        <label class="custom-control-label" for="customRadioInline3">女性</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" value="男性" id="customRadioInline4" class="custom-control-input @error('gender') is-invalid @enderror" @if( old('gender')=='男性') checked="checked" @endif required>
                        <label class="custom-control-label" for="customRadioInline4">男性</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" value="その他" id="customRadioInline5" class="custom-control-input @error('gender') is-invalid @enderror" @if( old('gender')=='その他') checked="checked" @endif required>
                        <label class="custom-control-label" for="customRadioInline5">その他</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" value="回答しない" id="customRadioInline6" class="custom-control-input @error('gender') is-invalid @enderror" @if( old('gender')=='回答しない') checked="checked" @endif required>
                        <label class="custom-control-label" for="customRadioInline6">回答しない</label>
                    </div>
                    <span class="invalid-feedback" role="alert">
　　                    <strong>必須項目です。</strong>
                    </span>
                </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">④	あなたの年齢をお教え下さい</legend>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="10歳未満" id="customRadioInline7" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='10歳未満') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline7">10歳未満</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="10歳代" id="customRadioInline8" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='10歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline8">10歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="20歳代" id="customRadioInline9" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='20歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline9">20歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="30歳代" id="customRadioInline10" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='30歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline10">30歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="40歳代" id="customRadioInline11" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='40歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline11">40歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="50歳代" id="customRadioInline12" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='50歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline12">50歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="60歳代" id="customRadioInline13" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='60歳代') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline13">60歳代</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="age" value="70歳代以上" id="customRadioInline14" class="custom-control-input @error('age') is-invalid @enderror" @if( old('age')=='70歳代以上') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline14">70歳代以上</label>
                </div>
                <span class="invalid-feedback" role="alert">
　　                <strong>必須項目です。</strong>
                </span>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">⑤	この館をご存じですか？来館したことがない方は⑪へ</legend>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="havecome" value="知っていて、来館したことがある。" id="customRadioInline15" class="custom-control-input @error('havecome') is-invalid @enderror" @if( old('havecome')=='知っていて、来館したことがある。') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline15">知っていて、来館したことがある。</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="havecome" value="知っていて、来館したことがない。" id="customRadioInline16" class="custom-control-input @error('havecome') is-invalid @enderror" @if( old('havecome')=='知っていて、来館したことがない。') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline16">知っていて、来館したことがない。</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="havecome" value="知らなかった。" id="customRadioInline17" class="custom-control-input @error('havecome') is-invalid @enderror" @if( old('havecome')=='知らなかった。') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline17">知らなかった。</label>
                </div>
                <span class="invalid-feedback" role="alert">
　　                <strong>必須項目です。</strong>
                </span>
            </div>
            </div>
            
            <div class="form-group row">
            <div class="col-sm-12">⑥	知っていて来館したことがあると答えた方に質問です。来場のきっかけは何でしょうか。（複数回答可）</div>
            <div class="col-sm-10">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="見たい展示（常設展）があったから。" {{ is_array(old("reasoncoming")) && in_array("見たい展示（常設展）があったから。", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">見たい展示（常設展）があったから。</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="見たい展示（特別展）があったから。" {{ is_array(old("reasoncoming")) && in_array("見たい展示（特別展）があったから。", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">見たい展示（特別展）があったから。</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="入場券（または優待券）を入手したから。" {{ is_array(old("reasoncoming")) && in_array("入場券（または優待券）を入手したから。", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">入場券（または優待券）を入手したから。</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="講演会・講座・シンポジウムの聴講" {{ is_array(old("reasoncoming")) && in_array("講演会・講座・シンポジウムの聴講", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck4">
                    <label class="custom-control-label" for="customCheck4">講演会・講座・シンポジウムの聴講</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="調べもの" {{ is_array(old("reasoncoming")) && in_array("調べもの", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck5">
                    <label class="custom-control-label" for="customCheck5">調べもの</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasoncoming[]" value="その他" {{ is_array(old("reasoncoming")) && in_array("その他", old("reasoncoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck6">
                    <label class="custom-control-label" for="customCheck6">その他</label>
                </div>
                @if($errors->has('reasoncoming'))
                    <div class="text-danger">最低一つはチェックをしてください</div>
                @endif
            </div>
            </div>
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">⑦	来館時の交通手段等をお教えください</legend>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="自動車" id="customRadioInline18" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='自動車') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline18">自動車</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="電車" id="customRadioInline19" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='電車') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline19">電車</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="バス" id="customRadioInline20" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='バス') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline20">バス</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="自転車・徒歩" id="customRadioInline21" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='自転車・徒歩') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline21">自転車・徒歩</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="タクシー" id="customRadioInline22" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='タクシー') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline22">タクシー</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="transportation" value="その他" id="customRadioInline23" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('transportation')=='その他') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline23">その他</label>
                </div>
                <span class="invalid-feedback" role="alert">
　　                <strong>必須項目です。</strong>
                </span>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">⑧	当館を知ったきっかけをお教え下さい</legend>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="howknow" value="広報誌" id="customRadioInline24" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('howknow')=='広報誌') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline24">広報誌</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="howknow" value="館のホームページ" id="customRadioInline25" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('howknow')=='館のホームページ') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline25">館のホームページ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="howknow" value="知人などから" id="customRadioInline26" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('howknow')=='知人などから') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline26">知人などから</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="howknow" value="チラシ・ポスター" id="customRadioInline27" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('howknow')=='チラシ・ポスター') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline27">チラシ・ポスター</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="howknow" value="その他" id="customRadioInline28" class="custom-control-input @error('transportation') is-invalid @enderror" @if( old('howknow')=='その他') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline28">その他</label>
                </div>
                <span class="invalid-feedback" role="alert">
　　                <strong>必須項目です。</strong>
                </span>
            </div>
            </div>    
            
            <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-6">⑨	当館をまた利用したいと思いますか。</legend>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="comeagain" value="利用したい" id="customRadioInline29" class="custom-control-input @error('comeagain') is-invalid @enderror" @if( old('comeagain')=='利用したい') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline29">利用したい</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="comeagain" value="利用したくない" id="customRadioInline30" class="custom-control-input @error('comeagain') is-invalid @enderror" @if( old('comeagain')=='利用したくない') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline30">利用したくない</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="comeagain" value="どちらでもない" id="customRadioInline31" class="custom-control-input @error('comeagain') is-invalid @enderror" @if( old('comeagain')=='どちらでもない') checked="checked" @endif required>
                    <label class="custom-control-label" for="customRadioInline31">どちらでもない</label>
                </div>
                <span class="invalid-feedback" role="alert">
　　                <strong>必須項目です。</strong>
                </span>
            </div>
            </div>    
            
            <div class="form-group pb-3">
                <label for="Textarea">⑩	理由をお聞かせください</label>
                <textarea name="comeagainform" class="form-control @if($errors->has('comeagainform')) is-invalid @endif" id="Textarea" rows="3" required>{{ old('comeagainform') }}</textarea>
                @if($errors->has('comeagainform'))
                    <div class="invalid-feedback">{{ $errors->first('comeagainform') }}</div>
                @else
                    <div class="invalid-feedback">必須項目です</div>
                @endif
            </div>
            
            <div class="form-group pb-3">
                <label for="Textarea">⑪	来館したことがない、知らなかったと答えた方に質問です。この館のイメージや何を行っているかお教え下さい。</label>
                <textarea name="image" class="form-control @if($errors->has('image')) is-invalid @endif" id="Textarea" rows="3" required>{{ old('image') }}</textarea>
                @if($errors->has('image'))
                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                @else
                    <div class="invalid-feedback">必須項目です</div>
                @endif
            </div>
            
            <div class="form-group row">
            <div class="col-sm-12">⑫	これまで訪れなかった要因は何ですか。または博物館に訪れる際に何を重要視しますか。（複数回答可）</div>
            <div class="col-sm-10">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="展示内容に興味がない" {{ is_array(old("reasonnotcoming")) && in_array("展示内容に興味がない", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck13">
                    <label class="custom-control-label" for="customCheck13">展示内容に興味がない</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="アクセス" {{ is_array(old("reasonnotcoming")) && in_array("アクセス", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck7">
                    <label class="custom-control-label" for="customCheck7">アクセス</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="入館料" {{ is_array(old("reasonnotcoming")) && in_array("入館料", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck8">
                    <label class="custom-control-label" for="customCheck8">入館料</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="子供向けかどうか" {{ is_array(old("reasonnotcoming")) && in_array("子供向けかどうか", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck9">
                    <label class="custom-control-label" for="customCheck9">子供向けかどうか</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="バリアフリーであるか" {{ is_array(old("reasonnotcoming")) && in_array("バリアフリーであるか", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck10">
                    <label class="custom-control-label" for="customCheck10">バリアフリーであるか</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="駐車場の有無" {{ is_array(old("reasonnotcoming")) && in_array("駐車場の有無", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck11">
                    <label class="custom-control-label" for="customCheck11">駐車場の有無</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" name="reasonnotcoming[]" value="その他" {{ is_array(old("reasonnotcoming")) && in_array("その他", old("reasonnotcoming"), true)? 'checked="checked"' : '' }} class="custom-control-input" id="customCheck12">
                    <label class="custom-control-label" for="customCheck12">その他</label>
                </div>
                @if($errors->has('reasonnotcoming'))
                    <div class="text-danger">最低一つはチェックをしてください</div>
                @endif
            </div>
            </div>
            
            <div class="form-group pb-3">
                <label for="Textarea">	その他の場合は以下にご入力ください</label>
                <textarea name="reasonnotcomingform" class="form-control @if($errors->has('reasonnotcomingform')) is-invalid @endif" id="Textarea" rows="3">{{ old('reasonnotcomingform') }}</textarea>
            </div>
            
            <div class="form-group pb-3">
                <label for="Textarea">⑬	その他、ご意見・ご提案等ございましたらご自由に入力してください</label>
                <textarea name="option" class="form-control @if($errors->has('option')) is-invalid @endif" id="Textarea" rows="3">{{ old('option') }}</textarea>
            </div>
            
            <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info btn-block">確認</button>
            </div>
            </div>   
        </form>
        </section>
        
        
            
@include("layouts.footer" )
@endsection