@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show brand</title>
</head>
<body>

<form  method="get">
{{$comment->name}}
    {{$comment->id}}
    {{$comment->body}}
    {{$comment->user_id}}
    {{$comment->commentable_id}}
    {{$comment->commentable_type}}
</form>

</body>
</html>
@endsection
