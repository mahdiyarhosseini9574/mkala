<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with(['comments','user','likes',])->get();
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {



    $product= Product::create($request->validated());

     return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        $product->load(['images','comments','likes'])->get();


        return view('admin.product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
      $data=  $request->validate([
            'name'=>'required',
            'user_id'=>'required',
          'brand_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'meta_description'=>'required',
        ]);
        $product->update($data);
        return redirect(route('admin.product.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('admin.product.index'));
    }
}
