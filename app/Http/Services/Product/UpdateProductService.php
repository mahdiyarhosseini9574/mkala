<?php

namespace App\Http\Services\Product;

use App\Http\Services\MediaUploder\MediaUploader;
use App\Models\Product;
use App\Repositoryes\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UpdateProductService
{
    public function __construct(
        private readonly ProductRepositoryInterface $repository,
        private readonly MediaUploader              $mediaUploader,
    )
    {
    }
    public function handle($eloquent, array $payload = []): Product
    {
        return DB::transaction(function ()use ($eloquent,$payload){
            $this->repository->update($eloquent, $payload);
            if (!empty($payload['image'])) {
                $res = $this->mediaUploader->upload($payload['image']);
                $eloquent->images()->create([
                    'url' => $res['url'],
                    'size' => $res['size'],
                    'extension' => $res['extension']
                ]);
            }
            return $eloquent;
        });
    }
}
