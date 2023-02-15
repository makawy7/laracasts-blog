<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required'
        ]);
        $attributes['post_id'] = $post->id;
        $attributes['user_id'] = auth()->user()->id;
        Comment::create($attributes);
        return back()->with('success', 'Comment added!');
    }
}
