<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiBaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Category::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Category::all();
        return $this->successResponse(
            CategoryResource::collection($data)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $new = Category::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function restore($id, $repository)
    {
        return $repository->restore($id);

    }

    public function forcedelete($id, $repository)
    {
        return $repository->forcedelete($id);
    }
}
