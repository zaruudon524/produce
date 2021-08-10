<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
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
        $museums = Museum::orderBy('name', 'asc')->get();
        return view('index')->with(['museums' => $museum ->getPaginateByLimit()]);
    }
    
    public function show(Museum $museum, Review $review)
    {
        $reviews = Museum::find($museum->id)->reviews;
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        
        return view('show')->with(['museum' => $museum, 'reviews' => $reviews, 'isBookmarked' =>$isBookmarked]);
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
    
    // public function history(Review $reviews, Museum $museum, User $user)
    // {
    //     //  $reviews = Museum::find($museum->id)->reviews->get;
    //     $reviews= $museum -> review()->get();
    //     // $museums = $user->museums(); 
    //     return view(history)->with(['musums'=>$museum, 'reviews'=>$reviews]);
    // }
    
    public function search(Request $request)
    {
         $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
        env('TWITTER_API_SECRET'),
        env('TWITTER_API_KEY_ACCESS_TOKEN'),
        env('TWITTER_API_KEY_ACCESS_TOKEN_SECRET'));

        $tweets=$twitter->get('1.1/statuses/user_timeline.json');
        // dd($tweets);

        // dd($request);
         $search = $request->search;
         $museums = Museum::scopeSearch($search)->orderBy('created_at', 'desc')->paginate(10);
        return view('search')->with(['museums'=>$museums,'search' => $search, 'tweets'=> $tweets]);
    }
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/public');
    }
}
