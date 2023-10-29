@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index product</title>
</head>

<body>

<h4>{{auth()->user()->name??null}}</h4>
<table class="table">
    <thead>


        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">family</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">settings</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>


        <td>{{$user->id}}</td>
        <td>{{$user->name??null}}</td>
        <td>{{$user->family??null}}</td>
        <td>{{$user->email??null}}</td>
        <td>{{$user->phone??null}}</td>
        <td>


        <div class="btn-group btn-sm" >
            <a href="{{ route('admin.user.show', $user->id)}}" class="btn btn-primary" >show</a>
            <a href="{{route('admin.user.edit',$user->id)}}" class ="btn btn-warning">edit</a>
            <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class ="btn btn-danger">delete</button>

            </form>
        </div>
        </td>
    </tr>

    @endforeach
    </tbody>


</table>



</body>
</html>
@endsection
