<?php

namespace App\Repositoryes\Product;

use App\Models\Product;
use App\Repositoryes\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function highPriceProduct();

    public function mostView();


    public function mostCommented();
}
