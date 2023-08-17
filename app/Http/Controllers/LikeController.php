<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'likeable_id' => ['required', 'integer'],
            'likeable_type' => ['required'],
        ]);
        $data['user_id']=auth()->user()->id;
        if ($request->likeable_type=='product'){
            $likeable_type=Product::class;
        }
        elseif ($request->likeable_type=='blog'){
            $likeable_type=Blog::class;
        }
        else{
            ($likeable_type=Product::class);
        }
        $data['likeable_type']=$likeable_type;
        Like::create($data);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
