<?php

use App\Models\Post;
use App\Models\User;
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
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    // eager loading posts and there authors
    // $category = $category->load('posts', 'posts.author', 'posts.category');
    // I'm eager loading category to be added to posts, because i return the posts not category
    // and i don't do that, with every iteration in the view a sql query will be done to get the category of each post again!
    // I still don't know if it's more efficient performance wise to do this or not
    return view('posts', [
        'posts' => $category->posts->load('category', 'author'),
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
})->name('category');
Route::get('/author/{user:username}', function (User $user) {
    // $user = $user->load('posts', 'posts.category', 'posts.author');
    return view('posts', ['posts' => $user->posts->load('category', 'author'), 'categories' => Category::all()]);
});
// })->where('post', '[A-z_\-]+');
