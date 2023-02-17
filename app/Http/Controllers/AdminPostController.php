<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts =  Post::paginate(10);
        return view('admin.posts.index', ['posts' => $posts]);
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'sometimes|image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        $post->update($attributes);
        return redirect('/posts/' . $post->slug)->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post deleted.');
    }
}
