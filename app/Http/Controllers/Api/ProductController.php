<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\product\StoreProductService;
use App\Http\Services\Product\UpdateProductService;
use App\Models\Product;
use App\Repositoryes\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends ApiBaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductRepositoryInterface $repository)
    {
        $products = $repository->query()->with(['user', 'category'])->get();
        return $this->successResponse(ProductResource::collection($products));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, StoreProductService $service)
    {
        $product = $service->handle($request->validated());

        return $this->successResponse(ProductResource::make($product));

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return $this->successResponse(ProductResource::make($product->load([
            'comments', 'likes', 'views', 'images',
        ])));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProductService $service,)
    {
        $product = $service->handle($product, $request->validated());
        return $this->successResponse(ProductResource::make($product));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return $this->successResponse($product->delete());

    }

    public function restore($id, ProductRepositoryInterface $repository)
    {
        return $repository->restore($id);

    }

    public function forcedelete($id, ProductRepositoryInterface $repository)
    {
        return $repository->forcedelete($id);
    }

    public function addLike(Product $product)
    {
        $product->like();
        return 'like';
    }

    public function addview(Product $product)
    {
        $product->addView();
        return 'ok';
    }

    public function toggle(ProductRepositoryInterface $repository, Product $product)
    {
        $repository->toggle($product);
        return 'ok';
    }

    public function highPriceProduct(ProductRepositoryInterface $repository)
    {
        return $repository->highPriceProduct();

    }

    public function mostView(ProductRepositoryInterface $repository)
    {
        return $repository->mostView();
    }

    public function mostCommented(ProductRepositoryInterface $repository)
    {
        return $repository->mostCommented();
    }
}
