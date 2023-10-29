<?php

namespace App\Http\Services\Brand;

use App\Models\Brand;
use App\Repositoryes\Brand\BrandRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreBrandService
{
    public function __construct
    (
        private readonly BrandRepositoryInterface $repository,

    )
    {
    }

    public function handle(array $payload): Brand
    {
        return DB::transaction(function () use ($payload) {
            $payload['user_id'] = auth()->id();
            return $this->repository->store($payload);
        });

    }

}
