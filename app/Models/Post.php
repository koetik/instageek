<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function postTag()
    {
        return $this->hasMany(PostTag::class);
    }

    public function likeIsAvailable()
    {
        $user       = auth()->user();
        $like = $this->like()->whereUserId($user->id)->first();
        if($like) {
            return $like->id;
        }
        return false;
    }
}
