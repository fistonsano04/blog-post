@extends('layouts.app')
@section('content')
    <style>

    </style>
    <div class="blog-edit">
        <h2 class="form-title">Edit Post</h2>
        <form action="{{ route('update-post', $post->id) }}" method="post" class="styled-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-input" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" id="image" name="image" value="{{ $post->image }}" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <input type="text" id="category" name="category" value="{{ $post->category }}" class="form-input"
                    required>
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="is_published" class="form-select" required>
                    <option value="no" {{ $post->is_published == 'no' ? 'selected' : '' }}>Draft</option>
                    <option value="yes" {{ $post->is_published == 'yes' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tags" class="form-label">Tags</label>
                <div id="tags-container" class="tags-container">
                    <input type="text" id="tags-input" value="{{ $post->tags }}" name="tags"
                        class="form-input tagInput" placeholder="Enter a tag and press Enter">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <style>
        .blog-edit {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        #tags-input {
            border: none;
            outline: none;
        }

        #tags-input:focus {
            outline: none;
        }

        .form-label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tagInput {
            flex: 1;
            min-width: 150px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
