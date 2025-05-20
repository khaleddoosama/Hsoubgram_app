<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FollowingModal extends ModalComponent
{
    public $userId;
    protected $user;
    
    public function getFollowingListProperty()
    {
        $this->user=User::find($this->userId);
        return $this->user->following()->wherePivot('confirmed',true)->get() ;
    }
    public function unfollow($userId)
    {
        $following_list=User::find($userId);
        Auth::user()->unfollow($following_list);
        $this->dispatch('unfollowuser');
    }
    
    public function render()
    {
        return view('livewire.following-modal');
    }
}