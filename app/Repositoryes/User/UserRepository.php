<?php

namespace App\Repositoryes\User;

use App\Models\User;
use App\Repositoryes\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
public function __construct(User $user)
{
    parent::__construct($user);
}
}
