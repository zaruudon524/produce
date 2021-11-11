<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
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
        
        foreach($reviews as $review){
            // $reviews=Review::paginate(2);
        $museum_id = $review->museum_id;
        $museum_name = optional($museum->find($museum_id))->name;
        $review->museum_name = $museum_name;
        }
        // $users=$user->id;
        //userのidを指定、＄usersに格納。useridをreviewsに渡す
        // $reviews=User::find($users)->reviews;
        
        return view('reviews.show')->with(['review' => $review, 'museums' => $museum, 'user' =>$user]);
    }
    
    public function history(User $user, Review $review, Museum $museum)
    {
        $reviews = $user->reviews()->paginate(3);
        // 博物館名表示
        
        foreach($reviews as $review){
            // $reviews=Review::paginate(2);
        $museum_id = $review->museum_id;
        $museum_name = optional($museum->find($museum_id))->name;
        $review->museum_name = $museum_name;
        // dd($reviews);
        
        }
        // $museums = $museum ->get();
        
        return view('reviews.history')->with(['reviews'=>$reviews]);
    }
    
    
    public function create(Museum $museum, Review $review, User $user)
    {
        return view('reviews.create')->with(['museum' => $museum]);
    }

    public function store(Review $review, ReviewRequest $request, Museum $museum, User $user)
    {
        $input = $request['review'];
        // 入力情報全取得
        $input['museum_id']=$museum->id;
        //リレーション、museumidを渡す
        // $input['user_id']=$review->users()->where('user_id', Auth::id());
        // $input['user_id']=$review->Auth::id;
        // $reviews=$user->reviews;
        // $input['user_id']=$user->id
        
        // $review->museum_id=$request->museums()->id;
        // $review->museums->name = $request->name;
        
        $review->user_id=$request->user()->id;
        
        //リレーション、user_idを渡す
        $review->fill($input)->save();
        
        // 画像の保存
        if($request->post_img){
        if($request->post_img->extension() == 'gif' || $request->post_img->extension() == 'jpeg' || $request->post_img->extension() == 'jpg' || $request->post_img->extension() == 'png'){
        $request->file('post_img')->storeAs('public/post_img', $review->id.'.'.$request->post_img->extension());
        }}

        return redirect('/public/' . $museum->id);
    }
    
    public function edit(Review $review)
    {
        return view('reviews.edit')->with(['review' => $review]);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();

        return redirect('/reviews/' . $review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
         return redirect('/reviews');
    }
}