<?php

namespace App\Repositoryes\Comment;

use App\Models\Comment;
use App\Repositoryes\BaseRepository;
use App\Repositoryes\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
public function __construct(Comment $model)
{
    parent::__construct($model);
}
}
