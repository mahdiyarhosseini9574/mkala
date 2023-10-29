<?php

namespace App\Repositoryes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function query(array $payload = []): Builder;

    public function store(array $payload = []): Model;

    public function update($eloquent, array $payload = []): Model;

    public function delete($eloquent): bool;

    public function paginate($limit=10,array $payload=[]);

    public function get(array $payload = []);


    public function find(int $id,array $payload = ['*']): Model;

    public function findByUuid(string $uuid,array $payload = ['*']): Model;

    public function restore(int $id): bool;

    public function forcedelete(int $id): bool;

}
