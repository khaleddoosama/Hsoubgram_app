<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostLiked extends Notification
{
    use Queueable;

    public function __construct(public Post $post,public User $likedBy)
    {
        
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }
    
    public function toDatabase($notifiable)
    {
        return[

          'type'=>'like',
         'message'      => __('liked on your post'),
          'username'=> $this->likedBy->username,
          'user_image'=> $this->likedBy->image,
          'post_link' =>route('show_post',$this->post->slug),  
          'created_at'=> now()->toTimeString()
        ];
    }
}