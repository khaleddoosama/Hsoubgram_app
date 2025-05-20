<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Like extends Component
{
    public $post;

    public function toggle_like()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->likes()->toggle($this->post);

        $this->dispatch('likeToggled');
    }

    public function render()
    {
        return view('livewire.like');
    }
}