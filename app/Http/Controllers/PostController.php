<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'sometimes|image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if(request()->has('thumbnail')){
            $path = request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail'] = $path;
        }

        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;
        $post = Post::create($attributes);
        return redirect('/posts/' . $post->slug)->with('success', 'Post has been created.');
    }
}
