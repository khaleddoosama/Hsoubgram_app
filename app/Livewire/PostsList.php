<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostsList extends Component
{
    public $posts=[];
    protected $listeners=['toggleFollow'=>'loadPosts'];
    
    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $ids=Auth::user()->following()
        ->wherePivot('confirmed',true)->get()->pluck('id');

        $this->posts =Post::whereIn('user_id',$ids)->latest()->get();
    }
    public function render()
    {
        return view('livewire.posts-list');
    }
}