<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationDropdown extends Component
{

    public $notification;
    
    protected $listeners =['likedToggled'=>'refreshNotification'];
    
    public function refreshNotification()
    {
        if(Auth::check()){
            $this->notification=Auth::user()->unreadNotifications()->take(5)->get();
        }
    }

    public function markAsReadnAndRedirect($notificationId ,$url)
    {
        
        if(Auth::check()){
            Auth::user()->unreadNotifications()
                    ->where('id',$notificationId)
                    ->update(['read_at'=>now()]);
        
                $this->refreshNotification();
                return redirect()->to($url);
                }
    }
    public function render()
    {
        $this->refreshNotification();
        return view('livewire.notification-dropdown');
    }
}