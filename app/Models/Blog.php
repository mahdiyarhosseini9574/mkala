<?php

namespace App\Models;

use App\Traits\HasComment;
use App\Traits\HasImage;
use App\Traits\HasLike;
use App\Traits\HasUuid;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoha\Metable;

class Blog extends Model
{
    use HasFactory, HasLike, HasComment, HasUuid, HasImage, HasView, SoftDeletes,Metable;

    protected $fillable = [
        'title', 'user_id', 'category_id', 'description', 'meta_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);

    }


}
