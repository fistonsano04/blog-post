@extends('layouts.app')
@section('content')
    <div class="post-card">
        <div class="poster">
            <p class="post-category"><strong>Category:</strong> Technology</p>
            <img src="https://picsum.photos/seed/1/300/200" alt="Post Image">
        </div>
        <div class="post-card-content">
            <h2>Blog Post Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu. Proin ac
                consequat arcu. Nulla facilisi. Integer nec eros nec nulla tincidunt tincidunt.</p>
            <div class="post-details">

                <p class="post-tags"><strong>Tags:</strong> <span>Innovation</span>, <span>AI</span>,
                    <span>Future</span>
                </p>
                <p class="post-category"><strong>Post by:</strong> John Doe</p>
            </div>
            <a href="#" class="read-more-btn">Read More</a>
        </div>
    </div>
    <div class="post-card">
        <div class="poster">
            <p class="post-category"><strong>Category:</strong> Technology</p>
            <img src="https://picsum.photos/seed/1/300/200" alt="Post Image">
        </div>
        <div class="post-card-content">
            <h2>Blog Post Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu. Proin ac
                consequat arcu. Nulla facilisi. Integer nec eros nec nulla tincidunt tincidunt.</p>
            <div class="post-details">

                <p class="post-tags"><strong>Tags:</strong> <span>Innovation</span>, <span>AI</span>,
                    <span>Future</span>
                </p>
                <p class="post-category"><strong>Post by:</strong> John Doe</p>
            </div>
            <a href="#" class="read-more-btn">Read More</a>
        </div>
    </div>
    </div>

    <div class="pagination" id="pagination">
        <!-- Pagination buttons will be dynamically inserted here -->
    </div>
@endsection
