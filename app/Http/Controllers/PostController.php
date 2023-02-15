<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts =  Post::latest()
            ->filter(request(['search', 'category', 'author']))
            ->with('category', 'author')
            ->paginate(6)
            ->withQueryString();
        return view('posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {    
        return view('posts.show', ['post' => $post->load('comments', 'comments.user')]);
    }
}
