@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index blog</title>
</head>

<body>

<h4>{{auth()->user()->name}}</h4>
<table class="table">
    <tbody>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created_at</th>
        <th scope="col">category_id</th>
        <th scope="col">settings</th>

    </tr>

@foreach($blogs as $blog)
    <tr>

    <td>{{$blog->id}}</td>
    <td>{{$blog->name}}</td>
    <td>{{$blog->created_at}}</td>
    <td>{{$blog->category_id}}</td>



          <td>
            <div class="btn-group btn-sm" >
                <a href="{{ route('admin.blog.show', $blog->id)}}" class="btn btn-primary" >show</a>
                <a href="{{route('admin.blog.edit',$blog->id)}}" class ="btn btn-warning">edit</a>
                <form action="{{route('admin.blog.destroy',$blog->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class ="btn btn-danger">delete</button>

                </form>
            </div>
          </td>
        </tr>
    </tbody>
    @endforeach

</table>
</body>
</html>
@endsection
