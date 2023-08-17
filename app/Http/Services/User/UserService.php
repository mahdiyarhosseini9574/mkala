<?php

namespace App\Http\Services\User;

use App\Http\Services\Product\ProductService;
use App\Models\User;

class UserService
{
    private ProductService  $productservice;

    public function __construct(ProductService $service)
    {
        $this->productservice = $service;
    }

    public function store(array $payload): User
    {
        return User::create($payload);
    }

    public function update(User $user, array $payload): User
    {
        return $user->update($payload);
    }

    public function buyproduct(Product $product)
    {
$this->productservice->buy($product,auth()->user());
    }
}
