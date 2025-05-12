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
                                <td>{{ $blog->user->name }}</td>
                                <td><img src="{{ $blog->image }}" alt="Post Image" class="post-image"></td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                <td>{{ $blog->is_published }}</td>
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
            <form action="{{ route('new-post') }}" method="post" class="styled-form">
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
                <select id="status" name="is_published" class="form-select" required>
                <option value="no">Draft</option>
                <option value="yes">Published</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tags" class="form-label">Tags</label>
                <div id="tags-container" class="tags-container">
                    <input type="text" id="tags-input" class="form-input tagInput" placeholder="Enter a tag and press Enter">
                </div>
                <input type="hidden" id="tags" name="tags">
            </div>

            <script>

            </script>

            <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>


    </div>



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

@endsection
