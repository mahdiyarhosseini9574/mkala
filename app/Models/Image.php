<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageable_id', 'imageable_type', 'url',
    ];

    public function imagable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}