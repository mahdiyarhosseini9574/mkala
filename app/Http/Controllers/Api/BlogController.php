<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\Services\blog\StoreBlogService;
use App\Http\Services\blog\UpdateBlogService;
use App\Models\Blog;
use App\Repositoryes\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends ApiBaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Blog::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, BlogRepositoryInterface $repository)
    {
//        Gate::authorize('viewAny',BlogRepository::class);
//        $blogs = Blog::with(['user', 'category'])->get();
//        return $this->successResponse(BlogResource::collection($blogs));
        $data = $repository->query()->where('id', '>', '1')->with(['user', 'images'])->get();
        return $this->successResponse(BlogResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request, StoreBlogService $service)
    {
//        \Gate::authorize('create',BlogRepository::class);
        $model = $service->handle($request->validated());
        return $this->successResponse(BlogResource::make($model));

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
//\Gate::authorize('view',$blog);
        $blog['user_id'] = auth()->id();
//        dd($blog);


        return $this->successResponse(BlogResource::make($blog->load([
            'likes', 'comments', 'images', 'views'
        ])));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, UpdateBlogService $service, Blog $blog)
    {
//        \Gate::authorize('update',$blog);
        $model = $service->handle($blog, $request->validated());
        return $this->successResponse(BlogResource::make($model));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
//        \Gate::authorize('delete',$blog);
        return $this->successResponse($blog->delete(), 'blog deleted', '201');
    }

    public function restore($id, BlogRepositoryInterface $repository)
    {
        return $repository->restore($id);

    }

    public function forcedelete($id, BlogRepositoryInterface $repository)
    {
        return $repository->forcedelete($id);
    }

    public function addLike(Blog $blog)
    {
        $blog->like();
        return 'like';
    }

    public function addview(Blog $blog)
    {
        $blog->addview();

        return 'ok';
    }

    public function toggle(BlogRepositoryInterface $repository, Blog $blog)
    {
        $repository->toggle($blog);
        return 'ok';
    }
    public function mostView(BlogRepositoryInterface $repository)
    {
        return $repository->mostView();
    }

    public function mostCommented(BlogRepositoryInterface $repository)
    {
        return $repository->mostCommented();
}
}
