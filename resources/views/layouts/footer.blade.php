<!doctype html>
<meta charset="utf-8">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/footer.js') }}" defer></script>

    </head>

    
    
    <!--<header>-->
    <!--    <div id="sampleHeader" class="headerStyle">-->
    <!--      <div class="hdStrBig">サンプルヘッダー</div>-->
    <!--      <div class="hdStrSmall">ヘッダーメニューなど</div>-->
    <!--      <div id="hdBtnArea" class="hdBtnStyle" onclick="goScroll('H')">▲</div>-->
    <!--    </div>-->
    <!--</header>-->
    
   <footer>
    <div id="sampleFooter" class="footerStyle">
    <!--<div class="hdStrSmall">フッターメニューなど</div>-->
    <a class="hdStrSmall" href='/public/{{ Auth::id() }}/good'>bookmark</a>
    
    <a class="hdStrSmall" href='/'>ホーム</a>
    
    <a class="hdStrSmall" href='/reviews/{{ Auth::id() }}/history'>投稿履歴</a> 
    
    <!--<div clas="hdStrBig">サンプルフッター</div>-->
   </footer> 
</html>
