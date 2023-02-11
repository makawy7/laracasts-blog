<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    // protected $fillable = ['title','slug', 'body', 'excerpt'];

    // define the default key for route model binding otherwise use {post:slug}
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
