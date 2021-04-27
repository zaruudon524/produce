<?php

namespace App\Http\Controllers;

use App\Museum;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumRequest;

class MuseumController extends Controller
{
    public function index(Museum $museum)
    {
         return view('museums.index')->with(['museums' => $museum->get()]);
    }

    public function show(Museum $museum)
    {
        return view('museums.show')->with(['museum' => $museum]);
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
        return redirect('/');
    }
    
}