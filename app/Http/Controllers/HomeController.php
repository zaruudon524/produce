<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\MuseumRequest;
use App\Museum;
use App\Review;
use App\User;
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
    public function index(Museum $museum)
    {
        $allnumbers = Museum::latest()->first();
        return view('index')->with(['museums' => $museum ->getPaginateByLimit(), 'allnumbers' => $allnumbers]);
    }
    
    public function show(Museum $museum, Review $review)
    {
        $reviews = Museum::find($museum->id)->reviews;
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        
        // ユーザーネーム表示
        $review = Auth::user()->reviews;
        $review = Auth::user()->select(['name'])->first();
        // $reviews->user_id = $request->user()->id;
        // $review->user->name = $request->user()->name;
        // dd($reviews);
        return view('show')->with(['museum' => $museum, 'reviews' => $reviews, 'review'=>$review, 'isBookmarked' =>$isBookmarked]);
    }
    
    
    
    public function good(User $user, Museum $museum)
    {
        $museums = $user->museums()->get(); 
        $museums = $user->museums()->paginate(5);
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
    
    
    public function search(Request $request)
    {
         $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
        env('TWITTER_API_SECRET'),
        env('TWITTER_API_KEY_ACCESS_TOKEN'),
        env('TWITTER_API_KEY_ACCESS_TOKEN_SECRET'));

        $tweets=$twitter->get('1.1/statuses/user_timeline.json');
        // dd($tweets);

        // dd($request);
        // 検索
        // $search = $request->search;
        // $museums = Museum::scopeSearch($search)->orderBy('created_at', 'desc')->paginate(10);
         
        $prefecture = $request->prefecture;
        $museums = Museum::prefecture($prefecture)->orderBy('created_at', 'desc')->paginate(10);
        
        $museumkind = $request->museumkind;
        $museums = Museum::museumkind($museumkind)->orderBy('created_at', 'desc')->paginate(10);
        
        $museumname = $request->museumname;
        $museums = Museum::museumname($museumname)->orderBy('created_at', 'desc')->paginate(10);
        
        // $museumgenre = $request->museumgenre;
        // $museums = Museum::museumgenre($museumgenre)->orderBy('created_at', 'desc')->paginate(10);
         
        return view('search')->with(['museums'=>$museums, 'prefecture'=>$prefecture, 'museumkind' => $museumkind, 'museumname' => $museumname, 'tweets'=> $tweets]);
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
        return redirect('/public');
    }
}
