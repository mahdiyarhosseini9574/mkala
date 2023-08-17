@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list brand</title>
</head>
<body>
<table class="table">
    <tbody>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created_at</th>
        <th scope="col">settings</th>

    </tr>

@foreach($brands as $brand)

<tr>

    <td>{{$brand->id}}</td>
    <td>{{$brand->name}}</td>
    <td>{{$brand->created_at}}</td>



    <td>

    <div class="btn-group btn-sm" >
        <a href="{{ route('admin.brand.show', $brand->id)}}" class="btn btn-primary" >show</a>
        <a href="{{route('admin.brand.edit',$brand->id)}}" class ="btn btn-warning">edit</a>
        <form action="{{route('admin.brand.destroy',$brand->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class ="btn btn-danger">delete</button>

        </form>
    </div>
    </td>
</tr>
@endforeach
</body>
</html>
@endsection
