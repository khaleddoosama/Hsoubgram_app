<?php
namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostCommented extends Notification
{
    use Queueable;

    public function __construct(public Post $post, public User $commenter)
    {

    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [

            'type'         => 'comment',
            'message'      => __('commented on your post'),
            'username'     => $this->commenter->username,
            'user_image'   => $this->commenter->image,
            'post_link'    => route('show_post', $this->post->slug),
            'comment_body' => request('body'),
            'created_at'   => now()->toTimeString(),
        ];
    }

}