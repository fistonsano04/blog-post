@extends('layouts.app')
@section('content')
    <div class="dashboard">

    <div class="table-container"></div>
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
                @if(isse)

                @else

                @endif
                @foreach($blogs as $blog)
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
            </tbody>
        </table>
        <div class="pagination">
            {{ $blogs->links() }}
        </div>
    </div>

    <style>
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        .search-bar {
            margin-bottom: 15px;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
        }
        .responsive-table th, .responsive-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .responsive-table th {
            background-color: #f4f4f4;
        }
        .post-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .pagination {
            margin-top: 15px;
            display: flex;
            justify-content: center;
        }
    </style>

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
