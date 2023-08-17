<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable= [
        'user_id', 'likeable_id', 'likeable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likeable()
    {
        return $this->morphTo();
    }


    public function getTitleAttribute():string
    {
        return match ($this->likeable_type) {
            User::class => $this->likeable->name,
            default => $this->likeable->title,
        };
    }
//    public function title():Attribute
//    {
//        return new Attribute(
//            get:fn($title)=>strtoupper($title)
//        );
//        if ($this->likeable_type== Product::class){
//            $product=$this->likeable->title;
//            return $product->name;
//        }
//        elseif ($this->likeable_type== BlogRepository::class){
//            $blog=BlogRepository::findOrFail($this->likeable_id);
//            return $blog->title;
//        }

}
