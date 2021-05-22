<?php

namespace App\Http\Controllers;

use App\Museum;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Tag;


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
        return view('museums.create');
    }

    public function store(Museum $museum, MuseumRequest $request)
    {
        $input = $request['museum'];
        $museum->fill($input)->save();
         
        return redirect('/museums/' . $museum->id);
        
    }
    
    public function edit(Museum $museum)
    {
        return view('museums.edit')->with(['museum' => $museum]);
    }
    
    public function update(Request $request, Museum $museum)
    {
        $input_museum = $request['museum'];
        $museum->fill($input_museum)->save();
        
        return redirect('/museums/' . $museum->id);
    }
    
    public function delete(Museum $museum)
    {
        $museum->delete();
        return redirect('/museums');
    }
}