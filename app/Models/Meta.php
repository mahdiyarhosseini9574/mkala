<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Zoha\MetableModel;

class Meta extends MetableModel
{
    use HasFactory;






protected $fillable= ['key', 'value', 'type', 'status', 'owner_type', 'owner_id'];





}
