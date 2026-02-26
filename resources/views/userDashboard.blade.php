

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
         @if(session()->has('success'))
    <div class="alert alert-danger">
      {{ session()->get('success') }}
    </div>
    @endif

    <h1>user Dashboard</h1>

    <h1>welcome :   {{ Auth::user()->name }} email : {{ Auth::user()->email }}</h1>

    <h1><a href="{{ route('logout') }}">LogOut</a></h1>
</body>
</html>