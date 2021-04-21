<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
//use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
         return view('reviews.index')->with(['reviews' => $review->get()]);
    }

    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Review $review, Request $request)
    {
        $input = $request['review'];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
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