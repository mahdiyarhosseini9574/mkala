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
}
