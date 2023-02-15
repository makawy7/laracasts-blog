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

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function scopeFilter($query, array $filters)
    {

        $query
            // search term
            ->when($filters['search'] ?? false, fn ($query, $search) => $query->where(fn ($query) => 
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%')))
            // category
            ->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) => $query->where('slug', $category)
            ))
            // author
            ->when(
                $filters['author'] ?? false,
                fn ($query, $author) =>
                $query->whereHas('author', fn ($query) => $query->where('username', $author))
            );


        //old code
        // $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where(fn ($query) => 
        //     $query->where('title', 'like', '%' . $search . '%')
        //     ->orWhere('body', 'like', '%' . $search . '%')));


        // $query->when($filters['category'] ?? false, fn ($query, $category) =>
        // $query->whereExists(
        //     fn ($query) =>
        //     $query->from('categories')->whereColumn('categories.id', 'posts.category_id')
        //         ->where('categories.slug', $category)
        // A clean way with the eloquent relationship
        // $query->whereHas(
        //     'category',
        //     fn ($query) => $query->where('slug', $category)
        // ));

        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
        // $query->when(
        //     $filters['author'] ?? false,
        //     fn ($query, $author) =>
        //     $query->whereHas('author', fn ($query) => $query->where('username', $author))
        // );
    }
}
