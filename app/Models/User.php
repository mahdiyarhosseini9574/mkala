<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasComment;
use App\Traits\HasImage;
use App\Traits\HasLike;
use App\Traits\HasUuid;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Zoha\Metable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasImage, HasUuid,Metable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'family', 'phone', 'email', 'uuid', 'email_verified_at', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $name): bool
    {
        return $this->roles()->where('name', $name)->exists();
    }

    public function hasPermission(string $name): bool
    {
        $per = Permission::where('name', '=', $name)->first();

        if (!$per) {
            return false;
        }
        foreach ($per->roles()->pluck('name') as $item) {
            if ($this->hasRole($item)) {
                return true;
            }
        }
        return false;

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }



    public function views()
    {
        return $this->hasMany(View::class);
    }
}
