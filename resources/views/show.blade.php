@extends('layouts.app')
@section('content')
<style>
    .show-details {
        display: flex;
       justify-content: space-between;
        align-items: center;
        margin: 20px;
    }

    .banner img {
        width: 60%;
        height: auto;
        max-width: 800px;
        border-radius: 10px;
    }

    .blog-content {
        width: 60%;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .blog-content h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .post-category,
    .post-tags {
        font-size: 1rem;
        color: #555;
    }

    .post-content {
        font-size: 1.2rem;
        line-height: 1.6;
        margin-top: 10px;
    }
    .post-details {
        margin-top: 20px;
        font-size: 0.9rem;
        color: #777;
    }
    .post-details p {
        margin: 5px 0;
    }
</style>
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
