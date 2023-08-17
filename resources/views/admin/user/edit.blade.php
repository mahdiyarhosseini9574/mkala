
@extends('admin.dashboard.dashboard')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create user</title>
</head>
<body>

<form action="{{ Route('admin.user.update',$user->id) }}" method="post">
    @csrf
    @if($errors->all())
        <small> {{$errors}}</small>
    @endif
    @method('PATCH')
    <label >please insert  name:</label><br>
    <input type="text" value="{{$user->name}}" name="name">
    <br>
    @error('name')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
<br>

    <label >please insert family :</label><br>
    <input type="text" value="{{$user->family}}" name="family">
    <br>
    @error('family')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <label >please insert phone number:</label><br>
    <input type="phone" value="{{$user->phone}}"  name="phone">
    <br>
    @error('phone')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <label >please insert email :</label><br>
    <input type="email" value="{{$user->email}}" name="email"><br>

    @error('email')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <button type="submit">save</button>

</form>

</body>
</html>
@endsection
