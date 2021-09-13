
@extends('layouts.app')

@section('content')
        <h1>投稿</h1>
       <form action="/museums" method="POST">
           @csrf
           <div class="tag">
               <h3>タグ</h3>
               <input type="text" name="museum[tag]" placeholder="タグ"/>
           </div>
           <div class="name">
               <h2>名前</h2>
               <input type="text" name="museum[name]" placeholder="名前" value="{{ old('museum.name') }}"/><br>
               <p class="name__error" style="color:red">{{ $errors->first('museum.name') }}</p>
           </div>
           <div class="place">
                <h3>場所</h3>
                <!--<input type="text" name="museum[place]" placeholder="場所" value=""/>-->
                <select name="museum[place]" value="{{ old('museum.place') }}">
                    <option disabled selected value>全国</option>
                    <option valie="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option valie="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select><br>
                <p class="place__error" style="color:red">{{ $errors->first('museum.place') }}</p>
            </div>
            <div class="body">
                <h3>属性</h3>
                <!--<input type="text" name="museum[body]" placeholder="属性" value=" }}"/>-->
                <select name="museum[body]" value="{{ old('museum.body') }}">
                    <option disabled selected value>館種</option>
                    <option value="総合">総合</option>
                    <option value="歴史・人文">歴史・人文</option>
                    <option value="自然・科学">自然・科学</option>
                    <option value="美術">美術</option>
                    <option value="動・水・植">動・水・植</option>
                </select><br>
            <!--    <select name="museum[body]" value="">-->
            <!--        <option disabled selected value>ジャンル</option>-->
            <!--        <option value="考古・歴史・民俗">考古・歴史・民俗</option>-->
            <!--        <option value="西洋美術">西洋美術</option>-->
            <!--        <option value="日本美術・東洋美術">日本美術・東洋美術</option>-->
            <!--        <option value="現代アート">現代アート</option>-->
            <!--        <option value="彫刻">彫刻</option>-->
            <!--        <option value="写真">写真</option>-->
            <!--        <option value="ファッション・着物">ファッション・着物</option>-->
            <!--        <option value="立体・工芸">立体・工芸</option>-->
            <!--        <option value="版画">版画</option>-->
            <!--        <option value="民芸・民具">民芸・民具</option>-->
            <!--        <option value="陶磁器">陶磁器</option>-->
            <!--        <option value="ガラス">ガラス</option>-->
            <!--        <option value="建築">建築</option>-->
            <!--        <option value="デザイン">デザイン</option>-->
            <!--        <option value="イラスト・絵本・マンガ・アニメ">イラスト・絵本・マンガ・アニメ</option>-->
            <!--        <option value="刀">刀</option>-->
            <!--        <option value="書">書</option>-->
            <!--        <option value="人形・ミニチュア">人形・ミニチュア</option>-->
            <!--        <option value="浮世絵">浮世絵</option>-->
            <!--        <option value="デジタルアート">デジタルアート</option>-->
            <!--        <option value="自然・科学">自然・科学</option>-->
            <!--        <option value="映画・映像">映画・映像</option>-->
            <!--        <option value="現代アート">現代アート</option>-->
            <!--        <option value="彫刻">彫刻</option>-->
            <!--        <option value="写真">写真</option>-->
            <!--</select><br>-->
                
                <p class="body__error" style="color:red">{{ $errors->first('museum.body') }}</p>
            </div>
            
            <div class="address">
                <h2>住所</h2>
                <textarea name="museum[address]" placeholder="住所"></textarea>
            </div>
            <div class="time">
                <h2>開館時間</h2>
                <textarea name="museum[time]" placeholder="時間"></textarea>
            </div>
            <div class="day">
                <h2>開館日</h2>
                <textarea name="museum[day]" placeholder="開館日"></textarea>
            </div>
            <div class="money">
                <h2>入館料</h2>
                <textarea name="museum[money]" placeholder="入館料"></textarea>
            </div>
            <div class="traffic">
                <h2>交通手段</h2>
                <textarea name="museum[traffic]" placeholder="交通手段"></textarea>
            </div>
            <div class="sns">
                <h2>公式アカウント</h2>
                <textarea name="museum[sns]" placeholder="公式アカウント"></textarea>
            </div>
            <div class="tel">
                <h2>問い合わせ</h2>
                <textarea name="museum[tel]" placeholder="問い合わせ"></textarea>
            </div>
            <div class="homepage">
                <h2>HP</h2>
                <textarea name="museum[homepage]" placeholder="HP"></textarea>
            </div>
            <div class="other">
                <h2>備考</h2>
                <textarea name="museum[other]" placeholder="備考"></textarea>
            </div>
        <input type="submit" value="保存"/>
                </form>
         <div class="back">[<a href="/">back</a>]</div>
 @endsection