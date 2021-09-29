<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Url Checker</title>
    </head>
    <body class="bg-secondary bg-opacity-25">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-light mb-2 justify-content-between p-2">
                <a href="/" class="navbar-brand">UrlChecker</a>
                <ul class="navbar-nav text-decoration-none">
                    @if (auth()->check())
                        <li class="nav-item"><a href="#" class="nav-link">{{ auth()->user()->name }}</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                        </form>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('cadastro') }}" class="nav-link">Cadastre-se</a></li>
                    @endif   
                </ul>
            </nav>
            
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>