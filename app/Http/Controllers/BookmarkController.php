<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
     public function index(Request $request)
    {
         return view('bookmark.index')->with(['museums' => $museum->get()]);
    }
    
    public function bookmark()
    {
        return view('bookmark.bookmark');
    }
}
