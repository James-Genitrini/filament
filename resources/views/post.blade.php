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