<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',


    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ideas()
    {
        return $this->hasMany(Ideas::class)->orderBy("created_at","DESC");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy("created_at","DESC");
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();

    }
    public function follows(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function likes()
    {
        return $this->belongsToMany(Ideas::class, 'idea_like', 'user_id','idea_id')->withTimestamps();
    }
    public function likesIdea(Ideas $idea)
    {
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }



//    public function getImageURL()
//    {
//        if($this->image){
//            return  url('storage/'. $this->image);
//        }
//        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed{$this->name}";
//    }
}
