@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index category</title>
    <table class="table">
        <thead>


        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">settings</th>
        </tr>
        @foreach($category as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <div class="btn-group btn-sm" >
                    <a href="{{ route('admin.category.show', $category->id)}}" class="btn btn-primary" >show</a>
                    <a href="{{route('admin.category.edit',$category->id)}}" class ="btn btn-warning">edit</a>
                    <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class ="btn btn-danger">delete</button>

                    </form>
                </div>
                </td>
            </tr>
    @endforeach
</head>
<body>

</body>
</html>
@endsection
