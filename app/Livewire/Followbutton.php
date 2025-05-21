<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followbutton extends Component
{
    public $userFriend;
    public $isFollowing;
    public $isPending;
    public $classes;
    public $showbg;
    
    public function mount($userFriend , $showbg=false)
    {
        $this->userFriend = $userFriend;
        $this->updatefollowstatus();
        $this->showbg=$showbg;
    }

    public function toggle_follow()
    {
        $user = Auth::user();
        if ($this->isFollowing) {
            $user->unfollow($this->userFriend);
        } elseif (! $this->isPending) {
            $user->follow($this->userFriend);
            $this->dispatch('toggleFollow');
        }
        
        $this->updatefollowstatus();
    }

    public function updatefollowstatus()
    {
        $this->isFollowing = Auth::user()->isFollowing($this->userFriend);
        $this->isPending   = Auth::user()->isPending($this->userFriend);
    }

    public function render()
    {
        return view('livewire.followbutton');
    }
}