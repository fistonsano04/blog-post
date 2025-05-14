<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{


    public function admin()
    {
        $blogs = blog::with('user')
            ->paginate(10);
        return view('dashboard', compact('blogs'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'is_published' => 'required|string|in:yes,no',

        ]);
        $blog = new blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category = $request->category;
        $blog->tags = $request->tags;
        $blog->image = $request->image;
        $blog->is_published = $request->is_published;
        $blog->user_id = auth()->id();
        $blog->save();
        Log::info('Blog post created successfully.', ['user_id' => auth()->id()]);
        return redirect()->route('dashboard')->with('success', 'Blog post created successfully.');
    }

    public function show($id)
    {
        $post = blog::with('user')->findOrFail($id);
        return view('show', compact('post'));
    }
    public function updateBlog(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category' => 'required|string|max:255',
                'tags' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'is_published' => 'required|string|in:yes,no',
            ]);

            $blog = blog::findOrFail($id);
            $blog->update($validatedData);

            Log::info('Blog post updated successfully.', ['user_id' => auth()->id()]);
            return redirect()->route('dashboard')->with('success', 'Blog post updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed while updating blog post.', [
                'errors' => $e->errors(),
                'user_id' => auth()->id(),
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('An error occurred while updating blog post.');
        }
    }
    public function edit($id)
    {
        $post = blog::with('user')->findOrFail($id);
        return view('edit', compact('post'));
    }
    public function destroy($id)
    {
        try {
            $post = blog::findOrFail($id);
            $post->delete();

            Log::info('Blog post deleted successfully.', ['user_id' => auth()->id()]);
            return redirect()->route('dashboard')->with('success', 'Blog post deleted successfully.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting blog post.');
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = blog::with('user')
            ->where('is_published', 'yes')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('index', compact('posts'));
    }
}
