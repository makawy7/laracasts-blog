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

    // clean way to eager load but can case an infinite loop if you have it on the other models as well
    // protected $with = ['category', 'author'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter($query, array $filters)
    {

        // with query builder
        $query->when($filters['search'] ?? false, fn () => $query
            ->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('body', 'like', '%' . $filters['search'] . '%'));

        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
    }
}
