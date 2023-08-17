@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show product</title>
</head>
<body>
<table class="table">
    <thead>


    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created_at</th>
        <th scope="col">user_id</th>
        <th scope="col">brand_id</th>
        <th scope="col">category_id</th>
        <th scope="col">description</th>
        <th scope="col">meta_description</th>
        <th scope="col">images</th>
    </tr>
    </thead>
    <tr>
        <th scope="row">{{$product->id}}</th>
        <th scope="row">{{$product->name}}</th>
        <th scope="row">{{$product->created_at}}</th>
        <th scope="row">{{$product->user_id}}</th>
        <th scope="row">{{$product->brand_id}}</th>
        <th scope="row">{{$product->category_id}}</th>
        <th scope="row">{{$product->description}}</th>
        <th scope="row">{{$product->meta_description}}</th>
        <td>
            @foreach($product->images as $image)
                {{$image->url}}.""
            @endforeach
        </td>



    </tr>
</table>

<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">user_id</th>
        <th scope="col">body</th>

    </tr>


    </thead>
<tbody>

<form action="{{ Route('admin.like.store') }}" method="post">
    @csrf
    <label >please inter comment :</label><br>
    <input type="hidden" name="likeable_id" value="{{$product->id}}">
    <input type="hidden" name="likeable_type" value="product">
    <label>like</label>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Use an element to toggle between a like/dislike icon -->
    <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
    <input type="checkbox" class="col-md-2" name="like">
    <script>
        function myFunction(x) {
            x.classList.toggle("fa-thumbs-down");
        }
    </script>
    <button type="submit">save</button>

</form>

    <h1> product comments</h1>

    @foreach($product->comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->user_id}}</td>
            <td>{{$comment->body}}</td>

        </tr>
    @endforeach

    </tbody>
</table>
<form action="{{ Route('admin.comment.store') }}" method="post">
    @csrf
    <label >please inter comment body:</label><br>
<input type="hidden" name="commentable_id" value="{{$product->id}}">
<input type="hidden" name="commentable_type" value="product">
    <input type="text" class="col-md-12" name="body">
    <button type="submit">save</button>

</form>
</body>
</html>

@endsection
