@extends('layouts.app')
@section('content')
    <div class="blog-edit">
        <h2 class="form-title">Edit Post</h2>
        <form action="{{ route('update-post', $post->id) }}" method="post" class="styled-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" id="image" name="image" value="{{ $post->image }}" required>
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <input type="text" id="category" name="category" value="{{ $post->category }}" required>
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
                    <input type="text" id="tags-input" value="{{ $post->tags }}" name="tags" class="form-input tagInput"
                        placeholder="Enter a tag and press Enter">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
