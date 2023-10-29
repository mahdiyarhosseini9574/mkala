<?php

namespace App\Http\Services\Comment;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use App\Repositoryes\Blog\BlogRepositoryInterface;
use App\Repositoryes\Comment\CommentRepository;
use App\Repositoryes\Comment\CommentRepositoryInterface;
use App\Repositoryes\Product\ProductRepositoryInterface;
use phpDocumentor\Reflection\Types\Null_;

class StoreCommentService
{
    public function __construct(
        private readonly CommentRepositoryInterface $repository,
        private readonly BlogRepositoryInterface    $blogRepository,
        private readonly ProductRepositoryInterface $productRepository,

    )
    {
    }

    public function handle(array $payload): Comment
    {
        if ($payload['type'] == "Blog") {
            $model = $this->blogRepository->find($payload['id']);
        } else {
            $model = $this->productRepository->find($payload['id']);
        }
        return $model->comments()->create([
            'user_id' => auth()->id(),
            'body' => $payload['body'],
            'parent_id' => isset($payload['parent_id']) ? $payload['parent_id'] : null,
        ]);


    }

//    public function reply(array $payload):Comment
//    {
//        if ($payload['type']=="Blog"){
//            $model=$this->blogRepository->find($payload['id']);
//        }else
//            $model=$this->productRepository->find($payload['id']);
//        return $model->comments()->create([
//            'user_id'=>auth()->id(),
//            'body'=>$payload['body']
//        ]);
//    }

}
