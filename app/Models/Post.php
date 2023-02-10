<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class Post
{
    public $title;
    public $slug;
    public $date;
    public $excerpt;
    public $body;
    public function __construct($title, $slug, $date, $excerpt, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
    }
    public static function find($slug)
    {
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException;
        // }
        // $post = cache()->remember("post.{$slug}", now()->addMinutes(30), function () use ($path) {
        //     var_dump('file_get_contents');
        //     return file_get_contents($path);
        // });
        // return cache()->remember("post.{$slug}", 1200, fn () => file_get_contents($path));

        $posts = static::all();
        $post = $posts->firstWhere('slug', $slug);
        if (!$post) {
            throw new ModelNotFoundException;
        }
        return $posts->firstWhere('slug', $slug);
    }

    public static function all()
    {
        return cache()->rememberForever(
            'posts.all',
            fn () => collect(File::files(resource_path('posts')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) => new Post(
                        $document->title,
                        $document->slug,
                        $document->date,
                        $document->excerpt,
                        $document->body()
                    )
                )->sortByDesc('date')
        );
        // return array_map(fn ($post) => $post->getContents(), $posts);
    }
}
