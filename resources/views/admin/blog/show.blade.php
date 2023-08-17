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
    <tbody>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">user_id</th>
        <th scope="col">created_at</th>
        <th scope="col">category_id</th>
        <th scope="col">description</th>
        <th scope="col">meta_description</th>


    </tr>

<form  method="get">
    <tr>
        <td>{{$blog->id}}</td>
        <td> {{$blog->name}}</td>
        <td> {{$blog->user_id}}</td>
        <td> {{$blog->created_at}}</td>
        <td>{{$blog->category_id}}</td>
        <td> {{$blog->description}}</td>
        <td> {{$blog->meta_description}}</td>

</form>
    </tbody>
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



    <h1> blog comments</h1>

    @foreach($blog->comments as $comment)
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
    <input type="hidden" name="commentable_id" value="{{$blog->id}}">
    <input type="hidden" name="commentable_type" value="blog">
    <input type="text" class="col-md-12" name="body">
    <button type="submit">save</button>

</form>

</body>
</html>

@endsection
