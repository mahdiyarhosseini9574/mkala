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

<h4>{{auth()->user()->name}}</h4>
<table class="table">
    <thead>


    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">brand_id</th>
        <th scope="col">category_id</th>
        <th scope="col">created_at</th>
        <th scope="col">settings</th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>


            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->brand_id}}</td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->created_at}}</td>
            <td>


                <div class="btn-group btn-sm" >
                    <a href="{{ route('admin.product.show', $product->id)}}" class="btn btn-primary" >show</a>
                    <a href="{{route('admin.product.edit',$product->id)}}" class ="btn btn-warning">edit</a>
                    <form action="{{route('admin.product.destroy',$product->id)}}" method="post">
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
