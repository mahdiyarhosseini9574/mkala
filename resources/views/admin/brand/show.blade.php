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
<table class="table">
    <tbody>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>

    </tr>
    <tr>

        <td>{{$brand->id}}</td>
        <td> {{$brand->name}}</td>
    </tr>
    </tbody>
</table>
</body>
</html>

@endsection
