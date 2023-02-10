<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // \Illuminate\Support\Facades\DB::listen(
    //     function ($query) {
    //         logger($query->sql, $query->bindings);
    //     }
    // );
    // resolving the lazy loading and fetch category with posts
    return view('posts', ['posts' => Post::with('category')->get()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});
// })->where('post', '[A-z_\-]+');
