<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumRequest;
use App\Museum;
use App\Review;
use App\User;
use App\Pref;
use App\Museumkind;
use Illuminate\Support\Facades\DB;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function show(Museum $museum, Review $review)
    {
        $reviews = Museum::find($museum->id)->reviews;
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        
        // ユーザーネーム表示
        foreach($reviews as $review){
            $user_id = $review->user_id;
            $user_name = User::find($user_id)->name;
            $review->user_name = $user_name;
        }
        
        $museums=$museum->paginate(2);
        
        return view('show')->with(['museum' => $museum, 'museums'=>$museums, 'reviews' => $reviews, 'review'=>$review, 'isBookmarked' =>$isBookmarked]);
    }
    
    
    
    public function good(User $user, Museum $museum)
    {
        $museums = $user->museums()->paginate(5);
        // dd($museums);
        return view('good')->with(['museums'=>$museums]);
    }

    
    public function deletebookmark(Museum $museum)
    {
        $museum->users()->detach(Auth::id());
        
        return redirect('/public/' . $museum->id);
    }

    public function bookmark(Museum $museum)
    {
        $museum->users()->attach(Auth::id());
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        return redirect('/public/' . $museum->id);
        // return view('bookmark')->with(['museums'=>$museum, 'isBookmarked'=>$isBookmarked]);
    }
    
    
    public function search(Request $request, Museum $museum)
    {
        // $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
        // env('TWITTER_API_SECRET'),
        // env('TWITTER_API_KEY_ACCESS_TOKEN'),
        // env('TWITTER_API_KEY_ACCESS_TOKEN_SECRET'));
        // $tweets=$twitter->get('1.1/statuses/user_timeline.json');
        // dd($request);
        // 検索
        // input()で検索時に入力した項目を取得
        // $search = $request->input('search');
        $places = Pref::all();
        $bodies = Museumkind::all();
        
        $searchWord = $request->input('searchWord');
        $placeId = $request->input('placeId');
        $bodyId = $request->input('bodyId');
        $query = Museum::query();
        // if($search){
        //     $museums = Museum::Search($search)->orderBy('created_at', 'desc')->paginate(2);
        // }else{
        //     $museums=Museum::paginate(3);
        // }
        if (isset($searchWord)) {
            $query->where('name',  'like', '%' . $searchWord . '%');
        }
        
        if (isset($placeId)) {
            $query->where('place', $placeId);
        }
        
        if (isset($bodyId)) {
            $query->where('body', $bodyId);
        }
        // dd($museumsearches);
        $museumsearches= $query->paginate(2);
        
        $museums=$museum->paginate(2);

        return view('search')->with(['museumsearches'=>$museumsearches, 'places'=>$places, 'bodies'=>$bodies, 'museums'=>$museums, 'searchWord'=>$searchWord]);
    }
    
    public function edit(Museum $museum)
    {
        return view('edit')->with(['museum' => $museum]);
    }
    
    public function update(MuseumRequest $request, Museum $museum)
    {
        $input_museum = $request['museum'];
        $museum->fill($input_museum)->save();
        
        return redirect('/public/' . $museum->id);
    }
    
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/');
    }
}
