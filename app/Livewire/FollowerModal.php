<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FollowerModal extends ModalComponent
{
     public $userId;
    protected $user;
    
    public function getFollowerListProperty()
    {
        $this->user=User::find($this->userId);
        return $this->user->follower()->wherePivot('confirmed',true)->get() ;
    }
    
    public function removeFollower($userId)
    {
        $follower=User::find($userId);
        $this->user=User::find($this->userId);
        $follower->unfollow($this->user);
        $this->dispatch('unfollowuser');
    }
    public function render()
    {
        return view('livewire.follower-modal');
    }
}