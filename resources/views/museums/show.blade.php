<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Museum</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿</h1>
        <p class="edit">[<a href="/museums/{{ $museum->id }}/edit">edit</a>]</p>
            <input type="submit" style="display:none">
            <input type="submit" value="bookmark"/>
        <form>
            <div class='museums'>
                <h2 class='name'>{{ $museum->name }}</h2>
                <h2 class='place'>{{ $museum->place }}</h2>
                <p class='time'>{{ $museum->time }}</p>
                <p class='day'>{{ $museum->day }}</p>
               <p class='money'>{{ $museum->money }}</p>
               <p class='traffic'>{{ $museum->traffic }}</p>
               <p class='sns'>{{ $museum->sns }}</p>
               <p class='tel'>{{ $museum->tel }}</p>
               <p class='homepage'>{{ $museum->homepage }}</p>
               <p class='other'>{{ $museum->other }}</p>
                <p class='updated_at'>{{ $museum->updated_at }}</p>
            </div>
            <form action="/museums/{{ $museum->id }}" id="form_{{ $museum->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button> 
        </form>
            <div class="back">[<a href="/">back</a>]</div>
            <script>
                function deleteMuseum(e) {
                    'use strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
    </body>
</html>
