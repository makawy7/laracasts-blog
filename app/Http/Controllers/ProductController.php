<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $posts =  Post::latest()->filter(request(['search', 'category']))->with('category', 'author')->get();
        return view('posts', [
            'posts' => $posts,
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
