<?php

namespace App\Http\Services\blog;

use App\Http\Services\MediaUploder\MediaUploader;
use App\Models\Blog;
use App\Repositoryes\Blog\BlogRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UpdateBlogService
{
    public function __construct(
        private readonly BlogRepositoryInterface $repository,
        private readonly MediaUploader           $mediaUploader,
    )
    {
    }
    public function handle($ele, array $payload = []): Blog
    {
        return DB::transaction(function ()use ($ele,$payload){
            $this->repository->update($ele, $payload);
            if (!empty($payload['image'])) {
                $res = $this->mediaUploader->upload($payload['image']);
                $ele->images()->create([
                    'url' => $res['url'],
                    'size' => $res['size'],
                    'extension' => $res['extension'],
                ]);
            }
            return $ele;
        });
    }
}
