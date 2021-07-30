<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
    public function index(Museum $museum)
    {
         return view('reviews.index')->with(['museums' => $museum->get()]);
    }

    public function show(Review $review, Museum $museum,User $user)
    {
        $reviews = $review ->get();
        $museums = $museum ->get();
        // $users=$user->id;
        //userのidを指定、＄usersに格納。useridをreviewsに渡す
        // $reviews=User::find($users)->reviews;
        
        return view('reviews.show')->with(['review' => $review, 'museums' => $museum, 'user' =>$user]);
    }
    
    // public function history(Review $reviews, Museum $museum, User $user)
    // {
    //     //  $reviews = Museum::find($museum->id)->reviews->get;
    //     $reviews= $museum -> review()->get();
    //     // $museums = $user->museums(); 
    //     return view(history)->with(['musums'=>$museum, 'reviews'=>$reviews]);
    // }
    
    public function history(User $user, Review $review)
    {
        $reviews = $user->reviews()->get(); 
        // $reviews = $user->reviews()->paginate(5);
        return view('reviews.history')->with(['reviews'=>$reviews]);
    }
    
    public function addhistory(Review $review)
    {
        $user=user()::find(Auth::id);
        $usr->reviews()->attach($review);
        // $review=user()->attach(Auth::id());
        // $addhistory=$review->users()->where('user_id', Auth::id());
        return redirect('/reviews/' . $user->id . history);
    }
    
    public function create(Museum $museum)
    {
        return view('reviews.create')->with(['museum' => $museum]);
    }

    public function store(Review $review, Request $request, Museum $museum, User $user)
    {
        $input = $request['review'];
        // 入力情報全取得
        $input['museum_id']=$museum->id;
        //リレーション、museumidを渡す
        // $input['user_id']=$review->users()->where('user_id', Auth::id());
        // $input['user_id']=$review->Auth::id;
        // $reviews=$user->reviews;
        // $input['user_id']=$user->id
        $review->user_id=$request->user()->id;
        //リレーション、user_idを渡す
        $review->fill($input)->save();
        return redirect('/public/' . $museum->id);
    }
    
    public function edit(Review $review)
    {
        return view('reviews.edit')->with(['review' => $review]);
    }
    
    public function update(Request $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();

        return redirect('/reviews/' . $review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
         return redirect('/');
    }
}