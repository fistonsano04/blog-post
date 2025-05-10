<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header class="blog-header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <span><span class="highlight">B</span>log</span>
            </a>
        </div>
        <div class="title">
            <h2>Simple Blog Post</h2>
        </div>
        <div class="auth">
            @if (Auth::check())
                <p>Welcome, {{ Auth::user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </header>

    <div class="blog-container" id="blog-container">

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


</body>

</html>
