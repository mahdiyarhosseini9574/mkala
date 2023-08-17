<?php

namespace App\Repositoryes\Blog;

use App\Models\Blog;
use App\Repositoryes\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function toggle(Blog $blog): Blog;

}
