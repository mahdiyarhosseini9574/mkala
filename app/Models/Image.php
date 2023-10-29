<?php

namespace App\Models;

use App\Traits\HasLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory,HasLike,SoftDeletes;
    protected $fillable = [
        'imageable_id', 'imageable_type', 'url', 'size', 'extension',
    ];

    public function imageable():MorphTo
    {
        return $this->morphTo();
    }


}
