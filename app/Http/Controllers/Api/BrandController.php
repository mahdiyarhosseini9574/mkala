<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\Services\Brand\StoreBrandService;
use App\Http\Services\Brand\UpdateBrandService;
use App\Models\Brand;
use App\Repositoryes\Brand\BrandRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Brand::class);


    }

    public function index(Request $request, BrandRepositoryInterface $repository)
    {
        $data = Brand::all();
        return $this->successResponse(BrandResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request, StoreBrandService $service)
    {
        $model = $service->handle($request->validated());
        return $this->successResponse(BrandResource::make($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand['user_id'] = auth()->id();
        return $this->successResponse(BrandResource::make($brand));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, UpdateBrandService $service, Brand $brand)
    {
        $model = $service->handle($brand, $request->validated());
        return $this->successResponse(BrandResource::make($model));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        return $this->successResponse($brand->delete());
    }

    public function restore($id, BrandRepositoryInterface $repository)
    {
        return $repository->restore($id);

    }

    public function forcedelete($id, BrandRepositoryInterface $repository)
    {
        return $repository->forcedelete($id);
    }
}
