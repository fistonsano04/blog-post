<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = blog::with('user')
            ->where('is_published', 'yes')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('index', compact('posts'));
    }
}
