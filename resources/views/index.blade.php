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
        <!-- Posts will be dynamically inserted here -->
    </div>

    <div class="pagination" id="pagination">
        <!-- Pagination buttons will be dynamically inserted here -->
    </div>

    <script>
        const posts = Array.from({ length: 50 }, (_, i) => ({
            title: `Blog Post Title ${i + 1}`,
            content: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu. Proin ac consequat arcu. Nulla facilisi. Integer nec eros nec nulla tincidunt tincidunt.`,
            image: 'https://via.placeholder.com/800x400'
        }));

        const postsPerPage = 5;
        let currentPage = 1;

        function renderPosts() {
            const blogContainer = document.getElementById('blog-container');
            blogContainer.innerHTML = '';

            const start = (currentPage - 1) * postsPerPage;
            const end = start + postsPerPage;
            const currentPosts = posts.slice(start, end);

            currentPosts.forEach(post => {
                const postCard = document.createElement('div');
                postCard.classList.add('post-card');
                postCard.innerHTML = `
                    <img src="${post.image}" alt="${post.title}">
                    <div class="post-card-content">
                        <h2>${post.title}</h2>
                        <p>${post.content}</p>
                    </div>
                `;
                blogContainer.appendChild(postCard);
            });
        }

        function renderPagination() {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            const totalPages = Math.ceil(posts.length / postsPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add(i === currentPage ? 'disabled' : '');
                button.disabled = i === currentPage;
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderPosts();
                    renderPagination();
                });
                pagination.appendChild(button);
            }
        }

        renderPosts();
        renderPagination();
    </script>
</body>

</html>
