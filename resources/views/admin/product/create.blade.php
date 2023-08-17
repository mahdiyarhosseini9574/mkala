@extends('admin.dashboard.dashboard')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create product</title>
</head>
<body>

<form action="{{ Route('admin.product.store') }}" method="post">
    @csrf
    <label >please insert product name:</label><br>
    <input type="text"  value="{{old('name')}}" name="name"><br>

    <label >please insert product user:</label><br>
    <input type="text" value="{{old('user_id')}}" name="user_id"><br>

    <label >please insert product brand:</label><br>
    <input type="text" value="{{old('brand_id')}}"  name="brand_id"><br>

    <label >please insert product category:</label><br>
    <input type="text" value="{{old('category_id')}}" name="category_id"><br>

    <label >please insert product description:</label><br>
    <input type="text" value="{{old('description')}}" name="description"><br>

    <label >please insert product meta description:</label><br>
    <input type="text" value="{{old('meta_description')}}" name="meta_description"><br>
    <button>save</button>

</form>

</body>
</html>
@endsection
