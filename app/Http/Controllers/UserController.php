<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use　App\User;
use Illuminate\Support\Facades\Auth;


    class UserController extends Controller
{
    public function bookmarks()
    {
        $museum=Museum::find($museumId);
        $museum->users()->attach($userId);
    }
    
    // public function history()
    // {
    //     $reviews=User::find($userId);
    // }
}