<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Follower extends Component
{

    public $userId;
    protected $user;
    
    protected $listeners =['unfollowuser'=>'$refresh'];
    
    public function getCountProperty()
    {
        $this->user=User::find($this->userId);
        return $this->user->follower()->wherePivot('confirmed',true)->count();
    }
    public function render()
    {
        return view('livewire.follower');
    }
}