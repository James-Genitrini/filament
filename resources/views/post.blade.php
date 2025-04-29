@extends('layouts.app')

@section('title', $post->title) 

@section('content')
    <div class="post">
        <h1>{{ $post->title }}</h1>
        <div class="content">
            {!! nl2br(e($post->content)) !!}
        </div>

        @if($post->hasMedia('thumbnail'))
            <div class="thumbnail">
                <img src="{{ $post->getFirstMediaUrl('thumbnail', 'preview') }}" alt="Thumbnail">
            </div>
        @endif
    </div>
@endsection