<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ideas extends Model
{
    use HasFactory;

    protected $with = ['user:id,name', 'comments.user'];

    protected $withCount = ['likes'];
    protected $fillable = [
        'idea',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id')->orderBy("created_at","DESC");
    }
    public function user()
    {
        return $this->belongsTo(User::class)->orderBy("created_at","DESC");
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like','idea_id', 'user_id')->withTimestamps();
    }
}
