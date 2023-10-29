<?php

namespace App\Http\Services\User;

use App\Http\Services\MediaUploder\MediaUploader;
use App\Models\User;
use App\Repositoryes\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreUserService
{
    public function __construct(
        private readonly UserRepositoryInterface $repository,
        private readonly MediaUploader           $uploader,

    )
    {
    }

    public function handle(array $payload = []): User
    {
        return DB::transaction(function () use ($payload) {
            $payload['user_id'] = auth()->id();
            $model = $this->repository->store($payload);
            if (!empty($payload['image'])) {
                $res = $this->uploader->upload($payload['image']);
                $model->images()->create([
                    'url' => $res['url'],
                    'size' => $res['size'],
                    'extension' => $res['extension'],
                ]);
            }
            return $model;
        });
    }
}
