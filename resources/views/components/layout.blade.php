<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'MyBlog' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('articles.index') }}">

            MyBlog

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('articles.index') }}">

                        Home

                    </a>

                </li>

                @auth

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('articles.create') }}">

                        Nuovo articolo

                    </a>

                </li>

                @endauth

            </ul>

            <ul class="navbar-nav align-items-center">

                @guest

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('login') }}">

                        Login

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('register') }}">

                        Registrati

                    </a>

                </li>

                @endguest

                @auth

                <li class="nav-item me-3 text-white">

                    {{ auth()->user()->name }}

                </li>

                <li class="nav-item">

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button class="btn btn-outline-light btn-sm">

                            Logout

                        </button>

                    </form>

                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<main class="container py-5">

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    @if($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    {{ $slot }}

</main>

<footer class="border-top py-4 mt-5">

    <div class="container text-center text-muted">

        <small>

            MyBlog © {{ date('Y') }}

        </small>

    </div>

</footer>

</body>

</html>