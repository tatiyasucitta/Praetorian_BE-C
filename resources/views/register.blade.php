<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <nav class="navbar-expand-lg bg-body-tertiary navnav">
        <h1>Toko Buku</h1>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a href="{{route('login.form')}}" class="btn btn-warning">Log In</a>
                <a href="#" class="btn btn-primary">Register</a>
            </li>
        </ul>
    </nav>

    <h3>Register</h3>
    <form action="{{route('register')}}" method="POST" class="formulir">
        @csrf
        <label for="inputPassword5" class="form-label">Email</label>
        <input type="text" id="inputPassword5" class="form-control" name="email">
    
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" id="inputPassword5" class="form-control" name="pass">

        <label for="inputPassword5" class="form-label">Confirm Password</label>
        <input type="password" id="inputPassword5" class="form-control" name="confpass">
        
        @if($errors->any())
        {{$errors->first()}}
        @endif

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>