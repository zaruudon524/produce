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
        <p class='create'>[<a href='/reviews/create'>create</a>]</p>
       <div class='reviews'>
             @foreach ($reviews as $review)
            <div class='review'>
                <h2><a href="/reviews/{{ $review->id }}">{{ $review->name }}</a>
               <h3 class='title'>{{ $review->title }}</h3>
               <p class='body'>{{ $review->body }}</p>
            </div>
            @endforeach   
       </div>
    </body>
</html>
