<?php

namespace App\Models;

use App\Traits\HasLike;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, HasUuid, HasLike, SoftDeletes;

    protected $fillable = [
        'user_id', 'commentable_id', 'commentable_type', 'body', 'parent_id'
    ];

    public function user()

    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphTo();
    }

//    public function replies()
//    {
//        return $this->hasMany(Comment::class,'parent_id');
//    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}

