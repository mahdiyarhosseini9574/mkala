<?php

namespace App\Models;

use App\Traits\HasLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,HasLike;
    protected $fillable = [
        'title', 'user_id', 'category_id', 'brand_id','likes', 'description', 'meta_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return$this->belongsTo(Category::class);
    }

    public function comments()
    {
     return $this->morphMany(Comment::class,'commentable');
    }

    public function brand()
    {
     $this->belongsTo(Brand::class);
    }
public function images(){
        return $this->morphMany(Image::class,'imageable');
}
    public function views(): MorphMany
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function orderItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
