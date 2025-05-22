<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationCount extends Component
{
    public $unreadCount;
    
    public function render()
    {

        if (Auth::check()) {
            $this->unreadCount = Auth::user()->unreadNotifications()->whereNull('read_at')->count();

        } else {
            $this->unreadCount = 0;
        }
        return view('livewire.notification-count');
    }
}