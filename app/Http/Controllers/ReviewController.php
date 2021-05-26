<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Museum $museum)
    {
         return view('reviews.index')->with(['museums' => $museum->get()]);
    }

    public function show(Review $review, Museum $museum)
    {
        $museums = $museum ->get();
        // $review=$museum->museums()->where('museum_id');
        // $museum = $review -> where('museum_id');
        return view('reviews.show')->with(['review' => $review, 'museums' => $museum]);
    }

    public function create(Museum $museum)
    {
        return view('reviews.create')->with(['museum' => $museum]);
    }

    public function store(Review $review, Request $request, Museum $museum)
    {
        $input = $request['review'];
         $input['museum_id']=$museum->id;
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