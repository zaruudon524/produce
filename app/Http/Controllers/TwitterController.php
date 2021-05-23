<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function tweet(Request $request)
    {
        $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
        env('TWITTER_API_SECRET'),
        env('TWITTER_API_KEY_ACCESS_TOKEN'),
        env('TWITTER_API_KEY_ACCESS_TOKEN_SECRET'));
        
        $twitter->post("statuses/update", [
            "status" =>
            '新しい博物館の情報が投稿されました！！' . PHP_EOL .
            '「'.$museum->place .' / '. $museum->name .'」' . PHP_EOL .
            ''.$museum->body.'' . PHP_EOL .
            '#博物館　#'.$museum->place.' #'.$museum->name.' #'.$museum->body.'' . PHP_EOL .
            // 'http:' . $id
        ]);
    }
}
