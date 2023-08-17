<?php

namespace App\Repositoryes\Blog;

use App\Models\Blog;
use App\Repositoryes\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }


    public function toggle(Blog $blog): Blog
    {

    }
}
