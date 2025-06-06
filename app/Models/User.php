<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'email',
        'password',
        'bio',
        'private_account',
        'lang',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {//user_id
        return $this->hasMany(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->belongsToMany(Post::class,'likes');
    }
    
    public function following()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id')->withPivot('confirmed');
    }

    public function follower()
    {
        return $this->belongsToMany(User::class,'follows','following_user_id','user_id')->withPivot('confirmed');
    }
    
    public function suggested_users()
    {
        /** @var \App\Models\User $user */
        $user=Auth::user();
        
        return User::where('id','!=',$user->id)
        ->whereNotIn('id',$user->following()->pluck('users.id'))
        ->inRandomOrder()
        ->limit(5)
        ->get();
    }
    
    public function follow(User $user)
    {
        if($this->id == $user->id)
        {
            return;
        }

        if($user->private_account)
        {
            $this->following()->attach($user,['confirmed'=>false]);
        }
        else
        {
            $this->following()->attach($user,['confirmed'=> true]);
        }
        
    }

    public function unfollow(User $user)
    {
        return $this->following()->detach($user->id);
    
    }
    public function isPending(User $user)
    {
        return $this->following()->where('following_user_id',$user->id)->where('confirmed' , false)->exists();
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('following_user_id',$user->id)->where('confirmed',true)->exists();
    }

    public function pending_followers()
    {
        return $this->follower()->where('confirmed',false);
    }

    public function confirm(User $user)
    {
        return $this->follower()->where('user_id',$user->id)->update(['confirmed'=>1]);
    }

    public function deleteFollowingReq(User $user)
    {
        return $this->follower()->detach($user);
    }

    
    
}