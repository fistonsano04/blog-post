@extends('layouts.app')
@section('content')

    <div class="show-details">
        <div class="banner">
            <img src="{{ $post->image }}" alt="{{ $post->title }}">
        </div>
        <div class="blog-content">
            <h2>{{ $post->title }}</h2>
            <p class="post-category"><strong>Category:</strong> {{ $post->category }}</p>
            <p class="post-content">{{ $post->content }}</p>
            <div class="post-details">
                <p class="post-tags"><strong>Tags:</strong> <span>{{ $post->tags }}</span></p>
                <p class="post-category"><strong>Post by:</strong> {{ $post->user->name }}</p>
                <p class="post-category"><strong>Post On:</strong> {{ $post->created_at->format('d M y') }}</p>
            </div>

        </div>


    </div>
@endsection
