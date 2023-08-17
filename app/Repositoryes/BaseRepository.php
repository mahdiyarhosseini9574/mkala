<?php

namespace App\Repositoryes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(private readonly Model $model)
    {
    }

    public function store(array $payload = []): Model
    {
        return $this->model->create();
    }

    public function update($eloquent, array $payload = []): Model
    {
        // TODO: Implement update() method.
    }

    public function delete($eloquent): bool
    {
        // TODO: Implement delete() method.
    }

    public function query(array $payload = []): Builder
    {
        $this->model->query();
    }
}
