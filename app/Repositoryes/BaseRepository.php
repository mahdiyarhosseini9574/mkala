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
        return $this->model->create($payload);
    }

    public function update($eloquent, array $payload = []): Model
    {
        $eloquent->update($payload);
        return $eloquent;
    }

    public function delete($eloquent): bool
    {
        return $eloquent->delete();
    }

    public function query(array $payload = []): Builder
    {
        return $this->model->query($payload);
    }

    public function paginate($limit = 10, $payload = [])
    {
        return $this->query($payload)->paginate($limit);

    }

    public function get(array $payload = [])
    {
        return $this->query($payload)->get();
    }

    public function find(int $id, array $payload = ['*']): Model
    {
        return $this->model->select($payload)->find($id);
    }

    public function findByUuid(string $uuid, array $payload = ['*']): Model
    {
        return $this->model->select($payload)->where('uuid', $uuid)->first();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function restore(int $id): bool
    {
        $model = $this->model->withTrashed()->where('id', $id)->firstOrFail();
        return $model->restore();
    }

    public function forcedelete(int $id):bool
    {
       return $this->model->find($id)->forceDelete();

    }
}
