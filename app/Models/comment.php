<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory, SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

    /**
     * Relationship for replies to this comment (children).
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    /**
     * Relationship to the parent comment (if this is a reply).
     */
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
    public function likes(){
        return $this->hasMany(Like::class,'like_id');
    }
}
