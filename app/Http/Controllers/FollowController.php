<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
   public function follow(User $user)
   {
    if(auth()->id() == $user->id)
    {
        return redirect()->back()->with('error','you cannot follow yourself');
    }
    auth()->user()->follow($user);

    return redirect()->back()->with('status','Follow Request Sent');
   }

   public function unfollow(User $user)
   {
    auth()->user()->unfollow($user);
    return redirect()->back()->with('status','unfollowed Succefully');
    
   }
}