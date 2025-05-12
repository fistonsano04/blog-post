@extends('layouts.app')
@section('content')
    <div class="dashboard">
        <div class="table-container">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search posts..." onkeyup="filterTable()">
            </div>
            <table id="postsTable" class="responsive-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($blogs->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">No records found</td>
                        </tr>
                    @else
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ Str::limit($blog->content, 50) }}</td>
                                <td>{{ $blog->author->name }}</td>
                                <td><img src="{{ $blog->image }}" alt="Post Image" class="post-image"></td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                <td>{{ $blog->status }}</td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
            <div class="pagination">
                {{ $blogs->links() }}
            </div>
        </div>
        <div class="add-post">
            <form action="" method="post" class="styled-form">
                @csrf
                <h2 class="form-title">Add New Post</h2>
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter post title"
                        required>
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-textarea" placeholder="Write your content here..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="author" class="form-label">Author</label>
                    <select id="author" name="author" class="form-select" required>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" id="image" name="image" class="form-input" placeholder="Enter image URL"
                        required>
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" id="category" name="category" class="form-input" placeholder="Enter category"
                        required>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" id="tags" name="tags" class="form-input"
                        placeholder="Comma separated tags">
                </div>
                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>
    <style>
        .dashboard {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 100%;
            background-color: #f4f4f4;
        }

    <script>
        function filterTable() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const tableRows = document.querySelectorAll('#postsTable tbody tr');
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchInput) ? '' : 'none';
            });
        }
    </script>
    </div>
@endsection
