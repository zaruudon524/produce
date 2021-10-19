<?php

namespace App\Http\Controllers;

use App\Museum;
use App\User;
use App\Pref;
use App\Museumkind;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumRequest;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use App\Tag;
use Abraham\TwitterOAuth\TwitterOAuth;


class MuseumController extends Controller
{
    public function index(Museum $museum, Request $request)
    {
         return view('index')->with(['museums' => $museum -> get()]);
    }

    public function show(Museum $museum)
    {
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        return view('museums.show')->with(['museum' => $museum, 'isBookmarked' =>$isBookmarked]);
    }

    public function create()
    {
        $places=Pref::all();
        
        // foreach($reviews as $review){
        //     $user_id = $review->user_id;
        //     $user_name = User::find($user_id)->name;
        //     $review->user_name = $user_name;
        // }
        // $places = Museum::with('place_id');
        // $places = Museum::where('pref');
        $bodies = Museumkind::all();
        // dd($places);
        return view('museums.create')->with(['places'=>$places, 'bodies'=>$bodies]);
    }

    public function store(Museum $museum, Request $request)
    {
        $input = $request['museum'];
        
        
        // $museum->name = $request->input('museum[name]');
        // $museum->place_id=$request->museum[place];
        // $museum->body_id=$request->museum[body];
        // $museum->address = $request->input('museum[address]');
        // $museum->time = $request->input('museum[time]');
        // $museum->day = $request->input('museum[day]');
        // $museum->money = $request->input('museum[money]');
        // $museum->traffic = $request->input('museum[traffic]');
        // $museum->sns = $request->input('museum[sns]');
        // $museum->tel = $request->input('museum[tel]');
        // $museum->homepage = $request->input('museum[homepage]');
        // $museum->other = $request->input('museum[other]');
        // $museum->save();
        $museum->fill($input)->save();
        dd($request);
        
        
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
    
    
    // public function edit(Museum $museum)
    // {
    //     return view('museums.edit')->with(['museum' => $museum]);
    // }
    
    // public function update(Request $request, Museum $museum)
    // {
    //     $input_museum = $request['museum'];
    //     $museum->fill($input_museum)->save();
        
    //     return redirect('/museums/' . $museum->id);
    // }
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/museums');
    }
}