<?php

namespace App\Models;

use App\Traits\HasComment;
use App\Traits\HasImage;
use App\Traits\HasLike;
use App\Traits\HasUuid;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory, HasLike, HasUuid, HasComment,HasImage,HasView;

    protected $fillable = [
        'title', 'user_id', 'category_id', 'brand_id', 'likes', 'description', 'meta_description', 'uuid', 'published', 'inventory','price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
       return $this->belongsTo(Brand::class);
    }


    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
