<?php

namespace App\Http\Services\Product;

use App\Http\Services\MediaUploder\MediaUploader;
use App\Models\Product;
use App\Repositoryes\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreProductService
{
    public function __construct(
        private readonly ProductRepositoryInterface $repository,
        private readonly MediaUploader              $mediaUploader,
    )
    {
    }

    public function handle(array $payload = []): Product
    {
        return DB::transaction(function ()use($payload) {
            $payload['user_id'] = auth()->id();
            $model = $this->repository->store($payload);
            if (!empty($payload['image'])) {
                $res = $this->mediaUploader->upload($payload['image']);
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
