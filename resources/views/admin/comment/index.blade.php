@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index comment</title>
</head>
<body>
<table class="table">
    <thead>
<tbody>

    <tr>
        <th scope="col">id</th>
        <th scope="col">created_at</th>
        <th scope="col">commentable_id</th>
        <th scope="col">commentable_type</th>
        <th scope="col">settings</th>

    </tr>
    </thead>
@foreach($comments as $comment)
    <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->created_at}}</td>
        <td>{{$comment->commentable_id}}</td>
        <td>{{$comment->commentable_type}}</td>
        <td>
        <div class="btn-group btn-sm" >
            <a href="{{ route('admin.comment.show', $comment->id)}}" class="btn btn-primary" >show</a>
            <a href="{{route('admin.comment.edit',$comment->id)}}" class ="btn btn-warning">edit</a>
            <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class ="btn btn-danger">delete</button>

            </form>
        </div>
        </td>
    </tr>
@endforeach
    </tbody>

</body>
</html>
@endsection
