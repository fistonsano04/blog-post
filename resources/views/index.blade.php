<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .blog-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .blog-header h1 {
            font-size: 3rem;
            margin: 0;
        }

        .blog-container {
            max-width: 800px;
            margin: 2rem auto;
        }

        .post-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .post-card img {
            width: 100%;
            height: auto;
        }

        .post-card-content {
            padding: 1.5rem;
        }

        .post-card-content h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .post-card-content p {
            line-height: 1.6;
            color: #555;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination button {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .pagination button:hover {
            background: #2575fc;
        }

        .pagination button.disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <header class="blog-header">
        <h1>Interactive Blog Post</h1>
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
