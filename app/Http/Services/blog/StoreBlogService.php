<?php

namespace App\Http\Services\blog;

use App\Http\Services\MediaUploder\MediaUploader;
use App\Models\Blog;
use App\Repositoryes\Blog\BlogRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreBlogService
{
    public function __construct(
        private readonly BlogRepositoryInterface $repository,
        private readonly MediaUploader           $uploader,
    )
    {
    }

    public function handle(array $payload): Blog
    {
        return DB::transaction(function () use ($payload) {
            $payload['user_id'] = auth()->id();
            $model = $this->repository->store($payload);
            if (!empty($payload['image'])) {
                $res = $this->uploader->upload($payload['image']);
                $model->images()->create([
                    'url' => $res['url'],
                    'size'=> $res['size'],
                    'extension'=>$res['extension'],
                ]);
            }
            return $model;
        });
    }
}
