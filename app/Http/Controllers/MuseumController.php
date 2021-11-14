<?php

namespace App\Http\Controllers;

use App\Museum;
use App\User;
use App\Pref;
use App\Museumkind;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumRequest;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use Abraham\TwitterOAuth\TwitterOAuth;


class MuseumController extends Controller
{
    public function show(Museum $museum)
    {
        $places=Pref::all();
        $bodies = Museumkind::all();
        return view('museums.show')->with(['museum' => $museum, 'places'=>$places, 'bodies'=>$bodies]);
    }

    public function create(Museum $museum)
    {
        $places=Pref::all();
        $bodies = Museumkind::all();
        $museums = Museum::all();
        
        foreach($museums as $museum){
            $place_id = $museum->place_id;
            $place_name = optional($places->find($place_id))->name;
            $museum->place_name = $place_name;
        }
        
        return view('museums.create')->with(['places'=>$places, 'bodies'=>$bodies, 'museums'=>$museums]);
    }

    public function store(Museum $museum, MuseumRequest $request)
    {
        $input = $request['museum'];
        $museum->fill($input)->save();
        
        // $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
        // env('TWITTER_API_SECRET'),
        // env('TWITTER_API_KEY_ACCESS_TOKEN'),
        // env('TWITTER_API_KEY_ACCESS_TOKEN_SECRET'));
        
        // $twitter->post('1.1/statuses/update.json', ["status"=>'Ok']);
            // "status" =>
            // '新しい博物館の情報が投稿されました！！' . PHP_EOL .
            // '「'.$museum->place .' / '. $museum->name .'」' . PHP_EOL .
            // ''.$museum->body.'' . PHP_EOL .
            // '#博物館　#'.$museum->place.' #'.$museum->name.' #'.$museum->body.'' . PHP_EOL .
            // 'http:' . $id
        return redirect('/museums/' . $museum->id);
    }
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/');
    }
}