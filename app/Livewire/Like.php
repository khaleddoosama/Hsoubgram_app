<?php
namespace App\Livewire;

use App\Notifications\PostLiked;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Like extends Component
{
    public $post;

    public function toggle_like()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $result=$user->likes()->toggle($this->post);


        if(!empty($result['attached']) && $this->post->owner->id != auth()->id()){

            $this->post->owner->notify(new PostLiked($this->post ,auth()->user()));
        }
        $this->dispatch('likeToggled');
    }

    public function render()
    {
        return view('livewire.like');
    }
}