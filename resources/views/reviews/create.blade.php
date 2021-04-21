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
       <form action="/reviews" method="POST">
           @csrf
           <div class="name">
               <h2>name</h2>
               <input type="text" name="review[name]" placeholder="名前" value="{{ old('review.name') }}"/><br>
               <p class="name__error" style="color:red">{{ $errors->first('review.neme') }}</p>
           </div>
           <div class="title">
                <h3>title</h3>
                <input type="text" name="review[title]" placeholder="タイトル" value="{{ old('review.title') }}"/><br>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="review[body]" placeholder="本文">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
        </div>
        <input type="submit" value="保存"/>
                </form>
         <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
