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

<form action="{{ Route('admin.blog.store') }}" method="post">
    @csrf
    <label >please insert blog name:</label><br>
    <input type="text"  name="name"><br>

    <label >please insert blog user:</label><br>
    <input type="text"  name="user_id"><br>


    <label >please insert blog category:</label><br>
    <input type="text"  name="category_id"><br>

    <label >please insert blog description:</label><br>
    <input type="text"  name="description"><br>

    <label >please insert blog meta description:</label><br>
    <input type="text"  name="meta_description"><br>
    <button>save</button>

</form>

</body>
</html>
@endsection
