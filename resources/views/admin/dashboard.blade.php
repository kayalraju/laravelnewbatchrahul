<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin Dashboard </h1>

    welcome {{ auth()->guard('admin')->user()->name }} || email : {{ auth()->guard('admin')->user()->email }}

    <h3><a href="{{ route('admin.logout') }}">Logout</a></h3>
</body>
</html>