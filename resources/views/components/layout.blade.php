<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Laravel Blog' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('articles.index') }}">My Blog</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.create') }}">Nuovo Articolo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.create') }}">Nuovo Tag</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    {{ $slot }}
</div>

</body>
</html>
