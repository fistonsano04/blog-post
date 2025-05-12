<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = blog::with('author')
                     ->where('is_published', true)
                     ->paginate(10);
        return view('dashboard',compact('blogs'));
    }
}
