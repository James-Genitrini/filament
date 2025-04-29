@extends('layouts.app')

@section('title', $post->title) 

@section('content')
    <div class="post">
        <h1>{{ $post->title }}</h1>
        <div class="content">
            {!! nl2br(e($post->content)) !!}
        </div>

        @if($post->hasMedia('thumbnail'))
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            @foreach($post->getMedia('thumbnail') as $media)
                <img src="{{ $media->getUrl('preview') }}" alt="Post image" style="width: 150px; height: auto; border-radius: 8px;">
            @endforeach
        </div>
        @endif
    </div>
@endsection

<style>
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Personnalisation du thème (optionnel) */
@layer base {
    body {
        font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
    }
}

/* Styles personnalisés */
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

/* Médias */
.post img {
    max-width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.post img:hover {
    transform: scale(1.05);
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

    .post {
        padding: 1rem;
    }

    h1 {
        font-size: 2rem;
    }
}
</style>