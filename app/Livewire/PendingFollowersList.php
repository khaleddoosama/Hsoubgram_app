<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PendingFollowersList extends Component
{
    protected $follower;
    
    protected $listeners=['reqConfirmed'=>'$refresh','reqDeleted'=>'$refresh','toggleFollow'=>'$refresh'];
    
    public function confirm($id)
    {
        $this->follower=User::find($id);
        Auth::user()->confirm($this->follower);
        $this->dispatch('reqConfirmed');
    }
    
    public function delete($id)
    {
        $this->follower=User::find($id);
        Auth::user()->deleteFollowingReq($this->follower);
        $this->dispatch('reqDeleted');
    }
    public function render()
    {
        return view('livewire.pending-followers-list');
    }
}