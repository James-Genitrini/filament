@extends('layouts.app')

@section('title', 'Tous les Posts')

@section('content')
    <div class="post-list">
        <h1>Liste des posts publiés</h1>

        @if($posts->isEmpty())
            <p>Aucun post publié disponible.</p>
        @else
            @foreach ($posts as $post)
                <div class="post-item">
                    <h2>{{ $post->title }}</h2>
                    <div class="post-footer">
                        <p><strong>Publié le :</strong> {{ $post->created_at->format('d M Y') }}</p>
                        <a href="{{ route('post.show', $post->slug) }}" class="btn-view-post">Voir le post</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

<style>
    /* Style global pour la liste de posts */
.post-list {
    max-width: 900px;
    margin: 2rem auto;
    padding: 1rem;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.post-item {
    background-color: white;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.post-item h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 1rem;
    text-transform: capitalize;
}

.post-item .post-footer {
    font-size: 0.9rem;
    color: #777;
    margin-top: 1rem;
}

.post-item .post-footer p {
    margin-bottom: 1rem;
}

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

/* Responsive design */
@media (max-width: 768px) {
    .post-list {
        padding: 1rem;
    }

    .post-item h2 {
        font-size: 1.8rem;
    }

    .btn-view-post {
        padding: 8px 16px;
    }
}

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

</style>