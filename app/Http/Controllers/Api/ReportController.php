<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
//        $mostcomment = Blog::withCount('comments')->orderBy('comments_count', 'desc')
//            ->take(5)->get();
        $popularProducts = Product::with(['views'])->withCount('views')
            ->orderBy('views_count', 'desc')
            ->take(10)
            ->get();
        return $this->successResponse(ProductResource::collection($popularProducts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
