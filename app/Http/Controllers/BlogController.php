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
        $authors = User::all();
        return view('dashboard', compact('blogs', 'authors'));
    }
}
