<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // earger loading with route model binding
    // public function resolveRouteBinding($value, $field = null)
    // {    
    //     eager load posts and each post author
    //     return $this->with('posts','posts.author)->where('slug', $value)->firstOrFail();
    // }
}
