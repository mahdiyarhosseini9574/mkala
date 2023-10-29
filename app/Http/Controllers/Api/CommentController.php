<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Services\Comment\StoreCommentService;
use App\Http\Services\Comment\UpdateCommentService;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends ApiBaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Comment::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return $this->successResponse(CommentResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, StoreCommentService $service)
    {
//        dd($request);
        $model = $service->handle($request->validated());
        return $this->successResponse(CommentResource::make($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment['user_id'] = auth()->id();
        return $this->successResponse(CommentResource::make($comment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment,UpdateCommentService $service)
    {
        $model = $service->handle($comment, $request->validated());
        return $this->successResponse(CommentResource::make($model));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        return $this->successResponse($comment->delete());
    }
}
