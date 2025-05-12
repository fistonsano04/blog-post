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
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category' => 'required|string|max:255',
                'tags' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'is_published' => 'required|string|in:yes,no',
            ]);

            blog::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'is_published' => $validatedData['is_published'],
                'category' => $validatedData['category'],
                'tags' => $validatedData['tags'],
                'image' => $validatedData['image'],
                'author' => auth()->id(),
            ]);

            Log::info('Blog post created successfully.', ['user_id' => auth()->id()]);
            return redirect()->route('dashboard')->with('success', 'Blog post created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed while creating blog post.', [
                'errors' => $e->errors(),
                'user_id' => auth()->id(),
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('An error occurred while creating blog post.');
        }
    }

    public function show($id)
    {
        $post = blog::with('user')->findOrFail($id);
        return view('show', compact('post'));
    }
}
