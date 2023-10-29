<?php

namespace App\Http\Services\User;

use App\Models\User;

class UserService
{

    public function __construct()
    {

    }

    public function store(array $payload): User
    {
        return User::create($payload);
    }

    public function update(User $user, array $payload): User
    {
            $user->update($payload);
            return $user;
    }

//    public function buyproduct(Product $product)
//    {
//$this->$product->buy($product,auth()->user());
//    }
}
