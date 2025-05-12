@extends('layouts.app')
@section('content')
    <div class="box-poster">
        @foreach ($posts as $post)
            <div class="post-card">
                <div class="poster">
                    <p class="post-category"><strong>Category:</strong> {{ $post->category }}</p>
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                </div>
                <div class="post-card-content">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ Str::limit($post->content, 200, '...') }}</p>
                    <div class="post-details">

                        <p class="post-tags"><strong>Tags:</strong> <span>{{ $post->tags }}</span>
                        </p>
                        <p class="post-category"><strong>Post by:</strong> {{ $post->user->name }}</p>
                        <p class="post-category"><strong>Post On:</strong> {{ $post->created_at->format('d M y') }}</p>
                    </div>
                    <a href="{{ route('blog.show', $post->id) }}" class="read-more-btn">Read More</a>
                </div>
            </div>
        @endforeach


        <div class="pagination" id="pagination">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
