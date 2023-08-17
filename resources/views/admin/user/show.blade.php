@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show user</title>
</head>
<body>


    <table class="table">
        <thead>


        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">family</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">image</th>
        </tr>
        </thead>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <th scope="row">{{$user->name}}</th>
            <th scope="row">{{$user->family}}</th>
            <th scope="row">{{$user->email}}</th>
            <th scope="row">{{$user->phone}}</th>
            <th scope="row">{{$user->image->url}}</th>


        </tr>
    </table>

    <table class="table">
        <thead>


        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">description</th>

        </tr>
        </thead>
        <tbody>



        <h1>user products</h1>

            @foreach($user->products as $product)
                <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>





</body>
</html>

@endsection
