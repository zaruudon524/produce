<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 <title>Museum</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿</h1>
        <p class='create'>[<a href='/museums/create'>create</a>]</p>
       <div class='museums'>
`           @foreach($museums as $museum)
            <div class='museum'>
                <h2><a href=/museums/{{ $museum->id }}">{{ $museum->name }}</a></br>
                <p class='place'>場所</p>
               <p class='place'>{{ $museum->place }}</p></bro>
               <p class='time'>時間</p>
               <p class='time'>{{ $museum->time }}</p></bro>
               <p class='day'>開館日</p>
               <p class='day'>{{ $museum->day }}</p></bro>
               <p class='money'>入館料</p>
               <p class='money'>{{ $museum->money }}</p></bro>
               <p class='traffic'>交通手段</p>
               <p class='traffic'>{{ $museum->traffic }}</p></bro>
               <p class='sns'>SNS</p>
               <p class='sns'>{{ $museum->sns }}</p></bro>
               <p class='tel'>問い合わせ</p>
               <p class='tel'>{{ $museum->tel }}</p></bro>
               <p class='homepage'>ホームページ</p>
               <p class='homepage'>{{ $museum->homepage }}</p></bro>
               <p class='other'>備考</p>
               <p class='other'>{{ $museum->other }}</p></bro>
            </div>
             @endforeach  
       </div>
    </body>
</html>
