<?php

namespace App\Http\Services\Brand;

use App\Models\Brand;
use App\Repositoryes\Brand\BrandRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UpdateBrandService
{
    public function __construct
    (
        private readonly BrandRepositoryInterface $repository,

    )
    {
    }

    public function handle($ele ,array $payload): Brand
    {


        $ele->update($payload);
            return $ele;


    }

}
