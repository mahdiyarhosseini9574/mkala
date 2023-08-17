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

<form action="{{ Route('admin.user.store',) }}" method="post">
    @csrf
    <label >please insert  name:</label><br>
    <input type="text" value="{{old('name')}}"  name="name"><br>
    @error('name')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <label >please insert family :</label><br>
    <input type="text"  value="{{old('family')}}"  name="family"><br>
    @error('family')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <label >please insert phone number:</label><br>
    <input type="string"  value="{{old('phone')}}"  name="phone"><br>
    @error('phone')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>

    <label >please insert email :</label><br>
    <input type="email"  value="{{old('email')}}"  name="email"><br>
    @error('phone')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <br>


    <label >please insert  password:</label><br>
    <input type="password"  value="{{old('password')}}"  name="password"><br>
    @error('password')
    <span>
        <small class="form-text mt-0">{{$message}}</small>
    </span>
    @enderror
    <button>save</button>

</form>

</body>
</html>
@endsection
