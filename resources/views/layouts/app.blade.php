<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ url('/admin') }}">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; Post</p>
    </footer>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>