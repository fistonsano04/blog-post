<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = blog::with('author')
            ->where('is_published', true)
            ->paginate(10);
        return view('dashboard', compact('blogs'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'is_published' => 'required|boolean',
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

        return redirect()->route('dashboard')->with('success', 'Blog post created successfully.');
    }
}
