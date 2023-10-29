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

class UpdateCommentService
{
    public function __construct(
        private readonly CommentRepositoryInterface $repository,


    )
    {
    }

    public function handle($ele, array $payload): Comment
    {

        $this->repository->update($ele, $payload);

        return $ele;

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
