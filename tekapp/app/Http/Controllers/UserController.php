<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allProfessors()
    {
      return User::where('type', 'professor')->with('name')->get();
    }

    //get all prix
    public function getAll()
    {
      $user= User::all(); 
      return $user;
    }
}
