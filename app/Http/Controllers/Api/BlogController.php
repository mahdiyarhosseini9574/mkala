<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\UserResource;
use App\Models\Blog;
use App\Models\User;
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
    public function index()
    {
//        \Gate::authorize('viewAny',BlogRepository::class);
        $blogs = Blog::all();
        return $this->successResponse(BlogResource::collection($blogs));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
//        \Gate::authorize('create',BlogRepository::class);

        $blog = Blog::create($request->validated());
        return $this->successResponse(BlogResource::make($blog));

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
//\Gate::authorize('view',$blog);
        return $this->successResponse(BlogResource::make($blog));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
//        \Gate::authorize('update',$blog);
return "updated";
        return $this->successResponse(BlogResource::make($blog));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
//        \Gate::authorize('delete',$blog);
return "deleted";
        $blog->delete();
        return $this->successResponse(BlogResource::make($blog));

    }
}
