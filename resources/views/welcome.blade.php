<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/view.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            @if(Auth::user() && Auth::user()->isAdmin == '1')
            <li class="nav-item">
                <a class="nav-link" href="{{route('add.book.form')}}">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create.form')}}">Create Author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create.cat.form')}}">Create New Category</a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav">
<<<<<<< HEAD
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
=======
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </li>
>>>>>>> 6e4e55f5d61393730f16ab677527c73693f81130
        </ul>
    </nav>

    <div class="content">
        @foreach ($semuabuku as $buku)    
            <div class="card" style="width: 18rem;">
                {{-- <img src="{{asset('pictures/harrypotter.jpg')}}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <img class="book-image" src="{{asset('storage/bookimage/images/'.$buku->image)}}" alt="">
                    <h5 class="card-title">{{$buku->title}}</h5>
                    <p>Rp. {{$buku->price}}</p>
                    <p>Stock: {{$buku->stock}}</p>
                    <p style="color:green">Author: {{$buku->author->author_name}}</p>
                    <h5>Category:</h5>
                    @foreach ($buku->category as $c)
                        <li>{{$c->categoryName}}</li>
                    @endforeach
                    <br>
                    <a href="{{route('updateform', ['id' => $buku->id])}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('add.category', ['id' => $buku->id])}}" class="btn btn-success">Add Category</a>
                    {{-- shift + alt + arrow bawah --}}
                    <form method="POST" action="{{route('delete', ['id'=> $buku->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>