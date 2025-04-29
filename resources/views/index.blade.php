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