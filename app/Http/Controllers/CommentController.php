<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $comments=Comment::all();
      return view('admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data=$request->validate([
          'commentable_id' => ['required', 'integer'],
          'commentable_type' => ['required'],
          'body' => ['required'],
      ]);
        $data['user_id']=auth()->user()->id;
         if($request->commentable_id=='product'){
             $commentabletype=Product::class;
         }
         else if($request->commentable_type=='blog'){
             $commentabletype=Blog::class;
         }else {
             $commentabletype=Product::class;
         }
        $data['commentable_type']=$commentabletype;
        Comment::create($data);
        return back();

    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.comment.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit',compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
       $data= $request->validate([
            'user_id'=>'required',
            'commentable_id'=>'required',
            'commentable_type'=>'required',
            'body'=>'required',
        ]);
        if($request->commentable_type=='product'){
            $commentableType=Product::class;
        }
        else if($request->commentable_type=='blog'){
            $commentableType=Blog::class;
        }else {
            $commentableType=Product::class;
        }

        $comment->update($data);
        return redirect(route('admin.comment.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('admin.comment.index'));

    }
}
