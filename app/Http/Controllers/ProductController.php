<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $posts =  Post::latest();
        $posts->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
        return view('posts', [
            'posts' => $posts->with('category', 'author')->get(),
            'categories' => Category::all()
        ]);
    }
}
