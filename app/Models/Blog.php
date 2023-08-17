<?php

namespace App\Models;

use App\Traits\HasLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,HasLike;
    protected $fillable = [
        'name','title', 'user_id', 'category_id', 'description', 'meta_description',
    ];
    public function  user(){
        return $this->belongsTo(User::class);

    }

    public function category(){
    return $this->belongsTo(Category::class);

    }

    public function comments()
    {
return $this->morphMany(Comment::class,'commentable');
    }

    public function images()
    {
       return $this->morphMany(Image::class,'imageable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }


}
