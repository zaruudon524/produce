<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
use App\Review


;
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
        return view('index')->with(['museums' => $museum ->get()]);
    }
    
    public function show(Museum $museum, Review $review)
    {
        $reviews = $review ->get();
         $museums = $museum ->get();
        // $review=$museum->museums()->where('museum_id');
        $isBookmarked=$museum->users()->where('user_id', Auth::id())->exists();
        // $reviews = $museum -> where('museum_id');
        return view('show')->with(['museum' => $museum, 'reviews' => $reviews, 'isBookmarked' =>$isBookmarked]);
    }
    
    public function comment(Review $review)
    {
        $reviews = $review -> where('museum_id');
        return view('show')->with(['reviews' => $reviews]);
    }
    
    public function deletebookmark(Museum $museum)
    {
        $museum->users()->detach(Auth::id());
        
        return redirect('/public/' . $museum->id);
    }
    
    public function bookmark(Museum $museum)
    {
        $museum->users()->attach(Auth::id());
        
        return redirect('/public/' . $museum->id);
    }
    
    public function search(Request $request)
    {
        // dd($request);
         $search = $request->search;
         $museums = Museum::scopeSearch($search)->orderBy('created_at', 'desc')->paginate(10);
        return view('search')->with(['museums'=>$museums,'search' => $search]);
    }
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/public');
    }
}
