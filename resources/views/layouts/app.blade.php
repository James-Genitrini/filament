<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/posts') }}">Accueil</a></li>
                {{-- <li><a href="{{ route('post.show', ['slug' => 'exemple']) }}">Exemple de Post</a></li> --}}
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

<style>
body {
    height: 100%;
    font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}

/* Styles de réinitialisation */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* En-tête */
header {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
}

header nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 2rem;
}

header nav ul li {
    display: inline-block;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}

header nav ul li a:hover {
    color: #f9c74f;
}

/* Contenu principal */
main {
    max-width: 900px;
    margin: 2rem auto;
    padding: 0 1rem;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #333;
}

/* Contenu du post */
.content {
    font-size: 1rem;
    line-height: 1.8;
    color: #555;
    background-color: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

/* Bouton "Voir le post" */
.btn-view-post {
    display: inline-block;
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-view-post:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.btn-view-post:active {
    transform: scale(1);
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1rem;
    position: relative;
    bottom: 0;
    width: 100%;
    margin-top: auto; /* Permet de pousser le footer vers le bas */
}


footer p {
    font-size: 1rem;
}

/* Responsivité */
@media (max-width: 768px) {
    header nav ul {
        flex-direction: column;
        gap: 1rem;
    }

    .post-item {
        padding: 1rem;
    }

    h1 {
        font-size: 2rem;
    }

    .btn-view-post {
        padding: 8px 16px;
    }
}
</style>