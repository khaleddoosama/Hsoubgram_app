<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PendingFollowersCount extends Component
{

     protected $listeners=['reqConfirmed'=>'$refresh','reqDeleted'=>'$refresh','toggleFollow'=>'$refresh'];

     public function getCountProperty()
     {
        return Auth::user()->pending_followers()->count();
     }
    public function render()
    {
        return view('livewire.pending-followers-count');
    }
}