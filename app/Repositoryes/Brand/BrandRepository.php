<?php

namespace App\Repositoryes\Brand;

use App\Models\Brand;
use App\Repositoryes\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
public function __construct(Brand $brand)
{
    parent::__construct($brand);
}
}
