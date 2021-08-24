<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//The solve here is correct direction of User class> Models/User
use App\Models\User;

class FollowsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function store(User $user)
   {
       return auth()->user()->following()->toggle($user->profile);
   }

}
