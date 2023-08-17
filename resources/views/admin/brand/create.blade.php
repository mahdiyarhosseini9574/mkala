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

<form action="{{ Route('admin.brand.store') }}" method="post">
    @csrf
    <label >please inter brand name:</label><br>
    <input type="text"  name="name"><br>
    <button>save</button>

</form>

</body>
</html>
@endsection
