@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create category</title>
</head>
<body>

<form action="{{ Route('admin.comment.update',$comment->id) }}" method="post">
    @csrf
    @method('PATCH')
    <label >please inter comment body:</label><br>
    <input type="text"  name="body"><br>

    <label >please inter comment user:</label><br>
    <input type="text"  name="user_id"><br>

    <label >please inter comment id:</label><br>
    <input type="text"  name="commentable_id"><br>
    <p>Please select comment baraye chie mikhay bezary:</p>
    <input type="radio"  name="commentable_type" value="product">
    <label >product</label><br>
    <input type="radio" name="commentable_type" value="blog">
    <label >blog</label><br>
    <button>save</button>

</form>

</body>
</html>
@endsection
